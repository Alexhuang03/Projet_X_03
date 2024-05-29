<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
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
                "body" => "Annulation de votre Reservation chez Sportify : Projet Web Dynamique : Clément Viellard, Alex Huang, Edanur Rodrigues"
            )
        );

    print($message->sid);
}

if ($db_found) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_SESSION['id'];
        $id_coach = $_POST['id_coach'];
        $date_reservation = $_POST['date_reservation'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];

        $query = "DELETE FROM reservation WHERE id_user = $id_user AND id_coach = $id_coach AND date = '$date_reservation' AND heure_debut = '$heure_debut' AND heure_fin = '$heure_fin'";
        $result = mysqli_query($db_handle, $query);

        if ($result) {
            echo "La réservation a été supprimée avec succès.";
            $to = $_SESSION['telephone'];
            $message = "";
            $sent = sendSMS($to, $message);
            header("Location: ACCOUNT.php");
            exit;
        } else {
            echo "Une erreur est survenue lors de la suppression de la réservation.";
        }
    } else {
        echo "Méthode de requête invalide.";
    }
} else {
    echo "Erreur de connexion à la base de données.";
}
?>
