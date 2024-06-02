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


    <section id="Natation">
        <h2>Natation</h2>
        <p><strong>Rejoignez nos équipes de natation et vivez l'excitation des compétitions aquatiques !</strong></p>
        <p>La natation est bien plus qu'un simple sport, c'est un défi physique et mental où se mêlent technique, endurance et rapidité. Chez Sportify, nous offrons à nos membres l'opportunité de participer à des compétitions de natation passionnantes et de vivre des moments mémorables dans l'eau. Participez à nos tournois de natation et perfectionnez vos compétences de nage.</p>
        <br>
        <p><strong>Rejoignez nos s&eacute;ances de natation pour une activit&eacute; physique compl&egrave;te et rafra&icirc;chissante.</strong></p>
        <figure style="text-align: center;">
            <img src="img/natation2.jpg" alt="Natation" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Impressionante compétition de natation avec l'équipe de l'ECE</figcaption>
        </figure>
        <br>
        <h3>Pourquoi choisir la natation de compétition avec Sportify ?</h3>
        <ul>
            <li><strong>Développement des Compétences :</strong> Améliorez vos compétences techniques, tactiques et physiques grâce à des entraînements intensifs et des compétitions régulières.</li>
            <li><strong>Esprit d'Équipe :</strong> Faites partie d'une équipe soudée, où l'entraide et la camaraderie sont au cœur de l'expérience sportive.</li>
            <li><strong>Compétitions Régulières :</strong> Participez à des tournois et championnats organisés, et mesurez-vous aux meilleurs nageurs locaux et régionaux.</li>
            <li><strong>Encadrement Professionnel :</strong> Bénéficiez des conseils et de l'expertise de nos coachs qualifiés, qui vous aideront à atteindre vos objectifs sportifs.</li>
            <li><strong>Événements Spéciaux :</strong> Participez à des événements spéciaux et des compétitions amicales contre d'autres clubs, et vivez des expériences uniques.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/natation3.jpg" alt="Natation" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>L'équipe de natation de l'ECE se prépare pour une compétition</figcaption>
        </figure>
        <br>
        <h3>D&eacute;couvrez notre coach sp&eacute;cialis&eacute;e en Natation : </h3>
        <br>
        <?php
        $_SESSION['sport'] = "Natation";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

