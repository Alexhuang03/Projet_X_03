<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify</title>
    <link rel="stylesheet" href="PARCOURIR.css">

</head>
<body>
<div id="wapper">

    <?php include 'src_header.php'; ?>
    <?php include 'src_navigation.php'; ?>

    <section id="Tennis" style="text-align: center;">
        <h2 style="text-align: center;">Tennis</h2>
        <p style="text-align: center;"><strong>Rejoignez nos équipes de tennis et vivez l'excitation des matchs de compétition !</strong></p>
        <p style="text-align: center;">Le tennis est bien plus qu'un simple sport, c'est un véritable défi où se mêlent technique, stratégie et endurance. Chez Sportify, nous offrons à nos membres l'opportunité de participer à des compétitions de tennis passionnantes et de vivre des moments mémorables sur le court. Participez à nos tournois de tennis et perfectionnez vos compétences de jeu.</p>
        <p style="text-align: center;"><strong>Am&eacute;liorez votre jeu de tennis avec nos cours et nos matchs r&eacute;guliers.</strong></p>
        <figure style="text-align: center;">
            <img src="img/tennis2.png" alt="Tennis" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Débrief avec le coach après un match</figcaption>
        </figure>
        <br>
        <h3 style="text-align: center;">Pourquoi choisir le tennis de compétition avec Sportify ?</h3>
        <ul style="text-align: left; display: inline-block; margin: 0 auto;">
            <li><strong>Développement des Compétences :</strong> Améliorez vos compétences techniques, tactiques et physiques grâce à des entraînements intensifs et des matchs réguliers.</li>
            <li><strong>Esprit d'Équipe :</strong> Faites partie d'une équipe soudée, où l'entraide et la camaraderie sont au cœur de l'expérience sportive.</li>
            <li><strong>Compétitions Régulières :</strong> Participez à des tournois et championnats organisés, et mesurez-vous aux meilleurs joueurs locaux et régionaux.</li>
            <li><strong>Encadrement Professionnel :</strong> Bénéficiez des conseils et de l'expertise de nos coachs qualifiés, qui vous aideront à atteindre vos objectifs sportifs.</li>
            <li><strong>Événements Spéciaux :</strong> Participez à des événements spéciaux et des matchs amicaux contre d'autres clubs, et vivez des expériences uniques.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/tennis3.png" alt="Tennis" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Nos membres en plein match</figcaption>
        </figure>
        <br>
        <h3 style="text-align: center;">D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Tennis : </h3>
        <br>
        <?php
        $_SESSION['sport'] = "Tennis";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

