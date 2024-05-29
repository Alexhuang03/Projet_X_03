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

    <section id="Fitness">
        <h2>Fitness</h2>
        <p>Participez &agrave; nos s&eacute;ances de fitness pour rester en forme et en bonne sant&eacute;. Le fitness est un moyen id&eacute;al pour am&eacute;liorer votre condition physique g&eacute;n&eacute;rale, votre sant&eacute; mentale et votre bien-&ecirc;tre. Que vous soyez un d&eacute;butant cherchant &agrave; adopter un mode de vie plus actif ou un athl&egrave;te souhaitant maintenir sa forme, notre programme de fitness est con&ccedil;u pour r&eacute;pondre &agrave; vos besoins et objectifs.</p>
        <h3>Pourquoi Choisir le Fitness ?</h3>
        <ul>
            <li><strong>Am&eacute;lioration de la Sant&eacute; Cardiovasculaire :</strong> Le fitness am&eacute;liore la sant&eacute; de votre c&oelig;ur et de vos poumons, augmentant ainsi votre endurance et r&eacute;duisant le risque de maladies cardiaques.</li>
            <li><strong>Gestion du Poids :</strong> Les exercices de fitness vous aident &agrave; br&ucirc;ler des calories, &agrave; maintenir un poids sain et &agrave; r&eacute;duire la graisse corporelle.</li>
            <li><strong>Renforcement Musculaire :</strong> Le fitness inclut des exercices de r&eacute;sistance qui renforcent vos muscles, am&eacute;liorant ainsi votre force et votre tonus musculaire.</li>
            <li><strong>R&eacute;duction du Stress :</strong> L'activit&eacute; physique lib&egrave;re des endorphines, les hormones du bien-&ecirc;tre, qui aident &agrave; r&eacute;duire le stress et &agrave; am&eacute;liorer votre humeur.</li>
            <li><strong>Flexibilit&eacute; et &Eacute;quilibre :</strong> Les exercices de fitness am&eacute;liorent la flexibilit&eacute;, l'&eacute;quilibre et la coordination, r&eacute;duisant ainsi le risque de blessures.</li>
        </ul>

        <?php $_SESSION['sport'] = "Fitness";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

