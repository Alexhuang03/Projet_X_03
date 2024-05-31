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
                          id_creneau INT AUTO_INCREMENT PRIMARY KEY,
                          id_coach INT,
                          date_creneau DATE,
                          heure_debut TIME,
                          heure_fin TIME,
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

CREATE TABLE salle(
    info VARCHAR(255),
    regle VARCHAR(255),
    horaire VARCHAR(255)
);
INSERT INTO salle (info, regle, horaire)
VALUES ('info salle creation BDD', 'info regle creation BDD', 'info horaire creation BDD');

CREATE TABLE chatroom (
                          id_msg INT PRIMARY KEY AUTO_INCREMENT,
                          id_coach INT,
                          id_user INT,
                          date DATE NOT NULL,
                          heure TIME NOT NULL,
                          message VARCHAR(255),
                          FOREIGN KEY (id_coach) REFERENCES coach(id_coach),
                          FOREIGN KEY (id_user) REFERENCES users(id)
);

INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays)
VALUES ('admin', 'Admin', 'Admin', 'admin@exemple.com', 'admin', '0123456789', '1 Rue de l\'Admin', 'Adminville', '75000', 'France');

DELIMITER //
CREATE PROCEDURE add_coach(IN prenom VARCHAR(50), IN nom VARCHAR(50), IN email VARCHAR(100), IN password VARCHAR(255), IN telephone VARCHAR(20), IN adresse_ligne1 VARCHAR(255), IN ville VARCHAR(100), IN code_postal VARCHAR(20), IN pays VARCHAR(100), IN specialite VARCHAR(100), IN photo VARCHAR(50), IN video VARCHAR(50), IN cv VARCHAR(50))
BEGIN
    INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays)
    VALUES ('coach', prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays);

    SET @coach_id = LAST_INSERT_ID();

    INSERT INTO coach (id_coach, nom, prenom, email, specialite, photo, video, cv)
    VALUES (@coach_id, nom, prenom, email, specialite, photo, video, cv);
END//
DELIMITER ;

CALL add_coach('Jean', 'Dupont', 'jean.dupont@exemple.com', 'password', '0606060606', '1 Rue des Coachs', 'Paris', '75001', 'France', 'Musculation', 'coach1.png', 'coach1.mp4', 'coach1.xml');
CALL add_coach('Marie', 'Curie', 'marie.curie@exemple.com', 'password', '0612345678', '2 Rue des Coachs', 'Lyon', '69001', 'France', 'Fitness', 'coach2.png', 'coach2.mp4', 'coach2.xml');
CALL add_coach('Pierre', 'Martin', 'pierre.martin@exemple.com', 'password', '0623456789', '3 Rue des Coachs', 'Marseille', '13001', 'France', 'Biking', 'coach3.png', 'coach3.mp4', 'coach3.xml');
CALL add_coach('Lucie', 'Bernard', 'lucie.bernard@exemple.com', 'password', '0634567890', '4 Rue des Coachs', 'Toulouse', '31000', 'France', 'Cardio-Training', 'coach4.png', 'coach4.mp4', 'coach4.xml');
CALL add_coach('Paul', 'Durand', 'paul.durand@exemple.com', 'password', '0645678901', '5 Rue des Coachs', 'Nice', '06000', 'France', 'Cours-Collectifs', 'coach5.png', 'coach5.mp4', 'coach5.xml');
CALL add_coach('Sophie', 'Lefevre', 'sophie.lefevre@exemple.com', 'password', '0656789012', '6 Rue des Coachs', 'Nantes', '44000', 'France', 'Basketball', 'coach6.png', 'coach6.mp4', 'coach6.xml');
CALL add_coach('Jacques', 'Moreau', 'jacques.moreau@exemple.com', 'password', '0667890123', '7 Rue des Coachs', 'Strasbourg', '67000', 'France', 'Football', 'coach7.png', 'coach7.mp4', 'coach7.xml');
CALL add_coach('Julie', 'Roux', 'julie.roux@exemple.com', 'password', '0678901234', '8 Rue des Coachs', 'Montpellier', '34000', 'France', 'Rugby', 'coach8.png', 'coach8.mp4', 'coach8.xml');
CALL add_coach('Antoine', 'Petit', 'antoine.petit@exemple.com', 'password', '0689012345', '9 Rue des Coachs', 'Bordeaux', '33000', 'France', 'Tennis', 'coach9.png', 'coach9.mp4', 'coach9.xml');
CALL add_coach('Emilie', 'Gauthier', 'emilie.gauthier@exemple.com', 'password', '0690123456', '10 Rue des Coachs', 'Lille', '59000', 'France', 'Natation', 'coach10.png', 'coach10.mp4', 'coach10.xml');
CALL add_coach('Louis', 'Muller', 'louis.muller@exemple.com', 'password', '0612345678', '11 Rue des Coachs', 'Rennes', '35000', 'France', 'Plongeon', 'coach11.png', 'coach11.mp4', 'coach11.xml');

INSERT INTO users (role, prenom, nom, email, password, telephone, adresse_ligne1, ville, code_postal, pays, numero_etudiant)
VALUES
    ('client', 'Alice', 'Durand', 'alice.durand@exemple.com', 'client1', '0707070707', '1 Rue des Clients', 'Paris', '75002', 'France', '20042001'),
    ('client', 'Bruno', 'Morel', 'bruno.morel@exemple.com', 'client2', '0712345678', '2 Rue des Clients', 'Lyon', '69002', 'France', '20042002'),
    ('client', 'Claire', 'Fournier', 'claire.fournier@exemple.com', 'client3', '0723456789', '3 Rue des Clients', 'Marseille', '13002', 'France', '20042003'),
    ('client', 'David', 'Girard', 'david.girard@exemple.com', 'client4', '0734567890', '4 Rue des Clients', 'Toulouse', '31002', 'France', '20042004'),
    ('client', 'Elodie', 'Clement', 'elodie.clement@exemple.com', 'client5', '0745678901', '5 Rue des Clients', 'Nice', '06002', 'France', '20042005'),
    ('client', 'Francois', 'Garnier', 'francois.garnier@exemple.com', 'client6', '0756789012', '6 Rue des Clients', 'Nantes', '44002', 'France', '20042006'),
    ('client', 'Gabrielle', 'Lambert', 'gabrielle.lambert@exemple.com', 'client7', '0767890123', '7 Rue des Clients', 'Strasbourg', '67002', 'France', '20042007'),
    ('client', 'Hugo', 'Rousseau', 'hugo.rousseau@exemple.com', 'client8', '0778901234', '8 Rue des Clients', 'Montpellier', '34002', 'France', '20042008'),
    ('client', 'Isabelle', 'Blanc', 'isabelle.blanc@exemple.com', 'client9', '0789012345', '9 Rue des Clients', 'Bordeaux', '33002', 'France', '20042009'),
    ('client', 'Julien', 'Dupuis', 'julien.dupuis@exemple.com', 'client10', '0790123456', '10 Rue des Clients', 'Lille', '59002', 'France', '20042010'),
    ('client', 'Manon', 'Henry', 'manon.henry@exemple.com', 'client11', '0799876543', '11 Rue des Clients', 'Rennes', '35002', 'France', '20042011');
