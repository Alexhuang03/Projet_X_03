<?php
session_start();

$searchQuery = "";
$results = [];

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
];

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    $pages = array_keys($pageAliases);

    foreach ($pages as $page) {
        $content = file_get_contents($page);
        if ($content !== false) {
            $dom = new DOMDocument();
            @$dom->loadHTML($content);
            $xpath = new DOMXPath($dom);
            $nodes = $xpath->query("//*[contains(text(), '$searchQuery')]");

            foreach ($nodes as $node) {
                $id = $node->getAttribute('id');
                if (!$id) {
                    $id = 'result-' . uniqid();
                    $node->setAttribute('id', $id);
                    $newContent = $dom->saveHTML();
                    file_put_contents($page, $newContent);
                }
                $results[] = [
                    'page' => $page,
                    'alias' => $pageAliases[$page],
                    'id' => $id,
                    'text' => substr(strip_tags($node->textContent), 0, 100)
                ];
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}
?>