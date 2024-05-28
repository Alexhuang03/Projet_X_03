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
        <h1>Bonjour</h1>
        <h3>Bienvenue chez Sportify, vous pouvez trouver ici tout type de sports que vous voulez.</h3>
        <br>
    </div>

    <!---<div id="carrousel">
        <h3>Les évènements de la semaine </h3>
        <ul>
            <li><a href="https://www.nba.com/?lang=fr_fr"><img src="img/basket.jpg" width="700" height="400" /></a></li>
            <li><a href="https://www.eurosport.fr/football/"><img src="img/football.jpg" width="700" height="400" /></a></li>
            <li><a href="https://www.rugby365.fr/"><img src="img/rugby.jpg" width="700" height="400" /></a></li>
            <li><a href="https://www.tennisactu.net/"><img src="img/tennis.jpg" width="700" height="400" /></a></li>
            <li><a href="https://www.lequipe.fr/Natation/"><img src="img/natation.jpg" width="700" height="400" /></a></li>
            <li><a href="https://olympics.com/fr/paris-2024/sports/plongeon"><img src="img/plongeon.jpg" width="700" height="400" /></a></li>
            <li><a href="https://www.lequipe.fr/Badminton/"><img src="img/badminton.jpg" width="700" height="400" /></a></li>
        </ul>
    </div>

    <div class="controls">
        <div class="miniature prev-miniature"><img src="" alt="Image précédente" width="200"></div>
        <button class="prev">Précédent</button>
        <button class="next">Suivant</button>
        <div class="miniature next-miniature"><img src="" alt="Image suivante" width="200"></div>
    </div>
    <div class="direct-nav"></div>-->

    <h3>Les évènements de la semaine </h3>
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
                <a href="https://olympics.com/fr/paris-2024/sports/plongeon"><img src="plongeon1.jpg" width=100% height=80% /></a>
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
