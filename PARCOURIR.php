<!DOCTYPE html>
<?php session_start();
?><html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sportify</title>

    </head>
    <body>
        <div id="wapper">

            <?php include 'src_header.php'; ?>
            <?php include 'src_navigation.php'; ?>

            <section id="activites-sportives">

                <p>D&eacute;couvrez nos activit&eacute;s sportives vari&eacute;es pour tous les niveaux et tous les &acirc;ges.</p>
                <h2>Activit&eacute;s sportives</h2>
                <section id="Musculation">
                    <h2>Musculation</h2>
                    <p id="result-665661eddf41e">Am&eacute;liorez votre force et votre endurance avec nos programmes de musculation.</p>
                    <?php $_SESSION['sport'] = "Musculation";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Fitness">
                    <h2>Fitness</h2>
                    <p>Participez &agrave; nos s&eacute;ances de fitness pour rester en forme et en bonne sant&eacute;.</p>
                    <?php $_SESSION['sport'] = "Fitness";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Biking">
                    <h2>Biking</h2>
                    <p>Rejoignez nos sessions de biking pour une exp&eacute;rience de cyclisme intense en salle.</p>
                    <?php $_SESSION['sport'] = "Biking";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cardio-Training">
                    <h2>Cardio Training</h2>
                    <p>Am&eacute;liorez votre condition physique avec nos exercices de cardio training.</p>
                    <?php $_SESSION['sport'] = "Cardio-Training";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cours-Collectifs">
                    <h2>Cours Collectifs</h2>
                    <p>Participez &agrave; nos cours collectifs pour une exp&eacute;rience d'entra&icirc;nement motivante et sociale.</p>
                    <?php $_SESSION['sport'] = "Cours-Collectifs";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>
            </section>

            <section id="competition">

                <h2>Nos Sports de Comp&eacute;tition</h2>
                <p>Engagez-vous dans nos sports de comp&eacute;tition et am&eacute;liorez vos comp&eacute;tences.</p>
                <section id="Basketball">
                    <h2>Basketball</h2>
                    <p>Rejoignez nos &eacute;quipes de basketball pour des matchs et des entra&icirc;nements r&eacute;guliers.</p>
                    <?php $_SESSION['sport'] = "Basketball";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Football">
                    <h2>Football</h2>
                    <p>Participez &agrave; nos tournois de football et am&eacute;liorez vos techniques de jeu.</p>
                    <?php $_SESSION['sport'] = "Football";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Rugby">
                    <h2>Rugby</h2>
                    <p>Int&eacute;grez nos &eacute;quipes de rugby pour des entra&icirc;nements et des comp&eacute;titions stimulantes.</p>
                    <?php $_SESSION['sport'] = "Rugby";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Tennis">
                    <h2>Tennis</h2>
                    <p>Am&eacute;liorez votre jeu de tennis avec nos cours et nos matchs r&eacute;guliers.</p>
                    <?php $_SESSION['sport'] = "Tennis";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Natation">
                    <h2>Natation</h2>
                    <p>Rejoignez nos s&eacute;ances de natation pour une activit&eacute; physique compl&egrave;te et rafra&icirc;chissante.</p>
                    <?php $_SESSION['sport'] = "Natation";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Plongeon">
                    <h2>Plongeon</h2>
                    <p>D&eacute;couvrez nos sessions de plongeon pour les amateurs de sports aquatiques extr&ecirc;mes.</p>
                    <?php $_SESSION['sport'] = "Plongeon";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>
            </section>

            <section id="salle-de-sport">
                <h2>Salle de Sport Omnes</h2>
                <p>D&eacute;couvrez notre salle de sport Omnes, &eacute;quip&eacute;e des meilleurs &eacute;quipements pour vos entra&icirc;nements.</p>
                <section id="Regles">
                    <h2>R&egrave;gles</h2>
                    <p>Consultez les r&egrave;gles de notre salle de sport pour assurer une bonne utilisation des installations.</p>
                </section>
                <section id="Horaire">
                    <h2>Horaires</h2>
                    <p>Consultez les horaires d'ouverture de notre salle de sport pour planifier vos s&eacute;ances d'entra&icirc;nement.</p>
                </section>
            </section>

            <?php include 'src_footer.php'; ?>
        </div>
    </body>
</html>
