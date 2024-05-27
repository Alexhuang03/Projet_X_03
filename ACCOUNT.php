<?php
    session_start()
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

            <?php
            if (isset($_SESSION['user_role'])) {
                if ($_SESSION['user_role'] == 'admin') {
                    include 'ACCOUNT_admin.php';
                }
                elseif ($_SESSION['user_role'] == 'coach') {
                    include 'ACCOUNT_coach.php';
                }
                elseif ($_SESSION['user_role'] == 'client') {
                    include 'ACCOUNT_client.php';
                }
            }
            ?>

            <?php include 'src_footer.php'; ?>
        </div>
    </body>
</html>

