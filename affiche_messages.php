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

if (!isset($_SESSION['user_role']) || !isset($_GET['user_id'])) {
    echo json_encode(['error' => 'Utilisateur non connecté ou identifiant utilisateur non spécifié']);
    exit;
}

$userId = $_GET['user_id'];
$coachId = $_SESSION['id'];

try {
    $stmt = $pdo->prepare('
        SELECT message, id_user, id_coach, date, heure 
        FROM chatroom 
        WHERE (id_user = :userId AND id_coach = :coachId)
        OR (id_user = :coachId AND id_coach = :userId)
    ');
    $stmt->execute(['userId' => $userId, 'coachId' => $coachId]);
    $messages = $stmt->fetchAll();

    if ($messages === false) {
        echo json_encode(['error' => 'Aucun message trouvé']);
    } else {
        echo json_encode($messages);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
