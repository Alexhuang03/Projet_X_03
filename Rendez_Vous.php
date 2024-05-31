<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sportify</title>
        <style>

            .affiche-coach {
                border: 2px solid black;
                margin: 0 auto;
                width: fit-content;
            }
            .pres-coach, .coach-photo, .texte-coach {
                border: 2px solid black;
                margin: 0 auto;
                width: fit-content;
            }
            table {
                border: 2px solid black;
                margin: 0 auto;
                width: fit-content;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            .unavailable {
                background-color: black;
            }
            .available {
                background-color: white;
            }

        </style>
    </head>
    <body>
        <div id="wapper">
            <?php include 'src_header.php'; ?>
            <?php include 'src_navigation.php'; ?>

            <section id="All">
                <?php echo "<h3 style=''>Musculation</h3>"; ?>
                <?php $_SESSION['sport'] = "Musculation";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Fitness</h3>";?>
                <?php $_SESSION['sport'] = "Fitness";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Biking</h3>";?>
                <?php $_SESSION['sport'] = "Biking";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Cardio Training</h3>";?>
                <?php $_SESSION['sport'] = "Cardio-Training";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Cours Collectifs</h3>";?>
                <?php $_SESSION['sport'] = "Cours-Collectifs";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Basketball</h3>";?>
                <?php $_SESSION['sport'] = "Basketball";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Football</h3>";?>
                <?php $_SESSION['sport'] = "Football";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Rugby</h3>";?>
                <?php $_SESSION['sport'] = "Rugby";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Tennis</h3>";?>
                <?php $_SESSION['sport'] = "Tennis";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Natation</h3>";?>
                <?php $_SESSION['sport'] = "Natation";include 'PARCOURIR_affiche_coach.php'; ?>
                <?php echo "<h3>Plongeon</h3>";?>
                <?php $_SESSION['sport'] = "Plongeon";include 'PARCOURIR_affiche_coach.php'; ?>
            </section>

            <?php include 'src_footer.php'; ?>
        </div>
    </body>
</html>