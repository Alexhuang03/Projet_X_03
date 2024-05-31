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

    <?php include 'src_header.php';?>
    <?php include 'src_navigation.php';?>
    <section id="Basketball">
        <h2>Nos Sports de Comp&eacute;tition</h2>
        <p>Engagez-vous dans nos sports de comp&eacute;tition et am&eacute;liorez vos comp&eacute;tences. Chez Sportify, nous proposons une vari&eacute;t&eacute; de sports de comp&eacute;tition pour les athl&egrave;tes de tous niveaux. Que vous soyez un d&eacute;butant ou un comp&eacute;titeur exp&eacute;riment&eacute;, nos programmes de sports de comp&eacute;tition sont con&ccedil;us pour am&eacute;liorer vos comp&eacute;tences, renforcer votre esprit d'&eacute;quipe et vous permettre de vous d&eacute;passer.</p>
        <h2>Basketball</h2>
        <p>Rejoignez nos &eacute;quipes de basketball pour des matchs et des entra&icirc;nements r&eacute;guliers. Le basketball est un sport d'&eacute;quipe passionnant qui am&eacute;liore la condition physique, la coordination, et l'esprit d'&eacute;quipe. Nos programmes sont con&ccedil;us pour tous les niveaux, que vous soyez d&eacute;butant ou joueur confirm&eacute;.</p>
        <p><strong id="result-665913ea73591">Notre &eacute;quipe de basketball de l'ECE est fi&egrave;re d'&ecirc;tre championne de France universitaire, un titre qui t&eacute;moigne de notre engagement et de notre excellence dans ce sport.</strong></p>
        <br>
        <figure style="text-align: center;">
            <img src="img/basket2.jpg" alt="Basketball" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>Finale du Championnat de France</figcaption>
        </figure>
        <br>
        <h3>Pourquoi Choisir le Basketball ?</h3>
        <ul>
            <li><strong>Am&eacute;lioration de la Condition Physique :</strong> Le basketball est un excellent moyen d'am&eacute;liorer votre endurance, votre force et votre agilit&eacute;.</li>
            <li><strong>D&eacute;veloppement de Comp&eacute;tences :</strong> En jouant au basketball, vous d&eacute;veloppez des comp&eacute;tences essentielles telles que la coordination, la concentration et l'esprit d'&eacute;quipe.</li>
            <li><strong>Esprit d'&Eacute;quipe :</strong> Le basketball est un sport collectif qui favorise la camaraderie et l'esprit d'&eacute;quipe, vous aidant &agrave; cr&eacute;er des liens forts avec vos co&eacute;quipiers.</li>
            <li><strong>Comp&eacute;tition et Divertissement :</strong> Participez &agrave; des matchs et des comp&eacute;titions excitantes tout en vous amusant et en vous d&eacute;fiant.</li>
            <li><strong>Encadrement de Qualit&eacute; :</strong> Nos entra&icirc;neurs exp&eacute;riment&eacute;s vous guideront pour am&eacute;liorer vos comp&eacute;tences et atteindre vos objectifs.</li>
        </ul>
        <br>
        <figure style="text-align: center;">
            <img src="img/basket3.jpg" alt="Basketball" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
            <figcaption>L'ECE champion de France Universitaire</figcaption>
        </figure>
        <br>
        <h3>Découvrez notre coach spécialisé en Basketball : </h3>
        <br>
        <?php $_SESSION['sport'] = "Basketball";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>
    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
