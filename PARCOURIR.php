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

            <?php include 'src_header.php'; ?>
            <?php include 'src_navigation.php'; ?>

            <section id="activites-sportives">
                <h1>Activit&eacute;s sportives</h1>
                <p>D&eacute;couvrez nos activit&eacute;s sportives vari&eacute;es pour tous les niveaux et tous les &acirc;ges.</p>
                <section id="Musculation">
                    <h2>Musculation</h2>
                    <p>Am&eacute;liorez votre force et votre endurance avec nos programmes de musculation. La musculation est un &eacute;l&eacute;ment essentiel de tout programme de fitness. Que vous cherchiez &agrave; augmenter votre masse musculaire, &agrave; am&eacute;liorer votre force, ou &agrave; tonifier votre corps, notre programme de musculation est con&ccedil;u pour vous aider &agrave; atteindre vos objectifs de mani&egrave;re efficace et s&eacute;curis&eacute;e.
                    </p><h3>Pourquoi Choisir la Musculation ?</h3>
                    <ul>
                        <li><strong>Augmentation de la Force :</strong> La musculation renforce vos muscles, ce qui am&eacute;liore votre force globale et facilite les t&acirc;ches quotidiennes.</li>
                        <li><strong>Masse Musculaire :</strong> Que vous souhaitiez gagner en volume ou sculpter vos muscles, nos programmes vous guident &agrave; chaque &eacute;tape.</li>
                        <li><strong>Am&eacute;lioration de la Sant&eacute; Osseuse :</strong> Les exercices de r&eacute;sistance stimulent la formation osseuse, augmentant ainsi la densit&eacute; min&eacute;rale osseuse et r&eacute;duisant le risque d'ost&eacute;oporose.</li>
                        <li><strong>R&eacute;duction du Stress :</strong> L'activit&eacute; physique, y compris la musculation, lib&egrave;re des endorphines, qui sont des hormones du bien-&ecirc;tre, aidant &agrave; r&eacute;duire le stress et &agrave; am&eacute;liorer votre humeur.</li>
                        <li><strong>Gestion du Poids :</strong> La musculation augmente votre m&eacute;tabolisme basal, vous aidant ainsi &agrave; br&ucirc;ler plus de calories m&ecirc;me au repos.</li>
                    </ul>
                    <?php $_SESSION['sport'] = "Musculation";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Fitness">
                    <h2>Fitness</h2>
                    <p>Participez &agrave; nos s&eacute;ances de fitness pour rester en forme et en bonne sant&eacute;. Le fitness est un moyen idéal pour améliorer votre condition physique générale, votre santé mentale et votre bien-être. Que vous soyez un débutant cherchant à adopter un mode de vie plus actif ou un athlète souhaitant maintenir sa forme, notre programme de fitness est conçu pour répondre à vos besoins et objectifs.</p>
                    <h3>Pourquoi Choisir le Fitness ?</h3>
                    <ul>
                        <li><strong>Amélioration de la Santé Cardiovasculaire :</strong> Le fitness améliore la santé de votre cœur et de vos poumons, augmentant ainsi votre endurance et réduisant le risque de maladies cardiaques.</li>
                        <li><strong>Gestion du Poids :</strong> Les exercices de fitness vous aident à brûler des calories, à maintenir un poids sain et à réduire la graisse corporelle.</li>
                        <li><strong>Renforcement Musculaire :</strong> Le fitness inclut des exercices de résistance qui renforcent vos muscles, améliorant ainsi votre force et votre tonus musculaire.</li>
                        <li><strong>Réduction du Stress :</strong> L'activité physique libère des endorphines, les hormones du bien-être, qui aident à réduire le stress et à améliorer votre humeur.</li>
                        <li><strong>Flexibilité et Équilibre :</strong> Les exercices de fitness améliorent la flexibilité, l'équilibre et la coordination, réduisant ainsi le risque de blessures.</li>
                    </ul>

                    <?php $_SESSION['sport'] = "Fitness";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Biking">
                    <h2>Biking</h2>
                    <p>Rejoignez nos sessions de biking pour une exp&eacute;rience de cyclisme intense en salle. Le biking est une excellente manière de renforcer votre condition physique tout en vous amusant. Que vous soyez un cycliste expérimenté ou que vous cherchiez à découvrir une nouvelle activité, notre programme de biking est conçu pour répondre à tous les niveaux et vous aider à atteindre vos objectifs de santé et de forme physique.</p>
                    <h3>Pourquoi Choisir le Biking ?</h3>
                    <ul>
                        <li><strong>Cardio Exceptionnel :</strong> Le biking est une activité cardiovasculaire intense qui aide à améliorer la santé de votre cœur et de vos poumons.</li>
                        <li><strong>Renforcement Musculaire :</strong> En pédalant, vous renforcez vos muscles, en particulier ceux des jambes, des fessiers et du bas du dos.</li>
                        <li><strong>Brûlure Calorique :</strong> Le biking est un excellent moyen de brûler des calories et de gérer votre poids.</li>
                        <li><strong>Réduction du Stress :</strong> Comme toutes les activités physiques, le biking libère des endorphines, les hormones du bonheur, qui aident à réduire le stress et à améliorer votre humeur.</li>
                        <li><strong>Accessibilité :</strong> Le biking peut être pratiqué à tout âge et à tout niveau de forme physique, que ce soit en intérieur sur un vélo stationnaire ou en extérieur pour profiter de la nature.</li>
                    </ul>
                    <?php $_SESSION['sport'] = "Biking";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cardio-Training">
                    <h2>Cardio Training</h2>
                    <p>Am&eacute;liorez votre condition physique avec nos exercices de cardio training. Le cardio training est essentiel pour maintenir une bonne santé cardiovasculaire et améliorer votre endurance. Que vous soyez un athlète chevronné ou que vous débutiez votre parcours de remise en forme, nos programmes de cardio training sont conçus pour vous aider à atteindre vos objectifs de manière efficace et motivante.</p>
                    <h3>Pourquoi Choisir le Cardio Training ?</h3>
                    <ul>
                        <li><strong>Amélioration de la Santé Cardiovasculaire :</strong> Le cardio training renforce votre cœur et vos poumons, augmentant ainsi votre capacité d'endurance.</li>
                        <li><strong>Brûlure de Calories :</strong> Les exercices de cardio training sont parfaits pour brûler des calories et gérer votre poids.</li>
                        <li><strong>Réduction du Stress :</strong> L'activité cardiovasculaire libère des endorphines, réduisant le stress et améliorant votre humeur.</li>
                        <li><strong>Augmentation de l'Énergie :</strong> En améliorant votre endurance, le cardio training augmente votre niveau d'énergie pour les activités quotidiennes.</li>
                        <li><strong>Flexibilité et Mobilité :</strong> Les exercices de cardio training améliorent votre flexibilité et votre mobilité, réduisant ainsi le risque de blessures.</li>
                    </ul>
                    <?php $_SESSION['sport'] = "Cardio-Training";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>

                <section id="Cours-Collectifs">
                    <h2>Cours Collectifs</h2>
                    <p>Participez &agrave; nos cours collectifs pour une exp&eacute;rience d'entra&icirc;nement motivante et sociale. Les cours collectifs sont une excellente manière de rester motivé, de socialiser et de bénéficier de l'encadrement d'un coach professionnel. Que vous préfériez le cardio, le renforcement musculaire ou les exercices de flexibilité, nous avons un cours collectif qui répondra à vos besoins et à vos objectifs.</p>
                    <h3>Pourquoi Choisir les Cours Collectifs ?</h3>
                    <ul>
                        <li><strong>Motivation de Groupe :</strong> L'énergie et l'encouragement des autres participants vous motivent à donner le meilleur de vous-même.</li>
                        <li><strong>Encadrement Professionnel :</strong> Nos cours sont dirigés par des coachs certifiés qui vous guident et corrigent votre technique pour des résultats optimaux.</li>
                        <li><strong>Variété d'Exercices :</strong> Les cours collectifs offrent une grande variété d'exercices pour éviter la monotonie et travailler l'ensemble du corps.</li>
                        <li><strong>Socialisation :</strong> Rencontrez des personnes partageant les mêmes intérêts et créez des liens tout en faisant de l'exercice.</li>
                        <li><strong>Adaptabilité :</strong> Nos cours sont adaptés à tous les niveaux de forme physique, des débutants aux athlètes confirmés.</li>
                    </ul>
                    <?php $_SESSION['sport'] = "Cours-Collectifs";
                        include 'PARCOURIR_affiche_coach.php';
                    ?>
                </section>
            </section>

            <section id="competition">

                <h2>Nos Sports de Comp&eacute;tition</h2>
                <p>Engagez-vous dans nos sports de comp&eacute;tition et am&eacute;liorez vos comp&eacute;tences. Chez Sportify, nous proposons une variété de sports de compétition pour les athlètes de tous niveaux. Que vous soyez un débutant ou un compétiteur expérimenté, nos programmes de sports de compétition sont conçus pour améliorer vos compétences, renforcer votre esprit d'équipe et vous permettre de vous dépasser.</p>
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
