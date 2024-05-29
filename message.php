<?php
session_start();
$bdd = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $bdd);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = mysqli_prepare($db_handle, 'SELECT * FROM users WHERE id = ?');
    mysqli_stmt_bind_param($recupUser, 'i', $getid);
    mysqli_stmt_execute($recupUser);
    $result = mysqli_stmt_get_result($recupUser);

    if (mysqli_num_rows($result) > 0) {
        if (isset($_POST['envoyer'])) {
            $message = htmlspecialchars($_POST['message']);
            $insererMessage = mysqli_prepare($db_handle, 'INSERT INTO chatroom (message, id_coach, id_user) VALUES (?, ?, ?)');
            mysqli_stmt_bind_param($insererMessage, 'sii', $message, $getid, $_SESSION['id']);
            mysqli_stmt_execute($insererMessage);
        }
    } else {
        echo "Aucun utilisateur trouvé";
    }
} else {
    echo "Aucun utilisateur trouvé";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Messages privés</title>
    <meta charset="utf-8">
</head>
<body>
<form method="POST" action="">
    <textarea name="message"></textarea>
    <br/><br/>
    <input type='submit' name="envoyer">
</form>

<section id="messages">
    <?php
    $recupMessages = mysqli_prepare($db_handle, '
                SELECT * FROM chatroom 
                WHERE (id_user = ? AND id_coach = ?)
                OR (id_user = ? AND id_coach = ?)
            ');
    mysqli_stmt_bind_param($recupMessages, 'iiii', $_SESSION['id'], $getid, $getid, $_SESSION['id']);
    mysqli_stmt_execute($recupMessages);
    $result = mysqli_stmt_get_result($recupMessages);

    while ($message = mysqli_fetch_assoc($result)) {
        if ($message['id_coach'] == $_SESSION['id']) {
            echo '<p style="color: red;">' . htmlspecialchars($message['message']) . '</p>';
        } else {
            echo '<p style="color: green;">' . htmlspecialchars($message['message']) . '</p>';
        }
    }
    ?>
</section>
</body>
</html>
