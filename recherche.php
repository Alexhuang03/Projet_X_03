<?php
session_start();

$searchQuery = "";
$results = [];

// tab associatif des pages avec alias pour affichage
$pageAliases = [
    'index.php' => 'Page d\'accueil',
    'PARCOURIR.php' => 'Parcourir',
    'Rendez_Vous.php' => 'Rendez-vous',
    'ACCOUNT.php' => 'Compte',
    'link_login.php' => 'Connexion',
    'link_signin.php' => 'Inscription',
    'link_logout.php' => 'Déconnexion'
];

if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // liste pages pour la recherche
    $pages = array_keys($pageAliases);

    foreach ($pages as $page) {
        // ouvrir et lire le contenu de chaque page
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
                    'text' => substr(strip_tags($node->textContent), 0, 100) // limite de 100 carac pour l'apperçu dans les résultats
                ];
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .search-results {
            margin-top: 20px;
        }
        .search-result-item {
            margin-bottom: 10px;
        }
        .error {
            color: darkred;
        }
    </style>
</head>
<body>
<h1>Résultats de recherche pour "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
<div class="search-results">
    <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
    <?php if (empty($results)) { echo "<p>Aucun résultat trouvé pour cette recherche.</p>"; } ?>
    <?php foreach ($results as $result): ?>
        <div class="search-result-item">
            <a href="<?php echo htmlspecialchars($result['page']) . '#' . htmlspecialchars($result['id']); ?>">
                <?php echo htmlspecialchars($result['alias']); ?> - <?php echo htmlspecialchars($result['text']); ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
