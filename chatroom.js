const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const mysql = require('mysql');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Configuration de la base de données
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'sportify'
});

db.connect((err) => {
    if (err) throw err;
    console.log('Database connected!');
});

io.on('connection', (socket) => {
    console.log('New client connected');

    // Écouter l'événement de sélection de coach
    socket.on('selectCoach', (coachId) => {
        // Rejoindre une salle spécifique pour le coach sélectionné
        socket.join(`coach_${coachId}`);

        // Charger les messages historiques pour ce coach
        const query = 'SELECT * FROM chatroom WHERE id_coach = ? ORDER BY date, heure';
        db.query(query, [coachId], (err, results) => {
            if (err) throw err;
            socket.emit('loadMessages', results);
        });
    });

    socket.on('message', (message) => {
        const { text, coachId } = message;
        const userId = socket.id;  // Assurez-vous d'avoir un moyen d'identifier l'utilisateur

        // Enregistrement du message dans la base de données
        const query = 'INSERT INTO chatroom (id_coach, id_user, date, heure, message) VALUES (?, ?, NOW(), NOW(), ?)';
        db.query(query, [coachId, userId, text], (err, result) => {
            if (err) throw err;
            console.log('Message saved to database');
        });

        // Émettre le message uniquement aux clients de la salle spécifique
        io.to(`coach_${coachId}`).emit('message', message);
    });

    socket.on('disconnect', () => {
        console.log('Client disconnected');
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => console.log(`Server running on port ${PORT}`));
