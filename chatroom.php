<?php
$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_msg = $_POST['id_msg'];
    $id_user = $_POST['id_user'];
    $id_coach = $_POST['id_coach'];
    $message = $_POST['message'];
    $date = date('Y-m-d');
    $heure = date('H:i:s');

    if ($db_found) {
        $query = "INSERT INTO chatroom (id_msg, id_coach, id_user, date, heure, message) VALUES ('$id_msg','$id_coach', '$id_user', '$date', '$heure', '$message')";
        $result = mysqli_query($db_handle, $query);
        if (!$result) {
            echo "Erreur: " . mysqli_error($db_handle);
        }
    }
}

// Récupération des messages depuis la base de données
$query_messages = "SELECT c.nom AS coach_nom, c.prenom AS coach_prenom, u.prenom AS user_prenom, u.nom AS user_nom, cr.date AS date, cr.heure AS heure, cr.message AS message 
                   FROM chatroom cr
                   INNER JOIN coach c ON cr.id_coach = c.id_coach
                   INNER JOIN users u ON cr.id_user = u.id
                   ORDER BY cr.date, cr.heure DESC";
$result_messages = mysqli_query($db_handle, $query_messages);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Chat Room</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        #chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: white;
            font-size: 24px;
        }
        #chat-window {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: auto;
            height: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        #messages {
            list-style-type: none;
            padding: 10px;
            height: 280px;
            overflow-y: scroll;
            border-bottom: 1px solid #ccc;
        }
        #messages li {
            padding: 8px;
            margin-bottom: 10px;
            background-color: #f4f4f4;
            border-radius: 5px;
        }
        #messageForm {
            display: flex;
            padding: 10px;
        }
        #messageForm select, #messageForm input {
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
        }
        #messageForm button {
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="chat-icon">&#9993;</div>
<div id="chat-window">
    <ul id="messages">
        <?php
        // Affichage des messages
        while ($row = mysqli_fetch_assoc($result_messages)) {
            echo "<li><strong>{$row['coach_nom']} {$row['coach_prenom']}</strong> à <strong>{$row['user_nom']} {$row['user_prenom']}</strong> ({$row['date']} {$row['heure']}): {$row['message']}</li>";
        }
        ?>
    </ul>
    <form method="POST" action="" id="messageForm">
        <select id="userSelect" name="id_user">
            <option value="">Utilisateur</option>
        </select>
        <input type="hidden" name="id_coach" value="1"> <!-- Modifier cette valeur selon le coach -->
        <input id="messageInput" name="message" autocomplete="off" placeholder="Tapez un message..." />
        <button type="submit">Envoyer</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const chatIcon = $('#chat-icon');
        const chatWindow = $('#chat-window');
        const userSelect = $('#userSelect');

        chatIcon.click(function() {
            chatWindow.toggle();
        });

        function loadUsers() {
            $.get('recherche_utilisateurs.php', function(data) {
                if (data.error) {
                    console.error('Erreur lors de la récupération des utilisateurs:', data.error);
                    return;
                }
                userSelect.empty().append('<option value="">Utilisateur</option>');
                data.forEach(user => {
                    const option = $('<option></option>').val(user.id).text(user.name);
                    userSelect.append(option);
                });
            }, 'json');
        }

        loadUsers();

        // Rafraîchissement automatique des messages
        function loadMessages() {
            $('#messages').load(location.href + ' #messages');
        }

        setInterval(loadMessages, 3000); // Rafraîchir toutes les 3 secondes
    });
</script>
</body>
</html>
