<?php

$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
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

    $query_check = "SELECT * FROM users WHERE email = '$email' OR telephone = '$telephone'";
    $result_check = mysqli_query($db_handle, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "Un utilisateur avec cet email ou numéro de téléphone existe déjà.";
    } else {
        $query_users = "INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, adresse_ligne2, ville, code_postal, pays)
                        VALUES ('coach', '$prenom', '$nom', '$email', '$password', '$telephone', '$adresse_ligne1', '$adresse_ligne2', '$ville', '$code_postal', '$pays')";
        $result_users = mysqli_query($db_handle, $query_users);

        if ($result_users) {
            $id_coach = mysqli_insert_id($db_handle);

            $specialite = $_POST['specialite_coach'];
            $photo = $_POST['photo_coach'];
            $video = $_POST['video_coach'];
            $cv = $_POST['cv_coach'];

            $query_coach = "INSERT INTO coach (id_coach, nom, prenom, email, specialite, photo, video, cv) 
                            VALUES ('$id_coach', '$nom', '$prenom', '$email', '$specialite', '$photo', '$video', '$cv')";
            $result_coach = mysqli_query($db_handle, $query_coach);


            if (isset($_POST['creneaux'])) {
                $duree_semaine = isset($_POST['duree_semaine']) ? intval($_POST['duree_semaine']) : 1;
                $date_debut = strtotime('next monday');

                for ($week = 0; $week < $duree_semaine/7; $week++) {
                    foreach ($_POST['creneaux'] as $jour => $slots) {
                        $days_to_add = array_search($jour, ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
                        $date_creneau = date('Y-m-d', strtotime("+$days_to_add days", strtotime("+$week week", $date_debut)));

                        foreach ($slots as $slot) {
                            list($heure_debut, $heure_fin) = explode(',', $slot);

                            $query_creneaux = "INSERT INTO creneaux (id_coach, date_creneau, heure_debut, heure_fin) 
                                   VALUES ('$id_coach', '$date_creneau', '$heure_debut', '$heure_fin')";
                            mysqli_query($db_handle, $query_creneaux);
                        }
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
