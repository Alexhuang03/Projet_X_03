<?php
session_start();
$bdd = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $bdd);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Tous les utilisateurs</title>
    <meta charset="utf-8">
</head>
<body>
<?php
$recupUser = mysqli_query($db_handle, 'SELECT * FROM users');
while ($user = mysqli_fetch_assoc($recupUser)) {
    echo '<a href="message.php?id=' . $user['id'] . '"><p>' . htmlspecialchars($user['prenom']) . '</p></a>';
}
?>
</body>
</html>
