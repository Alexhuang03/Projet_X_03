<!DOCTYPE html>
<?php session_start();
?><html lang="fr">
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

    <section id="Football">
        <h2>Football</h2>
        <p><strong> Rejoignez nos équipes de football et vivez l'excitation des matchs de compétition !</strong></p>
        <p>Le football est bien plus qu'un sport; c'est une passion qui rassemble des millions de personnes à travers le monde. Chez Sportify, nous offrons à nos membres la possibilité de participer à des compétitions de football excitantes et de vivre des moments inoubliables sur le terrain. Participez &agrave; nos tournois de football et am&eacute;liorez vos techniques de jeu.</p>
        <br>
        <figure style="text-align: center;">
            <img src="img/football2.jpg" alt="Football" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Match intense entre les équipes de football de l'ECE et de l'IESEG</figcaption>
        </figure>
        <br>
        <h3>Pourquoi choisir le football de compétition avec Sportify ?</h3>
        <ul>
            <li><strong>Développement des Compétences :</strong> Améliorez vos compétences techniques, tactiques et physiques grâce à des entraînements intensifs et des matchs réguliers.</li>
            <li><strong>Esprit d'Équipe :</strong>Faites partie d'une équipe soudée, où l'entraide et la camaraderie sont au cœur de l'expérience sportive.</li>
            <li><strong>Compétitions Régulières :</strong>Participez à des tournois et championnats organisés, et mesurez-vous aux meilleures équipes locales et régionales.</li>
            <li><strong>Encadrement Professionnel :</strong>Bénéficiez des conseils et de l'expertise de nos coachs qualifiés, qui vous aideront à atteindre vos objectifs sportifs.</li>
            <li><strong>Événements Spéciaux :</strong>Participez à des événements spéciaux et des matchs amicaux contre d'autres clubs, et vivez des expériences uniques.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/football3.jpg" alt="Football" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>L'équipe de football de l'ECE se prépare pour un match décisif</figcaption>
        </figure>
        <br>
            <h3>D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Football : </h3>
        <br>
        <?php $_SESSION['sport'] = "Football";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
