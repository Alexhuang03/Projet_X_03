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

    <section id="Plongeon" style="text-align: center;">
        <h2 style="text-align: center;">Plongeon</h2>
        <p style="text-align: center;"><strong>Rejoignez nos équipes de plongeon et vivez l'excitation des compétitions aquatiques spectaculaires !</strong></p>
        <p style="text-align: center;">Le plongeon est bien plus qu'un sport, c'est un art qui combine la grâce, la précision et le courage. Chez Sportify, nous offrons à nos membres l'opportunité de participer à des compétitions de plongeon passionnantes et de vivre des moments mémorables dans l'eau. Participez à nos compétitions de plongeon et perfectionnez vos compétences de saut.</p>
        <br>
        <p style="text-align: center;"><strong>D&eacute;couvrez nos sessions de plongeon pour les amateurs de sports aquatiques extr&ecirc;mes.</strong></p>
        <figure style="text-align: center;">
            <img src="img/plongeon2.jpg" alt="Plongeon" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Entrainement au plongeon</figcaption>
        </figure>
        <br>
        <h3 style="text-align: center;">Pourquoi choisir le plongeon de compétition avec Sportify ?</h3>
        <ul style="text-align: left; display: inline-block; margin: 0 auto;">
            <li><strong>Développement des Compétences :</strong> Améliorez vos compétences techniques et physiques grâce à des entraînements intensifs et des compétitions régulières.</li>
            <li><strong>Esprit d'Équipe :</strong> Faites partie d'une équipe soudée, où l'entraide et la camaraderie sont au cœur de l'expérience sportive.</li>
            <li><strong>Compétitions Régulières :</strong> Participez à des tournois et championnats organisés, et mesurez-vous aux meilleurs plongeurs locaux et régionaux.</li>
            <li><strong>Encadrement Professionnel :</strong> Bénéficiez des conseils et de l'expertise de nos coachs qualifiés, qui vous aideront à atteindre vos objectifs sportifs.</li>
            <li><strong>Événements Spéciaux :</strong> Participez à des événements spéciaux et des compétitions amicales contre d'autres clubs, et vivez des expériences uniques.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/plongeon3.jpg" alt="Plongeon" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Spectaculaire plongeon en compétition avec l'équipe de l'ECE</figcaption>
        </figure>
        <br>
        <h3>D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Plongeon : </h3>
        <br>
        <?php
        $_SESSION['sport'] = "Plongeon";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>