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

    <section id="Rugby">
        <h2>Rugby</h2>
        <p><strong>Rejoignez nos équipes de rugby et ressentez l'adrénaline des matchs de compétition !</strong></p>
        <p>Le rugby est bien plus qu'un simple sport, c'est une véritable école de vie où se mêlent intensité, stratégie et esprit d'équipe. Chez Sportify, nous offrons à nos membres l'opportunité de participer à des compétitions de rugby passionnantes et de vivre des moments mémorables sur le terrain. Participez à nos tournois de rugby et perfectionnez vos compétences de jeu.</p>
        <p><strong>Int&eacute;grez nos &eacute;quipes de rugby pour des entra&icirc;nements et des comp&eacute;titions stimulantes.</strong></p>
        <figure style="text-align: center;">
            <img src="img/rugby2.jpg" alt="Rugby" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Match intense de rugby avec l'équipe de l'ECE lors des OVALIES UNILASSALLE 2024</figcaption>
        </figure>
        <br>
        <h3>Pourquoi choisir le rugby de compétition avec Sportify ?</h3>
        <ul>
            <li><strong>Développement des Compétences :</strong> Améliorez vos compétences techniques, tactiques et physiques grâce à des entraînements intensifs et des matchs réguliers.</li>
            <li><strong>Esprit d'Équipe :</strong> Faites partie d'une équipe soudée, où l'entraide et la camaraderie sont au cœur de l'expérience sportive.</li>
            <li><strong>Compétitions Régulières :</strong> Participez à des tournois et championnats organisés, et mesurez-vous aux meilleures équipes locales et régionales.</li>
            <li><strong>Encadrement Professionnel :</strong> Bénéficiez des conseils et de l'expertise de nos coachs qualifiés, qui vous aideront à atteindre vos objectifs sportifs.</li>
            <li><strong>Événements Spéciaux :</strong> Participez à des événements spéciaux et des matchs amicaux contre d'autres clubs, et vivez des expériences uniques.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/rugby3.jpg" alt="Rugby" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>L'équipe féminine de rugby de l'ECE en pleine préparation pour un match décisif.</figcaption>
        </figure>
        <br>
        <h3>D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Rugby : </h3>
        <br>
        <?php $_SESSION['sport'] = "Rugby";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
