<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telephone = $_POST['telephone'];
        $address_ligne1 = $_POST['address_ligne1'];
        $address_ligne2 = $_POST['address_ligne2'];
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

        $query = "INSERT INTO Users (prenom, nom, email, password, telephone, address_ligne1, address_ligne2, ville, code_postal, pays, numero_etudiant, role)
                  VALUES ('$prenom', '$nom', '$email', '$password', '$telephone', '$address_ligne1', '$address_ligne2', '$ville', '$code_postal', '$pays', '$numero_etudiant', 'client')";

        $result = mysqli_query($db_handle, $query);

        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            $error = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription - Sportify</title>
    </head>
    <body>
        <h2>Inscription</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" required><br><br>
            <label for="address_ligne1">Adresse ligne 1 :</label>
            <input type="text" id="address_ligne1" name="address_ligne1" required><br><br>
            <label for="address_ligne2">Adresse ligne 2 :</label>
            <input type="text" id="address_ligne2" name="address_ligne2"><br><br>
            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required><br><br>
            <label for="code_postal">Code postal :</label>
            <input type="text" id="code_postal" name="code_postal" required><br><br>
            <label for="pays">Pays :</label>
            <input type="text" id="pays" name="pays" required><br><br>
            <label for="numero_etudiant">Numéro étudiant :</label>
            <input type="text" id="numero_etudiant" name="numero_etudiant" required><br><br>
            <input type="submit" value="S'inscrire">
        </form>
    </body>
</html>
