<?php
session_start();
header('Content-Type: application/json');

$dsn = 'mysql:host=localhost;dbname=sportify;charset=utf8';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

if (!isset($_SESSION['user_role'])) {
    echo json_encode(['error' => 'Utilisateur non connecté']);
    exit;
}

$role = $_SESSION['user_role'];

try {
    if ($role == 'client') {
        $stmt = $pdo->query('SELECT id_coach AS id, CONCAT(prenom, " ", nom) AS name FROM coach');
    } elseif ($role == 'coach') {
        $stmt = $pdo->query('SELECT id AS id, CONCAT(prenom, " ", nom) AS name FROM users WHERE role = "client"');
    } else {
        echo json_encode(['error' => 'Rôle utilisateur non supporté']);
        exit;
    }

    $users = $stmt->fetchAll();

    if ($users === false) {
        echo json_encode(['error' => 'Aucun utilisateur trouvé']);
    } else {
        echo json_encode($users);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
