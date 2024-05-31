<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="src_index_section.js"></script>

<!-- Dernier CSS compilé et minifié -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Bibliothèque jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Dernier JavaScript compilé -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="src_index_section.css" rel="stylesheet" type="text/css"/>

<div id="section">
    <div id = "mot_accueil">
        <h1>Bienvenue chez Sportify</h1>
        <p>Chez Sportify, nous croyons que le sport est bien plus qu'une activité physique, c'est un mode de vie. Nous nous engageons à offrir à nos membres une expérience sportive complète et enrichissante, adaptée à tous les niveaux et à toutes les passions.</p>
        <p>Que vous souhaitiez améliorer votre condition physique, découvrir de nouvelles disciplines ou vous préparer pour des compétitions, notre plateforme est conçue pour vous accompagner dans votre parcours. Nos coachs experts sont là pour vous guider, vous motiver et vous aider à repousser vos limites.</p>
        <p>Explorez notre vaste gamme d'activités sportives, des cours collectifs dynamiques aux sessions d'entraînement individuel. Rejoignez une communauté de passionnés de sport et bénéficiez de conseils personnalisés pour atteindre vos objectifs de bien-être et de performance.</p>
        <p>Chez Sportify, chaque effort compte et chaque réussite est célébrée. Ensemble, faisons du sport une source de plaisir et de vitalité au quotidien.</p>
        <br>
    </div>
    <section id="evenements">
        <h2>Les événements de la semaine</h2>
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
        <h3>Ne manquez pas ces événements excitants ! Inscrivez-vous dès maintenant et faites partie de notre communauté sportive dynamique.</h3>
    </section>
    <br>
    <h2>Retrouvez les meilleurs moments sports de l'année</h2>
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
                <a href="https://www.nba.com/?lang=fr_fr"><img src="img/basket1.jpg" width=100% height=80%/></a>
                <div class="carousel-caption">
                    <h3>Basket</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.eurosport.fr/football/"><img src="img/football.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Football</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.rugby365.fr/"><img src="img/rugby.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Rugby</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.tennisactu.net/"><img src="img/tennis.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Tennis</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.lequipe.fr/Natation/"><img src="img/natation.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Natation</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://olympics.com/fr/paris-2024/sports/plongeon"><img src="img/plongeon1.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Plongeon</h3>
                    <p>Les meilleurs moments de l'année</p>
                </div>
            </div>

            <div class="item">
                <a href="https://www.lequipe.fr/Badminton/"><img src="img/badminton.jpg" width=100% height=80% /></a>
                <div class="carousel-caption">
                    <h3>Badminton</h3>
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
</div>