<?php
$texteBouton = "Votre Espace";
$lienBouton = "ACCOUNT.php";
$afficherDeconnexion = false;

if (isset($_SESSION['user_role'])) {
    switch ($_SESSION['user_role']) {
        case 'admin':
            $texteBouton = "Mon Compte Administrateur";
            $afficherDeconnexion = true;
            break;
        case 'coach':
            $texteBouton = "Mon Compte Pro";
            $afficherDeconnexion = true;
            break;
        case 'client':
            $texteBouton = "Mon Compte Client";
            $afficherDeconnexion = true;
            break;
        default:
            $texteBouton = "Se Connecter";
            $afficherDeconnexion = false;
            break;
    }
}
?>
<script>
    function toggleSearch() {
        var searchForm = document.getElementById("searchForm");
        if (searchForm.style.display === "none" || searchForm.style.display === "") {
            searchForm.style.display = "block";
        } else {
            searchForm.style.display = "none";
        }
    }

    function executeSearch() {
        var query = document.getElementById('searchInput').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'recherche.php?query=' + encodeURIComponent(query), true);
        xhr.onload = function () {
            if (this.status == 200) {
                var results = JSON.parse(this.responseText);
                var output = '';
                results.forEach(function(result) {
                    output += '<div><a href="' + result.page + '#' + result.id + '" onclick="linkClicked(this); return false;">' + result.alias + ' - ' + result.text + '</a></div>';
                });
                document.getElementById('searchResultsContainer').innerHTML = output;
                document.getElementById('searchResultsModal').style.display = 'block';
            }
        };
        xhr.send();
    }

    function linkClicked(link) {
        document.getElementById('searchResultsModal').style.display = 'none';
        window.location = link.href; // Rediriger après la fermeture du modal
    }

    function closeSearchModal() {
        document.getElementById('searchResultsModal').style.display = 'none';
    }
</script>
<link href="src_navigation.css" rel="stylesheet" type="text/css"/>

<div id="navigation">
    <a href="INDEX.php"><button>Accueil</button></a>
    <div class="menu">
        <button class="menu-btn">Tout Parcourir</button>
        <div class="dropdown-content">
            <div class="dropdown-item">
                <a href="">Activités sportives</a>
                  <div class="sub-dropdown-content">
                    <a href="prc_musculation.php">Musculation</a>
                    <a href="prc_fitness.php">Fitness</a>
                    <a href="prc_biking.php">Biking</a>
                    <a href="prc_cardio.php">Cardio Training</a>
                    <a href="prc_collectifs.php">Cours Collectifs</a>
                </div>
            </div>
            <div class="dropdown-item">
                <a href="">Les Sports de compétition</a>
                <div class="sub-dropdown-content">
                    <a href="prc_basketball.php">Basketball</a>
                    <a href="prc_football.php">Football</a>
                    <a href="prc_rugby.php">Rugby</a>
                    <a href="prc_tennis.php">Tennis</a>
                    <a href="prc_natation.php">Natation</a>
                    <a href="prc_plongeon.php">Plongeon</a>
                </div>
            </div>
            <div class="dropdown-item">
                <a href="prc_salle.php#Salle">Salle de sport Omnes</a>
                <div class="sub-dropdown-content">
                    <a href="prc_salle.php##Regles">Regles</a>
                    <a href="prc_salle.php##Horaire">Horaire</a>
                </div>
            </div>
        </div>
    </div>

    <div class="search-container">
        <button onclick="toggleSearch()">Rechercher</button>
        <form onsubmit="executeSearch(); return false;" style="display: none;" id="searchForm">
            <input type="text" id="searchInput" name="query" placeholder="Rechercher...">
        </form>
    </div>

    <a href="Rendez_Vous.php"><button>Rendez-vous</button></a>

    <div class="menu">
        <button class="menu-btn"><?php echo $texteBouton; ?></button>
        <div class="dropdown-content">
            <?php if (!$afficherDeconnexion): ?>
                <div class="dropdown-item">
                    <a href="link_login.php">Se Connecter</a>
                </div>
                <div class="dropdown-item">
                    <a href="link_signin.php">Créer un Compte</a>
                </div>
            <?php endif; ?>
            <?php if ($afficherDeconnexion): ?>
                <div class="dropdown-item">
                    <a href="ACCOUNT.php">Tableau de Bord</a>
                </div>
                <div class="dropdown-item">
                    <a href="link_logout.php">Déconnexion</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div id="searchResultsModal" style="display:none; position: fixed; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
    <div style="background-color: white; margin: 10% auto; padding: 20px; width: 50%;">
        <span onclick="closeSearchModal()" style="cursor: pointer;">&times; Fermer</span>
        <h2>Résultats de recherche</h2>
        <div id="searchResultsContainer"></div>
    </div>
</div>
