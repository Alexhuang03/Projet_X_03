<!DOCTYPE html>
<html lang="en">
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
            width: 410px;
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
        #messageForm select {
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 1;
        }
        #messageForm input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            flex: 2; /* Ajustez cette valeur pour définir la largeur de l'input */
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
    <ul id="messages"></ul>
    <form id="messageForm">
        <select id="userSelect">
            <option value="">Utilisateur</option>
            <!-- Options will be dynamically populated -->
        </select>
        <input id="messageInput" autocomplete="off" placeholder="Type a message..." />
        <button>Send</button>
    </form>
</div>
<script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
<script>
    const socket = io('http://localhost:3000');

    const chatIcon = document.getElementById('chat-icon');
    const chatWindow = document.getElementById('chat-window');
    const form = document.getElementById('messageForm');
    const input = document.getElementById('messageInput');
    const messages = document.getElementById('messages');
    const userSelect = document.getElementById('userSelect');

    chatIcon.addEventListener('click', () => {
        chatWindow.style.display = chatWindow.style.display === 'none' ? 'block' : 'none';
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (input.value && userSelect.value) {
            const message = {
                text: input.value,
                coachId: userSelect.value // Assuming coachId is used to select users
            };
            socket.emit('message', message);
            input.value = '';
        } else {
            alert('Please select a user and enter a message.');
        }
    });

    socket.on('message', function(message) {
        const item = document.createElement('li');
        item.textContent = message.text;
        messages.appendChild(item);
        messages.scrollTop = messages.scrollHeight;
    });

    socket.on('loadMessages', function(messagesData) {
        messages.innerHTML = ''; // Clear existing messages
        messagesData.forEach(message => {
            const item = document.createElement('li');
            item.textContent = message.message;
            messages.appendChild(item);
        });
        messages.scrollTop = messages.scrollHeight;
    });

    // Fetch users from the server
    fetch('recherche_utilisateurs.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error('Error fetching users:', data.error);
                return;
            }
            data.forEach(user => {
                const option = document.createElement('option');
                option.value = user.id;
                option.textContent = user.name;
                userSelect.appendChild(option);
            });
        });

    userSelect.addEventListener('change', function() {
        const userId = userSelect.value;
        if (userId) {
            socket.emit('selectCoach', userId); // Assuming selectCoach event is used to select users
        }
    });
</script>
</body>
</html>
