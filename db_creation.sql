CREATE TABLE users (
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       role ENUM('admin', 'coach', 'client') NOT NULL,
                       prenom VARCHAR(50) NOT NULL,
                       nom VARCHAR(50) NOT NULL,
                       email VARCHAR(100) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       telephone VARCHAR(20),
                       adresse_ligne1 VARCHAR(255),
                       adresse_ligne2 VARCHAR(255),
                       ville VARCHAR(100),
                       code_postal VARCHAR(20),
                       pays VARCHAR(100),
                       numero_etudiant VARCHAR(50)
);

CREATE TABLE coach (
                       id_coach INT PRIMARY KEY AUTO_INCREMENT,
                       nom VARCHAR(50) NOT NULL,
                       prenom VARCHAR(50) NOT NULL,
                       email VARCHAR(100) UNIQUE NOT NULL,
                       specialite VARCHAR(100) NOT NULL,
                       photo VARCHAR(50),
                       video VARCHAR(50),
                       cv VARCHAR(50)
);

CREATE TABLE creneaux (
                          id_creneau INT PRIMARY KEY AUTO_INCREMENT,
                          id_coach INT,
                          date DATE NOT NULL,
                          heure_debut TIME NOT NULL,
                          heure_fin TIME NOT NULL,
                          FOREIGN KEY (id_coach) REFERENCES coach(id_coach)
);

CREATE TABLE reservation (
                             id_reservation INT PRIMARY KEY AUTO_INCREMENT,
                             id_coach INT,
                             id_user INT,
                             date DATE NOT NULL,
                             heure_debut TIME NOT NULL,
                             heure_fin TIME NOT NULL,
                             FOREIGN KEY (id_coach) REFERENCES coach(id_coach),
                             FOREIGN KEY (id_user) REFERENCES users(id)
);

INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays)
VALUES ('admin', 'admin', 'admin', 'admin@example.com', 'admin', '123456789', '1 Admin St', 'Admin City', '00000', 'Adminland');

INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays)
VALUES ('coach', 'coach', 'coach', 'coach@example.com', 'coach', '987654321', '2 Coach Rd', 'Coach City', '11111', 'Coachland');

SET @coach_id = LAST_INSERT_ID();
INSERT INTO coach (id_coach, nom, prenom, email, specialite, photo, video, cv)
VALUES (@coach_id, 'client', 'client', 'coach@example.com', 'Fitness', NULL, NULL, NULL);

INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays)
VALUES ('client', 'client', 'client', 'client@example.com', 'client', '123123123', '3 Client Ave', 'Client City', '22222', 'Clientland');

SET @client_id = LAST_INSERT_ID();

INSERT INTO creneaux (id_coach, date, heure_debut, heure_fin)
VALUES
    (@coach_id , CURRENT_DATE, '09:00:00', '11:00:00'),
    (@coach_id , CURRENT_DATE, '15:00:00', '17:00:00');

INSERT INTO reservation (id_coach, id_user, date, heure_debut, heure_fin)
VALUES
    (@coach_id, @client_id, CURRENT_DATE, '09:00:00', '11:00:00');