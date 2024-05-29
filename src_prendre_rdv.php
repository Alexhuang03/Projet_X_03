<?php
session_start();

require_once 'vendor/autoload.php';
use Twilio\Rest\Client;

// Fonction pour envoyer un SMS
function sendSMS($to, $message) {
    $sid    = "AC981151755801f211d6d7cb1ec98a5b36";
    $token  = "ebeba02ad3a1967e39c16a02b919434e";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
        ->create("+33667597475", // to
            array(
                "from" => "+12255326488",
                "body" => "Merci pour votre Reservation chez Sportify : Projet Web Dynamique : Clément Viellard, Alex Huang, Edanur Rodrigues"
            )
        );

    print($message->sid);
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: link_login.php");
    exit; // Arrêter l'exécution du script après la redirection
}

// Récupérer l'ID de l'utilisateur connecté
$id_user = $_SESSION['id'];

// Vérifier si l'ID du créneau est envoyé depuis le formulaire
if (isset($_POST['id_creneau'])) {
    // Récupérer l'ID du créneau depuis le formulaire
    $id_creneau = $_POST['id_creneau'];

    // Connecter à la base de données
    $database = "sportify";
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    // Vérifier la connexion à la base de données
    if ($db_handle) {
        // Récupérer les détails du créneau à partir de la table des créneaux
        $query_creneau = "SELECT * FROM creneaux WHERE id_creneau = '$id_creneau'";
        $result_creneau = mysqli_query($db_handle, $query_creneau);

        if ($result_creneau && mysqli_num_rows($result_creneau) > 0) {
            $row_creneau = mysqli_fetch_assoc($result_creneau);

            // Récupérer les détails du créneau
            $date_creneau = $row_creneau['date_creneau'];
            $heure_debut = $row_creneau['heure_debut'];
            $heure_fin = $row_creneau['heure_fin'];
            $id_coach = $row_creneau['id_coach'];

            // Insérer la réservation dans la table des réservations
            $query_reservation = "INSERT INTO reservation (id_coach, id_user, date, heure_debut, heure_fin) VALUES ('$id_coach', '$id_user', '$date_creneau', '$heure_debut', '$heure_fin')";
            $result_reservation = mysqli_query($db_handle, $query_reservation);

            if ($result_reservation) {
                // La réservation a été ajoutée avec succès
                echo "La réservation a été effectuée avec succès.";

                // Envoyer un SMS de confirmation au client
                $to = $_SESSION['telephone'];
                $message = "Votre rendez-vous avec le coach a été confirmé pour le $date_creneau de $heure_debut à $heure_fin.";
                $sent = sendSMS($to, $message);

                if ($sent) {
                    echo "Un SMS de confirmation a été envoyé à votre numéro de téléphone.";
                } else {
                    echo "Erreur lors de l'envoi du SMS de confirmation.";
                }
            } else {
                // Erreur lors de l'insertion de la réservation
                echo "Erreur lors de la réservation.";
            }
        } else {
            // Créneau non trouvé dans la base de données
            echo "Créneau non trouvé.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
        header("Location: ACCOUNT.php");
        exit;
    } else {
        // Erreur de connexion à la base de données
        echo "Erreur de connexion à la base de données.";
    }
} else {
    // ID du créneau non fourni
    echo "ID du créneau non fourni.";
}
?>
