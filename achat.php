<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: link_login.php');
    exit;
}

require_once 'vendor/autoload.php'; // Inclure l'autoloader de Composer pour Twilio
use Twilio\Rest\Client; // Importer la classe Client de Twilio

// Fonction pour envoyer un SMS
function sendSMS() {
    $sid    = "AC981151755801f211d6d7cb1ec98a5b36";
    $token  = "e10e9e76307a104233bba70c931a5559";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create("+33667597475", // to
            array(
                "from" => "+12255326488",
                "body" => "Merci pour votre Abonnement chez Sportify : Projet Web Dynamique : Clément Viellard, Alex Huang, Edanur Rodrigues"
            )
        );

    print($message->sid);
}

$database = "sportify";
$db_handle = mysqli_connect('localhost', 'root', '', $database);
if (!$db_handle) {
    die("La connexion à la base de données a échoué : " . mysqli_error($db_handle));
}

$user_id = $_SESSION['id'];
$offre = $_GET['offre'];
$error = '';
$success = '';

// Vérifiez le rôle de l'utilisateur
$query_role = "SELECT role FROM users WHERE id = $user_id";
$result_role = mysqli_query($db_handle, $query_role);
$user_role = mysqli_fetch_assoc($result_role)['role'];

if ($user_role !== 'client') {
    $error = "Seuls les clients peuvent effectuer des achats.";
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $card_number = $_POST['card_number'];
        $expiration_date = $_POST['expiration_date'];
        $cvv = $_POST['cvv'];

        // Vérifiez si le nom et le prénom correspondent à l'utilisateur connecté
        $query_user = "SELECT nom, prenom FROM users WHERE id = $user_id";
        $result_user = mysqli_query($db_handle, $query_user);
        $user_info = mysqli_fetch_assoc($result_user);

        if ($nom != $user_info['nom'] || $prenom != $user_info['prenom']) {
            $error = "Le nom et le prénom ne correspondent pas à ceux de l'utilisateur connecté.";
        } else {
            // check si le user a déjà un abonnement
            $query_check = "SELECT abo_mensu, abo_annu FROM users WHERE id = $user_id";
            $result_check = mysqli_query($db_handle, $query_check);
            $user_data = mysqli_fetch_assoc($result_check);

            if (($offre == 'mensuel' && ($user_data['abo_mensu'] == 1 || $user_data['abo_annu'] == 1)) ||
                ($offre == 'annuel' && ($user_data['abo_annu'] == 1 || $user_data['abo_mensu'] == 1))) {
                $error = "Vous avez déjà un abonnement actif.";
            } else {
                // MAJ de abo_mensu et abo_annu
                if ($offre == 'mensuel') {
                    $query_update = "UPDATE users SET abo_mensu = 1 WHERE id = $user_id";
                } elseif ($offre == 'annuel') {
                    $query_update = "UPDATE users SET abo_annu = 1 WHERE id = $user_id";
                }
                if (mysqli_query($db_handle, $query_update)) {
                    $success = "Achat effectué avec succès.";
                    sendSMS(); // Envoi du SMS après l'achat
                } else {
                    $error = "Erreur lors de l'achat : " . mysqli_error($db_handle);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .form-box {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 450px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            background-color: #f9f9f9;
        }
        .form-box h1 {
            margin-top: 0;
        }
        .form-box label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }
        .form-box input[type="text"],
        .form-box input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-box input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-box input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .card-info {
            display: flex;
            justify-content: space-between;
        }
        .card-info div {
            width: 48%;
        }
        .message {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
    <script>
        function validateForm() {
            var cardNumber = document.getElementById('card_number').value;
            var expirationDate = document.getElementById('expiration_date').value;
            var cvv = document.getElementById('cvv').value;
            var error = "";

            if (!/^\d{16}$/.test(cardNumber)) {
                error += "Le numéro de carte doit contenir 16 chiffres.\\n";
            }
            if (!/^\d{2}\/\d{2}$/.test(expirationDate)) {
                error += "La date d'expiration doit être au format MM/AA.\\n";
            } else {
                var currentDate = new Date();
                var currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0');
                var currentYear = currentDate.getFullYear().toString().slice(2);

                var expMonth = expirationDate.split('/')[0];
                var expYear = expirationDate.split('/')[1];

                if (expYear < currentYear || (expYear == currentYear && expMonth < currentMonth)) {
                    error += "La carte rentrée est expirée. Veuillez rentrer une autre carte.\\n";
                }
            }
            if (!/^\d{3}$/.test(cvv)) {
                error += "Le CVV doit contenir 3 chiffres.\\n";
            }

            if (error) {
                alert(error);
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<div id="wrapper">
    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>

    <div class="form-container">
        <h1>Achat - Abonnement <?php echo htmlspecialchars($offre); ?></h1>

        <div class="form-box">
            <?php if ($error): ?>
                <p class="message"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p class="success"><?php echo $success; ?></p>
            <?php else: ?>
                <form method="post" action="achat.php?offre=<?php echo htmlspecialchars($offre); ?>" onsubmit="return validateForm()">
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" required>

                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" required>

                    <label for="adresse">Adresse:</label>
                    <input type="text" id="adresse" name="adresse" required>

                    <label for="card_number">Numéro de carte:</label>
                    <input type="text" id="card_number" name="card_number" required>

                    <div class="card-info">
                        <div>
                            <label for="expiration_date">Date d'expiration (MM/AA):</label>
                            <input type="text" id="expiration_date" name="expiration_date" required>
                        </div>
                        <div>
                            <label for="cvv">CVV:</label>
                            <input type="text" id="cvv" name="cvv" required>
                        </div>
                    </div>

                    <input type="submit" value="Confirmer l'achat">
                </form>
            <?php endif; ?>
        </div>
    </div>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
