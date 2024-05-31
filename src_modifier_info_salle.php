<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $info_salle = $_POST['info_salle'];
    $info_regle = $_POST['info_regle'];
    $infor_horaire = $_POST['info_horaire'];

    $database = "Sportify";
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
    if ($db_found) {
        $sql_delete = "DELETE FROM salle";
        $result_delete = mysqli_query($db_handle, $sql_delete);

        $query_ajout = "INSERT INTO salle (info, regle, horaire) 
                            VALUES ('$info_salle', '$info_regle', '$infor_horaire')";
        $result_ajout = mysqli_query($db_handle, $query_ajout);
    }

    header("Location: ACCOUNT.php");
    exit;
}
?>
