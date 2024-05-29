<?php
session_start();

$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

$messages = [];

if ($db_found) {
    if (isset($_POST['id_coach']) && isset($_POST['creneaux'])) {
        $id_coach = $_POST['id_coach'];
        $duree_semaine = isset($_POST['duree_semaine']) ? intval($_POST['duree_semaine']) : 7; // Par défaut, une semaine
        $date_debut = strtotime('next monday');

        // Boucle sur la durée de la semaine sélectionnée
        for ($week = 0; $week < $duree_semaine / 7; $week++) {
            foreach ($_POST['creneaux'] as $jour => $slots) {
                $days_to_add = array_search($jour, ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
                $date_creneau = date('Y-m-d', strtotime("+$days_to_add days", strtotime("+$week week", $date_debut)));

                foreach ($slots as $slot) {
                    list($heure_debut, $heure_fin) = explode(',', $slot);

                    // Vérification si le créneau existe déjà
                    $query_check = "SELECT * FROM creneaux WHERE id_coach='$id_coach' AND date_creneau='$date_creneau' AND heure_debut='$heure_debut' AND heure_fin='$heure_fin'";
                    $result_check = mysqli_query($db_handle, $query_check);

                    if (mysqli_num_rows($result_check) == 0) {
                        $query_creneaux = "INSERT INTO creneaux (id_coach, date_creneau, heure_debut, heure_fin) 
                                           VALUES ('$id_coach', '$date_creneau', '$heure_debut', '$heure_fin')";
                        if (mysqli_query($db_handle, $query_creneaux)) {
                            $messages[] = "Créneau ajouté avec succès pour le coach ID: $id_coach à la date: $date_creneau de $heure_debut à $heure_fin.";
                        } else {
                            $messages[] = "Erreur lors de l'ajout du créneau pour le coach ID: $id_coach à la date: $date_creneau de $heure_debut à $heure_fin.";
                        }
                    } else {
                        $messages[] = "Le créneau pour le coach ID: $id_coach à la date: $date_creneau de $heure_debut à $heure_fin existe déjà.";
                    }
                }
            }
        }
    } else {
        $messages[] = "Veuillez sélectionner un coach et des créneaux.";
    }
} else {
    $messages[] = "Erreur de connexion à la base de données.";
}

mysqli_close($db_handle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Résultat de l'ajout des créneaux</title>
    <script type="text/javascript">
        window.onload = function() {
            var messages = <?php echo json_encode($messages); ?>;
            var alertMessage = messages.join("\n");
            alert(alertMessage);
            window.location.href = 'ACCOUNT.php';
        };
    </script>
</head>
<body>
</body>
</html>
