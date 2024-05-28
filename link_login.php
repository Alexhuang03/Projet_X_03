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

        $_SESSION['id_coach'] = $user['id_coach'];
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
    </head>
        <body>
        <h2>Connexion</h2>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required><br><br>
            <label for="numero_etudiant">Numéro étudiant :</label>
            <input type="text" id="numero_etudiant" name="numero_etudiant"><br><br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>
            <input type="submit" value="Se connecter">
        </form>
    </body>
</html>
