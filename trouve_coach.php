<?php
header('Content-Type: application/json');

// Connexion à la base de données
$dsn = 'mysql:host=localhost;dbname=sportify';
$username = 'root';
$password = '';
$options = [];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

// Récupérer la liste des coachs
$stmt = $pdo->query('SELECT name, specialite FROM coach');
$coaches = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($coaches);
?>
