<?php
// Vérifier si l'identifiant du créneau est présent dans la requête POST
if (isset($_POST['id_creneau'])) {
    // Récupérer l'identifiant du créneau à supprimer depuis la requête POST
    $id_creneau = $_POST['id_creneau'];

    // Connexion à la base de données
    $database = "sportify";
    $db_handle = mysqli_connect('localhost', 'root', '', $database);

    // Vérifier la connexion à la base de données
    if ($db_handle) {
        // Requête SQL pour supprimer le créneau avec l'ID spécifié
        $query = "DELETE FROM creneaux WHERE id_creneau = $id_creneau";

        // Exécuter la requête de suppression
        $result = mysqli_query($db_handle, $query);

        // Vérifier si la suppression a réussi
        if ($result) {
            echo "Le créneau a été supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppression du créneau.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($db_handle);
        header("Location: ACCOUNT.php");
        exit;
    } else {
        echo "Erreur de connexion à la base de données.";
    }
} else {
    echo "Identifiant du créneau non spécifié.";
}
?>
