<?php
// src_ajout_coach.php

$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    // Récupération des données du formulaire
    $nom = $_POST['nom_coach'];
    $prenom = $_POST['prenom_coach'];
    $email = $_POST['email_coach'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $adresse_ligne1 = $_POST['adresse_ligne1'];
    $adresse_ligne2 = $_POST['adresse_ligne2'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code_postal'];
    $pays = $_POST['pays'];

    // Vérification de l'unicité de l'email, du mot de passe et du numéro de téléphone
    $query_check = "SELECT * FROM users WHERE email = '$email' OR telephone = '$telephone'";
    $result_check = mysqli_query($db_handle, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Un utilisateur avec cet email ou numéro de téléphone existe déjà.";
    } else {
        // Insertion des détails du coach dans la table users
        $query_users = "INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, adresse_ligne2, ville, code_postal, pays)
                        VALUES ('coach', '$prenom', '$nom', '$email', '$password', '$telephone', '$adresse_ligne1', '$adresse_ligne2', '$ville', '$code_postal', '$pays')";
        $result_users = mysqli_query($db_handle, $query_users);

        if ($result_users) {
            // Récupération de l'ID unique du coach inséré dans la table users
            $id_coach = mysqli_insert_id($db_handle);

            // Insertion des détails du coach dans la table coach
            $specialite = $_POST['specialite_coach'];
            $photo = $_POST['photo_coach'];
            $video = $_POST['video_coach'];
            $cv = $_POST['cv_coach'];

            $query_coach = "INSERT INTO coach (id_coach, nom, prenom, email, specialite, photo, video, cv) 
                            VALUES ('$id_coach', '$nom', '$prenom', '$email', '$specialite', '$photo', '$video', '$cv')";
            $result_coach = mysqli_query($db_handle, $query_coach);

            // Insertion des créneaux du coach dans la table creneaux
            if (isset($_POST['creneaux'])) {
                foreach ($_POST['creneaux'] as $jour => $slots) {
                    foreach ($slots as $slot) {
                        list($heure_debut, $heure_fin) = explode(',', $slot);
                        $query_creneaux = "INSERT INTO creneaux (id_coach, jour, heure_debut, heure_fin) 
                                           VALUES ('$id_coach', '$jour', '$heure_debut', '$heure_fin')";
                        mysqli_query($db_handle, $query_creneaux);
                    }
                }
            }

            echo "Le coach a été ajouté avec succès avec ses créneaux.";
            header("Location: ACCOUNT.php");
            exit;
        } else {
            echo "Erreur lors de l'insertion des détails du coach.";
        }
    }
} else {
    echo "Erreur de connexion à la base de données.";
}
?>
