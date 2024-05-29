<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="result-66572a02a4ee5">Sportify</title>
        <link rel="stylesheet" href="PARCOURIR.css">

    </head>
    <body>
    <div id="wapper">

        <?php include 'src_header.php'; ?>
        <?php include 'src_navigation.php'; ?>

        <section id="Plongeon">
            <h2>Plongeon</h2>
            <p>D&eacute;couvrez nos sessions de plongeon pour les amateurs de sports aquatiques extr&ecirc;mes.</p>
            <?php
            $_SESSION['sport'] = "Plongeon";
            include 'PARCOURIR_affiche_coach.php';
            ?>
        </section>

        <?php include 'src_footer.php'; ?>
    </div>
    </body>
</html>

