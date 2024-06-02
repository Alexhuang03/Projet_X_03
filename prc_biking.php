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

    <section id="Biking" style="text-align: center;">
        <h2 style="text-align: center;">Biking</h2>
        <p style="text-align: center;">Rejoignez nos sessions de biking pour une exp&eacute;rience de cyclisme intense en salle. Le biking est une excellente mani&egrave;re de renforcer votre condition physique tout en vous amusant. Que vous soyez un cycliste exp&eacute;riment&eacute; ou que vous cherchiez &agrave; d&eacute;couvrir une nouvelle activit&eacute;, notre programme de biking est con&ccedil;u pour r&eacute;pondre &agrave; tous les niveaux et vous aider &agrave; atteindre vos objectifs de sant&eacute; et de forme physique.</p>
        <br>
        <img src="img/biking2.jpeg" alt="Biking" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3 style="text-align: center;">Pourquoi Choisir le Biking ?</h3>
        <ul style="text-align: left; display: inline-block; margin: 0 auto;">
            <li><strong>Cardio Exceptionnel :</strong> Le biking est une activit&eacute; cardiovasculaire intense qui aide &agrave; am&eacute;liorer la sant&eacute; de votre c&oelig;ur et de vos poumons.</li>
            <li><strong>Renforcement Musculaire :</strong> En p&eacute;dalant, vous renforcez vos muscles, en particulier ceux des jambes, des fessiers et du bas du dos.</li>
            <li><strong>Br&ucirc;lure Calorique :</strong> Le biking est un excellent moyen de br&ucirc;ler des calories et de g&eacute;rer votre poids.</li>
            <li><strong>R&eacute;duction du Stress :</strong> Comme toutes les activit&eacute;s physiques, le biking lib&egrave;re des endorphines, les hormones du bonheur, qui aident &agrave; r&eacute;duire le stress et &agrave; am&eacute;liorer votre humeur.</li>
            <li><strong>Accessibilit&eacute; :</strong> Le biking peut &ecirc;tre pratiqu&eacute; &agrave; tout &acirc;ge et &agrave; tout niveau de forme physique, que ce soit en int&eacute;rieur sur un v&eacute;lo stationnaire ou en ext&eacute;rieur pour profiter de la nature.</li>
        </ul>
        <br>
        <img src="img/bike3.jpg" alt="Biking" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3 style="text-align: center;">D&eacute;couvrez notre coach sp&eacute;cialis&eacute; en Biking: </h3>
        <br>
        <?php $_SESSION['sport'] = "Biking";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>
