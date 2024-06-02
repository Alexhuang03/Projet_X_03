<?php
$database = "Sportify";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if (!$db_found) {
    die("La connexion à la base de données a échoué : " . mysqli_error($db_handle));
}

function saveMessage($id_coach, $id_user, $message, $db_handle) {
    // Récupération de la date et de l'heure actuelles
    $date = date('Y-m-d');
    $heure = date('H:i:s');

    // Insertion du message dans la base de données
    $sql= "INSERT INTO chatroom (id_coach, id_user, date, heure, message) VALUES ('$id_coach', '$id_user', '$date', '$heure', '$message')";
    $result = mysqli_query($db_handle, $sql);

    // Vérification de l'insertion
    if (!$result) {
        echo "Erreur: " . mysqli_error($db_handle);
        return false;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // récupère les valeurs soumises par le formulaire
    $id_user = $_POST['id_coach'];
    $id_coach = $_POST['id_user'];
    $message = $_POST['message'];

    echo( "voici l'id de l'utilisateur : ". $id_user . " et celui qui reçoit les messages: ". $id_coach );

    if ($db_found) {
        // Détermine les identifiants de l'expéditeur et du destinataire
        if ($_SESSION['role'] == 'client') {
            $id_expediteur = $_SESSION['id'];
            $id_reception = $id_coach;
            // Enregistre le message
            if (saveMessage($id_coach, $id_user, $message, $db_handle)) {
                echo "Message enregistré avec succès.";
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement du message.";
            }
        } elseif ($_SESSION['role'] == 'coach') {
            $id_expediteur = $_SESSION['id'];
            $id_reception = $id_user;
            // Enregistre le message
            if (saveMessage($id_user, $id_coach, $message, $db_handle)) {
                echo "Message enregistré avec succès.";
            } else {
                echo "Une erreur s'est produite lors de l'enregistrement du message.";
            }
        } else {
            echo "Rôle utilisateur non reconnu.";
            exit;
        }


    } else {
        echo "Base de données non trouvée.";
    }

}

// Récupération des messages depuis la base de données
$query_messages = "SELECT c.nom AS coach_nom, c.prenom AS coach_prenom, u.prenom AS user_prenom, u.nom AS user_nom, cr.date AS date, cr.heure AS heure, cr.message AS message 
                   FROM chatroom cr
                   INNER JOIN coach c ON cr.id_coach = c.id_coach
                   INNER JOIN users u ON cr.id_user = u.id
                   ORDER BY cr.date DESC, cr.heure DESC"; // Modification de l'ordre pour trier par date puis par heure
$result_messages = mysqli_query($db_handle, $query_messages);

// Vérifiez si la requête a renvoyé des résultats
if (!$result_messages) {
    die("Erreur dans la requête : " . mysqli_error($db_handle));
}
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
            width: 500px;
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
            color: black;
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
        if ($_SESSION['role'] == 'client') {
            while ($row = mysqli_fetch_assoc($result_messages)) {
                echo "<li><strong>{$row['user_nom']} {$row['user_prenom']}</strong> à <strong>{$row['coach_nom']} {$row['coach_prenom']}</strong> ({$row['date']} {$row['heure']}): {$row['message']}</li>";
            }
        } elseif ($_SESSION['role'] == 'coach') {
            while ($row = mysqli_fetch_assoc($result_messages)) {
                echo "<li><strong>{$row['coach_nom']} {$row['coach_prenom']}</strong> à <strong>{$row['user_nom']} {$row['user_prenom']}</strong> ({$row['date']} {$row['heure']}): {$row['message']}</li>";
            }
        }
        ?>

    </ul>
    <form method="POST" action="" id="messageForm">
        <select id="userSelect" name="id_user">
            <option value="">Utilisateur</option>
            <?php
            // Remplir le select avec les utilisateurs existants
            $query_users = "SELECT id, prenom, nom FROM users";
            $result_users = mysqli_query($db_handle, $query_users);
            while ($user = mysqli_fetch_assoc($result_users)) {
                echo "<option value='{$user['id']}'>{$user['prenom']} {$user['nom']}</option>";
                $_SESSION['id'];
            }
            ?>
        </select>
        <?php if ($_SESSION['role'] = 'client') { ?>
            <input type="hidden" name="id_coach" value="<?php echo $_SESSION['id']; ?>">
        <?php } elseif ($_SESSION['role'] = 'coach') { ?>
            <input type="hidden" name="id_client" value="<?php echo $_SESSION['id']; ?>">
        <?php } ?>
        <input id="message" name="message" autocomplete="off" placeholder="Tapez un message..." />
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