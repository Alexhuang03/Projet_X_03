<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
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

                <p>Découvrez nos activités sportives variées pour tous les niveaux et tous les âges.</p>
                <h2>Activités sportives</h2>
                <section id="Musculation">
                    <h2>Musculation</h2>
                    <p>Améliorez votre force et votre endurance avec nos programmes de musculation.</p>
                    <?php
                        $_SESSION['sport'] = "Musculation";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Fitness">
                    <h2>Fitness</h2>
                    <p>Participez à nos séances de fitness pour rester en forme et en bonne santé.</p>
                    <?php
                        $_SESSION['sport'] = "Fitness";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Biking">
                    <h2>Biking</h2>
                    <p>Rejoignez nos sessions de biking pour une expérience de cyclisme intense en salle.</p>
                    <?php
                        $_SESSION['sport'] = "Biking";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cardio-Training">
                    <h2>Cardio Training</h2>
                    <p>Améliorez votre condition physique avec nos exercices de cardio training.</p>
                    <?php
                        $_SESSION['sport'] = "Cardio-Training";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cours-Collectifs">
                    <h2>Cours Collectifs</h2>
                    <p>Participez à nos cours collectifs pour une expérience d'entraînement motivante et sociale.</p>
                    <?php
                        $_SESSION['sport'] = "Cours-Collectifs";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>
            </section>

            <section id="competition">

                <h2>Nos Sports de Compétition</h2>
                <p>Engagez-vous dans nos sports de compétition et améliorez vos compétences.</p>
                <section id="Basketball">
                    <h2>Basketball</h2>
                    <p>Rejoignez nos équipes de basketball pour des matchs et des entraînements réguliers.</p>
                    <?php
                        $_SESSION['sport'] = "Basketball";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Football">
                    <h2>Football</h2>
                    <p>Participez à nos tournois de football et améliorez vos techniques de jeu.</p>
                    <?php
                        $_SESSION['sport'] = "Football";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Rugby">
                    <h2>Rugby</h2>
                    <p>Intégrez nos équipes de rugby pour des entraînements et des compétitions stimulantes.</p>
                    <?php
                        $_SESSION['sport'] = "Rugby";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Tennis">
                    <h2>Tennis</h2>
                    <p>Améliorez votre jeu de tennis avec nos cours et nos matchs réguliers.</p>
                    <?php
                        $_SESSION['sport'] = "Tennis";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Natation">
                    <h2>Natation</h2>
                    <p>Rejoignez nos séances de natation pour une activité physique complète et rafraîchissante.</p>
                    <?php
                        $_SESSION['sport'] = "Natation";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Plongeon">
                    <h2>Plongeon</h2>
                    <p>Découvrez nos sessions de plongeon pour les amateurs de sports aquatiques extrêmes.</p>
                    <?php
                        $_SESSION['sport'] = "Plongeon";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>
            </section>

            <section id="salle-de-sport">
                <h2>Salle de Sport Omnes</h2>
                <p>Découvrez notre salle de sport Omnes, équipée des meilleurs équipements pour vos entraînements.</p>
                <section id="Regles">
                    <h2>Règles</h2>
                    <p>Consultez les règles de notre salle de sport pour assurer une bonne utilisation des installations.</p>
                </section>
                <section id="Horaire">
                    <h2>Horaires</h2>
                    <p>Consultez les horaires d'ouverture de notre salle de sport pour planifier vos séances d'entraînement.</p>
                </section>
            </section>

            <?php include 'src_footer.php'; ?>
        </div>
    </body>
</html>

