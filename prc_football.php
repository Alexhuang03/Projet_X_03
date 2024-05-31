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

    <section id="Football">
        <h2>Football</h2>
        <p>Participez &agrave; nos tournois de football et am&eacute;liorez vos techniques de jeu. Le football est bien plus qu'un simple sport, c'est une véritable passion qui unit des millions de personnes à travers le monde. À Omnes, nous vous offrons l'opportunité de participer à des compétitions intenses et passionnantes, que vous soyez un amateur ou un joueur expérimenté.</p>
        <h3>Rejoignez Nos Équipes de Football</h3>
        <p>Que vous souhaitiez améliorer votre jeu ou simplement profiter de l'excitation de la compétition, nos équipes de football vous accueillent à bras ouverts. Nos coachs qualifiés vous guident à travers des entraînements rigoureux et vous préparent pour des tournois locaux et nationaux.</p>
        <p>L'une des équipes phares d'Omnes est celle de l'ECE, reconnue pour ses performances exceptionnelles et son esprit de compétition. Rejoignez-nous et faites partie de cette aventure excitante, où chaque match est une nouvelle opportunité de briller et de faire la différence sur le terrain.</p>
        <p>Que vous soyez un passionné de longue date ou un nouveau venu, le football en compétition chez Sportify est l'endroit idéal pour développer vos compétences, forger des amitiés et vivre des moments inoubliables.</p>
        <br>
        <img src="img/football2.jpg" alt="Football" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3>Pourquoi Choisir le Football de Compétition ?</h3>
        <ul>
            <li><strong>Développement des Compétences Techniques :</strong> Les séances d'entraînement et les matchs de compétition sont conçus pour améliorer vos compétences techniques, votre contrôle du ballon et votre jeu de pieds.</li>
            <li><strong>Renforcement de l'Esprit d'Équipe :</strong> Le football est un sport collectif par excellence. Jouer en équipe développe votre capacité à communiquer, coopérer et atteindre des objectifs communs.</li>
            <li><strong>Amélioration de la Condition Physique :</strong> Les entraînements réguliers et les matchs compétitifs augmentent votre endurance, votre agilité et votre force.</li>
            <li><strong>Gestion du Stress et de la Pression :</strong> Apprenez à gérer la pression et à prendre des décisions rapides dans des situations de jeu réelles.</li>
            <li><strong>Opportunités de Carrière :</strong> Pour ceux qui aspirent à une carrière professionnelle, les compétitions offrent une vitrine pour se faire repérer par des recruteurs et des clubs.</li>
        </ul>
        <br>
        <img src="img/football3.jpg" alt="Football" style="width:100%; max-width:600px; display:block; margin: 20px auto;">
        <br>
        <h3>Découvrez notre coach spécialisé en Football : </h3>
        <br>
        <?php
        $_SESSION['sport'] = "Football";
        include 'PARCOURIR_affiche_coach.php';
        ?>
    </section>

    <?php include 'src_footer.php'; ?>
</div>
</body>
</html>

