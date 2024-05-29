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

    <section id="Cours-Collectifs">
        <h2>Cours Collectifs</h2>
        <p>Participez &agrave; nos cours collectifs pour une exp&eacute;rience d'entra&icirc;nement motivante et sociale. Les cours collectifs sont une excellente mani&egrave;re de rester motiv&eacute;, de socialiser et de b&eacute;n&eacute;ficier de l'encadrement d'un coach professionnel. Que vous pr&eacute;f&eacute;riez le cardio, le renforcement musculaire ou les exercices de flexibilit&eacute;, nous avons un cours collectif qui r&eacute;pondra &agrave; vos besoins et &agrave; vos objectifs.</p>
        <h3>Pourquoi Choisir les Cours Collectifs ?</h3>
        <ul>
            <li><strong>Motivation de Groupe :</strong> L'&eacute;nergie et l'encouragement des autres participants vous motivent &agrave; donner le meilleur de vous-m&ecirc;me.</li>
            <li><strong>Encadrement Professionnel :</strong> Nos cours sont dirig&eacute;s par des coachs certifi&eacute;s qui vous guident et corrigent votre technique pour des r&eacute;sultats optimaux.</li>
            <li><strong>Vari&eacute;t&eacute; d'Exercices :</strong> Les cours collectifs offrent une grande vari&eacute;t&eacute; d'exercices pour &eacute;viter la monotonie et travailler l'ensemble du corps.</li>
            <li><strong>Socialisation :</strong> Rencontrez des personnes partageant les m&ecirc;mes int&eacute;r&ecirc;ts et cr&eacute;ez des liens tout en faisant de l'exercice.</li>
            <li><strong>Adaptabilit&eacute; :</strong> Nos cours sont adapt&eacute;s &agrave; tous les niveaux de forme physique, des d&eacute;butants aux athl&egrave;tes confirm&eacute;s.</li>
        </ul>
        <?php $_SESSION['sport'] = "Cours-Collectifs";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

