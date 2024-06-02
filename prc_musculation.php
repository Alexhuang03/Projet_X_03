<!DOCTYPE html>
<?php session_start();
?><html lang="fr">
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

    <section id="Musculation" style="text-align: center;">
        <h1 style="text-align: center;">Activit&eacute;s sportives</h1>
        <p style="text-align: center;">D&eacute;couvrez nos activit&eacute;s sportives vari&eacute;es pour tous les niveaux et tous les &acirc;ges.</p>
        <p style="text-align: center;">Chez Sportify, nous offrons une vaste gamme d'activités sportives adaptées à tous les niveaux et tous les âges. Que vous soyez débutant ou athlète confirmé, vous trouverez l'activité qui vous convient parmi notre sélection diversifiée. Nos programmes sont conçus pour répondre à vos objectifs de remise en forme, de développement musculaire, d'endurance et de bien-être général.</p>
        <h2 style="text-align: center;">Musculation</h2>
        <p style="text-align: center;"">Am&eacute;liorez votre force et votre endurance avec nos programmes de musculation. La musculation est un &eacute;l&eacute;ment essentiel de tout programme de fitness. Que vous cherchiez &agrave; augmenter votre masse musculaire, &agrave; am&eacute;liorer votre force, ou &agrave; tonifier votre corps, notre programme de musculation est con&ccedil;u pour vous aider &agrave; atteindre vos objectifs de mani&egrave;re efficace et s&eacute;curis&eacute;e.</p>
        <br>
        <img src="img/musculation2.jpg" alt="Musculation" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3 style="text-align: center;">Pourquoi Choisir la Musculation ?</h3>
        <ul style="text-align: left; display: inline-block; margin: 0 auto;">
            <li><strong>Augmentation de la Force :</strong> La musculation renforce vos muscles, ce qui am&eacute;liore votre force globale et facilite les t&acirc;ches quotidiennes.</li>
            <li><strong>Masse Musculaire :</strong> Que vous souhaitiez gagner en volume ou sculpter vos muscles, nos programmes vous guident &agrave; chaque &eacute;tape.</li>
            <li><strong>Am&eacute;lioration de la Sant&eacute; Osseuse :</strong> Les exercices de r&eacute;sistance stimulent la formation osseuse, augmentant ainsi la densit&eacute; min&eacute;rale osseuse et r&eacute;duisant le risque d'ost&eacute;oporose.</li>
            <li><strong>R&eacute;duction du Stress :</strong> L'activit&eacute; physique, y compris la musculation, lib&egrave;re des endorphines, qui sont des hormones du bien-&ecirc;tre, aidant &agrave; r&eacute;duire le stress et &agrave; am&eacute;liorer votre humeur.</li>
            <li><strong>Gestion du Poids :</strong> La musculation augmente votre m&eacute;tabolisme basal, vous aidant ainsi &agrave; br&ucirc;ler plus de calories m&ecirc;me au repos.</li>
        </ul>
        <br>
        <img src="img/muscu3.jpg" alt="Musculation" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3 style="text-align: center;">D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Musculation: </h3>
        <?php $_SESSION['sport'] = "Musculation";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
