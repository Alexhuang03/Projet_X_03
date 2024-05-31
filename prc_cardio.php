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

    <section id="Cardio-Training">
        <h2>Cardio Training</h2>
        <p>Am&eacute;liorez votre condition physique avec nos exercices de cardio training. Le cardio training est essentiel pour maintenir une bonne sant&eacute; cardiovasculaire et am&eacute;liorer votre endurance. Que vous soyez un athl&egrave;te chevronn&eacute; ou que vous d&eacute;butiez votre parcours de remise en forme, nos programmes de cardio training sont con&ccedil;us pour vous aider &agrave; atteindre vos objectifs de mani&egrave;re efficace et motivante.</p>
        <br>
        <img src="img/cardiotraining2.jpeg" alt="Cardio" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3>Pourquoi Choisir le Cardio Training ?</h3>
        <ul>
            <li><strong>Am&eacute;lioration de la Sant&eacute; Cardiovasculaire :</strong> Le cardio training renforce votre c&oelig;ur et vos poumons, augmentant ainsi votre capacit&eacute; d'endurance.</li>
            <li><strong>Br&ucirc;lure de Calories :</strong> Les exercices de cardio training sont parfaits pour br&ucirc;ler des calories et g&eacute;rer votre poids.</li>
            <li><strong>R&eacute;duction du Stress :</strong> L'activit&eacute; cardiovasculaire lib&egrave;re des endorphines, r&eacute;duisant le stress et am&eacute;liorant votre humeur.</li>
            <li><strong>Augmentation de l'&Eacute;nergie :</strong> En am&eacute;liorant votre endurance, le cardio training augmente votre niveau d'&eacute;nergie pour les activit&eacute;s quotidiennes.</li>
            <li><strong>Flexibilit&eacute; et Mobilit&eacute; :</strong> Les exercices de cardio training am&eacute;liorent votre flexibilit&eacute; et votre mobilit&eacute;, r&eacute;duisant ainsi le risque de blessures.</li>
        </ul>
        <h3>Découvrez notre coach spécialisé en Cardio: </h3>
        <br>
        <?php $_SESSION['sport'] = "Cardio-Training";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

