<?php
session_start();

$searchQuery = "";
$results = [];
// noms de fichiers associes aux alias lisibles par l'utilisateur
$pageAliases = [
    'index.php' => 'Page d\'accueil',
    'Rendez_Vous.php' => 'Rendez-vous',
    'ACCOUNT.php' => 'Compte',
    'link_login.php' => 'Connexion',
    'link_signin.php' => 'Inscription',
    'link_logout.php' => 'Déconnexion',
    'prc_basketball.php' => 'Page sur le basketball',
    'prc_biking.php' => 'Page sur le biking',
    'prc_cardio.php' => 'Page sur le cardio',
    'prc_collectifs.php' => 'Page sur les cours collectifs',
    'prc_fitness.php' => 'Page sur le fitness',
    'prc_football.php' => 'Page sur le football',
    'prc_musculation.php' => 'Page sur la musculation',
    'prc_natation.php' => 'Page sur la natation',
    'prc_plongeon.php' => 'Page sur le plongeon',
    'prc_rugby.php' => 'Page sur le rugby',
    'prc_salle.php' => 'Page sur la salle',
    'prc_tennis.php' => 'Page sur le tennis',
    'PARCOURIR_affiche_coach.php' => 'Trouver un coach',
    'src_afficher_photo.php'=> 'Trouver un coach',
    'achat.php'=> 'Achat',
    'offres.php'=> 'Nos offres',
];

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query']; // recup de la requête de recherche depuis l'url

    // cherche dans les pages HTML
    $pages = array_keys($pageAliases);

    foreach ($pages as $page) {
        $content = file_get_contents($page); // lecture du contenu de chaque page
        if ($content !== false) {
            $dom = new DOMDocument();
            @$dom->loadHTML($content);
            $xpath = new DOMXPath($dom);
            $nodes = $xpath->query("//*[contains(text(), '$searchQuery')]");

            foreach ($nodes as $node) {
                $id = $node->getAttribute('id'); // recup l'attribut 'id' du nœud
                if (!$id) { // si pas d'attribut 'id'
                    $id = 'result-' . uniqid(); // genere id unique
                    $node->setAttribute('id', $id); // attribution de l'id au noeud
                    $newContent = $dom->saveHTML();
                    file_put_contents($page, $newContent);
                }
                // ajout  détails du résultat dans le tableau des résultats
                $results[] = [
                    'page' => $page,
                    'alias' => $pageAliases[$page],
                    'id' => $id,
                    'text' => substr(strip_tags($node->textContent), 0, 100)
                ];
            }
        }
    }

    // cherche dans la bdd pour trouver les noms / prénoms des coachs
    $database = "sportify";
    $db_handle = mysqli_connect('localhost', 'root', '', $database);
// requete pour trouver les coachs dont le nom/prénom correspond à la requête de recherche
    if ($db_handle) {
        $query_coach = "SELECT u.id, c.nom, c.prenom, c.specialite 
                        FROM users AS u 
                        INNER JOIN coach AS c ON u.id = c.id_coach 
                        WHERE c.nom LIKE '%$searchQuery%' OR c.prenom LIKE '%$searchQuery%'";

        $result_coach = mysqli_query($db_handle, $query_coach);

        if ($result_coach && mysqli_num_rows($result_coach) > 0) {
            while ($row_coach = mysqli_fetch_assoc($result_coach)) {
                // trouve la page de sport associée à la spécialité du coach
                $specialite = $row_coach['specialite'];
                $page = '';
                switch ($specialite) {
                    case 'Basketball':
                        $page = 'prc_basketball.php';
                        break;
                    case 'Tennis':
                        $page = 'prc_tennis.php';
                        break;
                    case 'Biking':
                        $page = 'prc_biking.php';
                        break;
                    case 'Cardio-Training':
                        $page = 'prc_cardio.php';
                        break;
                    case 'Cours Collectifs':
                        $page = 'prc_collectifs.php';
                        break;
                    case 'Fitness':
                        $page = 'prc_fitness.php';
                        break;
                    case 'Football':
                        $page = 'prc_football.php';
                        break;
                    case 'Musculation':
                        $page = 'prc_musculation.php';
                        break;
                    case 'Natation':
                        $page = 'prc_natation.php';
                        break;
                    case 'Plongeon':
                        $page = 'prc_plongeon.php';
                        break;
                    case 'Rugby':
                        $page = 'prc_rugby.php';
                        break;
                    case 'Salle de Sport Omnes':
                        $page = 'prc_salle.php';
                        break;
                    default:
                        $page = 'index.php';
                        break;
                }
                // ajout des détails du coach dans le tableau des résultats
                $results[] = [
                    'page' => $page,
                    'alias' => 'Profil du coach ' . $row_coach['nom'] . ' ' . $row_coach['prenom'],
                    'id' => '',
                    'text' => $row_coach['nom'] . ' ' . $row_coach['prenom']
                ];
            }
        }

        mysqli_close($db_handle); // fin connexion bdd
    }

    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
</head>
<body>
<!--la barre de recherche apparaisse et disparaisse lorsque l'on clique sur le boutton Rechercher-->
<div class="search-container">
    <button onclick="toggleSearch()">Rechercher</button>
    <div id="searchForm" style="display: none;">
        <input type="text" id="searchInput" name="query" placeholder="Rechercher...">
        <div id="searchResults" class="search-results"></div>
    </div>
</div>

<script>
    //fonction qui va servir pour que la barre de recherche apparaisse et disparaisse lorsque l'on clique sur le boutton Rechercher
    function toggleSearch() {
        var searchForm = document.getElementById("searchForm");
        if (searchForm.style.display === "none" || searchForm.style.display === "") {
            searchForm.style.display = "block";
        } else {
            searchForm.style.display = "none";
        }
    }

    function performSearch(query) {
        if (query.length > 0) {
            fetch(`recherche.php?query=${query}`)
                .then(response => response.json())
                .then(results => {
                    let resultsContainer = document.getElementById("searchResults");
                    resultsContainer.innerHTML = "";
                    if (results.length === 0) {
                        resultsContainer.innerHTML = "<p>Aucun résultat trouvé.</p>";
                    } else {
                        results.forEach(result => {
                            let resultItem = document.createElement("div");
                            resultItem.classList.add("search-result-item");
                            resultItem.innerHTML = `<a href="${result.page}${result.id ? '#' + result.id : ''}">${result.alias} - ${result.text}</a>`;
                            resultsContainer.appendChild(resultItem);
                        });
                    }
                });
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        let searchInput = document.getElementById("searchInput");
        searchInput.addEventListener("input", function() {
            performSearch(this.value);
        });
    });
</script>
</body>
</html>