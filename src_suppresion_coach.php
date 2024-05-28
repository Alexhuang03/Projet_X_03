<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération de l'ID du coach à supprimer
        $id_coach = $_POST['id_coach'];

        $database = "Sportify";
        $db_handle = mysqli_connect('localhost', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        if ($db_found) {
            $sql_coach = "DELETE FROM coach WHERE id_coach = '$id_coach'";
            $result_coach = mysqli_query($db_handle, $sql_coach);

            if (!$result_coach) {
                die("Erreur lors de la suppression du coach: " . mysqli_error($db_handle));
            }

            $sql_users = "DELETE FROM users WHERE id = '$id_coach'";
            $result_users = mysqli_query($db_handle, $sql_users);

            if (!$result_users) {
                die("Erreur lors de la suppression de l'utilisateur: " . mysqli_error($db_handle));
            }
        }

        header("Location: ACCOUNT.php");
        exit;
    }
?>
