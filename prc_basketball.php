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

    <section id="Basketball">
        <h2>Nos Sports de Comp&eacute;tition</h2>
        <p>Engagez-vous dans nos sports de comp&eacute;tition et am&eacute;liorez vos comp&eacute;tences. Chez Sportify, nous proposons une vari&eacute;t&eacute; de sports de comp&eacute;tition pour les athl&egrave;tes de tous niveaux. Que vous soyez un d&eacute;butant ou un comp&eacute;titeur exp&eacute;riment&eacute;, nos programmes de sports de comp&eacute;tition sont con&ccedil;us pour am&eacute;liorer vos comp&eacute;tences, renforcer votre esprit d'&eacute;quipe et vous permettre de vous d&eacute;passer.</p>
        <h2>Basketball</h2>
        <p id="result-665790376514a">Rejoignez nos &eacute;quipes de basketball pour des matchs et des entra&icirc;nements r&eacute;guliers.</p>
        <?php $_SESSION['sport'] = "Basketball";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

