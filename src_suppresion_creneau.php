<?php
if (isset($_POST['id_creneau'])) {
    $id_creneau = $_POST['id_creneau'];

    $database = "sportify";
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    if ($db_handle) {
        $query = "DELETE FROM creneaux WHERE id_creneau = $id_creneau";
        $result = mysqli_query($db_handle, $query);

        if ($result) {
            echo "Le créneau a été supprimé avec succès.";
        }
        else {
            echo "Erreur lors de la suppression du créneau.";
        }

        mysqli_close($db_handle);
        header("Location: ACCOUNT.php");
        exit;
    }
    else {
        echo "Erreur de connexion à la base de données.";
    }
}
else {
    echo "Identifiant du créneau non spécifié.";
}
?>
