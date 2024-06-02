<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: link_login.php');
    exit;
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];

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
        } else {
            $error = "Erreur lors de l'achat : " . mysqli_error($db_handle);
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
</head>
<body>
<div id="wrapper">
    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>

    <div id="achat">
        <h1>Formulaire d'achat - Abonnement <?php echo htmlspecialchars($offre); ?></h1>

        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p style="color: green;"><?php echo $success; ?></p>
        <?php else: ?>
            <form method="post" action="achat.php?offre=<?php echo htmlspecialchars($offre); ?>">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required><br><br>

                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required><br><br>

                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required><br><br>

                <label for="card_number">Numéro de carte:</label>
                <input type="text" id="card_number" name="card_number" required><br><br>

                <label for="expiration_date">Date d'expiration (MM/AA):</label>
                <input type="text" id="expiration_date" name="expiration_date" required><br><br>

                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required><br><br>

                <input type="submit" value="Confirmer l'achat">
            </form>
        <?php endif; ?>
    </div>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
