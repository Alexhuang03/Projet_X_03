<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="src_index_section.js"></script>

<!-- Dernier CSS compilé et minifié -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Bibliothèque jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Dernier JavaScript compilé -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="src_index_section.css" rel="stylesheet" type="text/css"/>
<style>
    body {
        background-color: #333; /* Couleur de fond gris foncé */
        color: white; /* Couleur du texte blanc */
        font-family: Arial, sans-serif; /* Police de caractères */
        margin: 0; /* Supprime les marges par défaut */
        padding: 0; /* Supprime les espacements intérieurs par défaut */
    }
    /* Styles pour le carrousel */
    #myCarousel {
        width: 60%; /* Largeur du carrousel */
        margin: 0 auto; /* Centrage horizontal */
    }

    /* Styles pour les images dans le carrousel */
    .carousel-inner .item img {
        max-width: 60%; /* Taille maximale de l'image à 100% de la largeur du conteneur */
        height: auto; /* Hauteur automatique pour conserver les proportions de l'image */
        margin: 0 auto; /* Centrage horizontal */
    }
    .event{
        max-width: 60%;
        margin: 0 auto; /* Centre les événements horizontalement */

    }
    .event h3,
    .event p {
        text-align: center;
    }
    h3 {
        text-align: center; /* Centrer le texte */
        animation: fadeIn 0.5s ease-in-out; /* Ajouter une animation de fondu */
        margin-bottom: 20px; /* Espacement en bas */
        color: white; /* Couleur légèrement plus claire que #333333 */
    }
    h3::before {
        content: ""; /* Ajouter un contenu généré */
        display: block; /* Afficher comme un bloc */
        height: 5px; /* Hauteur du bandeau */
        width: 100%; /* Largeur du bandeau */
        background-color: #0089ff; /* Couleur légèrement plus claire que #333333 */
        margin-bottom: 10px; /* Espacement entre le titre et le bandeau */
        margin-top: 10px; /* Espacement entre le titre et le bandeau */

    }
</style>

</style>
<div id="section">
    <div id="mot_accueil" class="">
        <h1 class="text-center">Bienvenue chez Sportify</h1>
        <p class="text-center">
        Chez Sportify, nous croyons que le sport est bien plus qu'une activité physique, c'est un mode de vie.<br>
            Nous nous engageons à offrir à nos membres une expérience sportive complète et enrichissante, adaptée à tous les niveaux et à toutes les passions.<br><br>
        Que vous souhaitiez améliorer votre condition physique, découvrir de nouvelles disciplines ou vous préparer pour des compétitions, notre plateforme est conçue pour vous accompagner dans votre parcours.<br>
            Nos coachs experts sont là pour vous guider, vous motiver et vous aider à repousser vos limites.<br><br>
        Explorez notre vaste gamme d'activités sportives, des cours collectifs dynamiques aux sessions d'entraînement individuel.<br>
            Rejoignez une communauté de passionnés de sport et bénéficiez de conseils personnalisés pour atteindre vos objectifs de bien-être et de performance.<br><br>
        Chez Sportify, chaque effort compte et chaque réussite est célébrée. Ensemble, faisons du sport une source de plaisir et de vitalité au quotidien.<br>
        </p>
    </div>

    <br>
    <h2 class="text-center" style="background-color: #0089ff; padding-top: 20px; padding-bottom: 20px; max-width: 60%; margin: 0 auto;">
        Retrouvez les meilleurs moments sports de l'année
    </h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>
        <!-- Wrapper pour les images -->
        <div class="carousel-inner">
            <div class="item active">
                <a href="https://www.nba.com/?lang=fr_fr" target="_blank"><img src="img/basket1.jpg" width=100% height=80%/></a>
                <div class="carousel-caption">
                    <h2>Basket</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.eurosport.fr/football/" target="_blank"><img src="img/football.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Football</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.rugby365.fr/" target="_blank"><img src="img/rugby.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Rugby</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.tennisactu.net/" target="_blank"><img src="img/tennis.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Tennis</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.lequipe.fr/Natation/" target="_blank"><img src="img/natation.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Natation</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://olympics.com/fr/paris-2024/sports/plongeon" target="_blank"><img src="img/plongeon1.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Plongeon</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.lequipe.fr/Badminton/" target="_blank"><img src="img/badminton.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h2>Badminton</h2>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>


        </div>

        <!-- Controles à gauche et à droite -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
    <section id="evenements">
        <h1 class="text-center" style="background-color: #0089ff; padding-top: 20px; padding-bottom: 20px; max-width: 60%; margin: 0 auto;">
            Les événements de la semaine
        </h1>
        <div class="event">
            <h3>Lundi</h3>
            <p>18h00 : Match de Basketball : ECE vs ESCE.</p>
        </div>
        <div class="event">
            <h3>Mardi</h3>
            <p>19h00 : Compétition de Football : ECE vs IESEG.</p>
        </div>
        <div class="event">
            <h3>Mercredi</h3>
            <p>17h00 : Tournoi de Rugby : Tournoi Inter-universitaire.</p>
        </div>
        <div class="event">
            <h3>Jeudi</h3>
            <p>18h30 : Rencontre de Tennis : ECE vs EPF.</p>
        </div>
        <div class="event">
            <h3>Vendredi</h3>
            <p>19h30 : Compétition de Natation : Omnes Sport à Paris.</p>
        </div>
        <div class="event">
            <h3>Samedi</h3>
            <p>15h00 : Tournoi de Plongeon : Open de Plongeon à la Piscine Municipale Vallier.</p>
        </div>
        <div class="event">
            <h3>Dimanche</h3>
            <p>Journée de repos et récupération</p>
        </div>
        <h3 class="text-center" style="background-color: #0089ff; padding-top: 2px; padding-bottom: 20px; max-width: 60%; margin: 0 auto;">
            Ne manquez pas ces événements excitants ! Inscrivez-vous dès maintenant et faites partie de notre communauté sportive dynamique.
        </h3>
    </section>
</div>