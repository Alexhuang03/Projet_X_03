<?php
session_start();
$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if (!$db_found) {
    die("La connexion à la base de données a échoué : " . mysqli_error($db_handle));
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs soumises par le formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    $numero_etudiant = $_POST['numero_etudiant'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Requête SQL pour vérifier la correspondance avec plusieurs champs en fonction du rôle de l'utilisateur
    if ($numero_etudiant != '') {
        // Vérification pour un client
        $query = "SELECT * FROM users WHERE nom = '$nom' AND prenom = '$prenom' AND email = '$email' AND numero_etudiant = '$numero_etudiant' AND password = '$password' AND role = 'client'";
    } else {
        // Vérification pour un admin ou un coach
        $query = "SELECT * FROM users WHERE nom = '$nom' AND prenom = '$prenom' AND email = '$email' AND password = '$password' AND (role = 'admin' OR role = 'coach')";
    }
    $result = mysqli_query($db_handle, $query);

    // Vérifie si l'utilisateur existe dans la base de données
    if (mysqli_num_rows($result) == 1) {
        // Utilisateur trouvé, récupère ses informations
        $user = mysqli_fetch_assoc($result);

        // Définit le rôle de l'utilisateur en fonction des informations récupérées
        if ($user['role'] == 'admin') {
            $_SESSION['user_role'] = 'admin';
        } elseif ($user['role'] == 'coach') {
            $_SESSION['user_role'] = 'coach';
        } elseif ($user['role'] == 'client') {
            $_SESSION['user_role'] = 'client';
        } else {
            $_SESSION['user_role'] = 'default';
        }

        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['numero_etudiant'] = $user['numero_etudiant'];
        $_SESSION['telephone'] = $user['telephone'];
        $_SESSION['adresse_ligne1'] = $user['adresse_ligne1'];
        $_SESSION['adresse_ligne2'] = $user['adresse_ligne2'];
        $_SESSION['ville'] = $user['ville'];
        $_SESSION['code_postal'] = $user['code_postal'];
        $_SESSION['pays'] = $user['pays'];
        $_SESSION['payement'] = $user['payement'];
        // produit 1
        //produit 2

        header("Location: ACCOUNT.php");
        exit();
    } else {
        // Utilisateur non trouvé, affiche un message d'erreur
        $error = "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Sportify</title>
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
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: rgb(0, 86, 179);
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
        <h2>Connexion</h2>
        <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required>

            <label for="numero_etudiant">Numéro étudiant :</label>
            <input type="text" id="numero_etudiant" name="numero_etudiant">

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>

            <input type="submit" value="Se connecter">
        </form>
        <p>Pas de Compte ?</p>
        <?php
        echo "<button onclick=\"location.href='link_signin.php'\">Créer ton compte</button>";
        ?>
    </div>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
