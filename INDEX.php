<?php
    session_start();
    if (!isset($_SESSION['user_role'])) {
        $_SESSION['user_role'] = '';
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sportify</title>
    </head>
    <body>
    <div id="wapper">

        <?php include 'src_header.php'; ?>
        <?php include 'src_navigation.php'; ?>

        <?php include 'src_index_section.php'; ?>

        <?php include 'src_footer.php'; ?>

    </body>
</html>