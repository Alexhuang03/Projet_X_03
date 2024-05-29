<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_SESSION['id'];

        $query = "DELETE FROM reservation WHERE id_user = $id_user AND id_coach = {$_POST['id_coach']}";
        $result = mysqli_query($db_handle, $query);

        if ($result) {
            echo "La réservation a été supprimée avec succès.";
            header("Location: ACCOUNT.php");
            exit;
        }
        else {
            echo "Une erreur est survenue lors de la suppression de la réservation.";
        }
    }
    else {
        echo "Méthode de requête invalide.";
    }
}
else {
    echo "Erreur de connexion à la base de données.";
}
?>
