<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $adresse_ligne1 = $_POST['adresse_ligne1'];
    $adresse_ligne2 = $_POST['adresse_ligne2'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $pays = $_POST['pays'];
    $numero_etudiant = $_POST['numero_etudiant'];

    $database = "Sportify";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) {
        die("La connexion à la base de données a échoué : " . mysqli_error($db_handle));
    }

    // Vérification si l'utilisateur existe déjà
    $check_query = "SELECT email, telephone, numero_etudiant FROM users WHERE email = '$email' OR telephone = '$telephone' OR numero_etudiant = '$numero_etudiant'";
    $check_result = mysqli_query($db_handle, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $existing_user = mysqli_fetch_assoc($check_result);
        $error_message = "Un utilisateur avec le même ";
        $errors = [];
        if ($existing_user['email'] === $email) {
            $errors[] = "email";
        }
        if ($existing_user['telephone'] === $telephone) {
            $errors[] = "numéro de téléphone";
        }
        if ($existing_user['numero_etudiant'] === $numero_etudiant) {
            $errors[] = "numéro d'étudiant";
        }
        $error_message .= implode(", ", $errors) . " existe déjà. Veuillez utiliser des informations différentes.";
        echo $error_message;
    } else {
        $query = "INSERT INTO users (prenom, nom, email, password, telephone, adresse_ligne1, adresse_ligne2, ville, code_postal, pays, numero_etudiant, role)
                  VALUES ('$prenom', '$nom', '$email', '$password', '$telephone', '$adresse_ligne1', '$adresse_ligne2', '$ville', '$code_postal', '$pays', '$numero_etudiant', 'client')";
        $result = mysqli_query($db_handle, $query);

        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
            echo $error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Sportify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(248, 248, 248);
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: rgb(255, 255, 255);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            color: rgb(51, 51, 51);
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            margin-bottom: 5px;
            color: rgb(85, 85, 85);
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid rgb(204, 204, 204);
            border-radius: 4px;
            font-size: 16px;
        }

        .form-container input[type="submit"] {
            padding: 10px;
            background-color: rgb(0, 123, 204);
            color: rgb( 255 , 255 , 255);
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: rgb( 0 , 86 , 179);
        }

        .form-container .error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .form-container .success-message {
            color: green;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div id="wapper">
    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>

    <div class="form-container">
        <h2>Inscription</h2>
        <?php if (!empty($error_message)) { echo '<div class="error-message">' . $error_message . '</div>'; } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" required>

            <label for="adresse_ligne1">Adresse ligne 1 :</label>
            <input type="text" id="adresse_ligne1" name="adresse_ligne1" required>

            <label for="adresse_ligne2">Adresse ligne 2 :</label>
            <input type="text" id="adresse_ligne2" name="adresse_ligne2">

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required>

            <label for="code_postal">Code postal :</label>
            <input type="text" id="code_postal" name="code_postal" required>

            <label for="pays">Pays :</label>
            <input type="text" id="pays" name="pays" required>

            <label for="numero_etudiant">Numéro étudiant :</label>
            <input type="text" id="numero_etudiant" name="numero_etudiant" required>

            <input type="submit" value="S'inscrire">
        </form>
    </div>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
