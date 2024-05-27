CREATE DATABASE IF NOT EXISTS sportify
CREATE TABLE Users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       id_coach INT,
                       role ENUM('admin', 'coach', 'client') NOT NULL,
                       prenom VARCHAR(50) NOT NULL,
                       nom VARCHAR(50) NOT NULL,
                       email VARCHAR(100) UNIQUE NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       telephone VARCHAR(20),
                       address_ligne1 VARCHAR(100),
                       address_ligne2 VARCHAR(100),
                       ville VARCHAR(50),
                       code_postal VARCHAR(10),
                       pays VARCHAR(50),
                       numero_etudiant VARCHAR(50)
);
INSERT INTO Users (
    id_coach,
    role,
    prenom,
    nom,
    email,
    password,
    telephone,
    address_ligne1,
    address_ligne2,
    ville,
    code_postal,
    pays,
    numero_etudiant
) VALUES (
             NULL,
             'admin',
             'admin',
             'admin',
             'admin@example.com',
             'admin',
             '-',
             '-',
             '-',
             '-',
             '-',
             '-',
             NULL
         );

INSERT INTO Users (
    id_coach,
    role,
    prenom,
    nom,
    email,
    password,
    telephone,
    address_ligne1,
    address_ligne2,
    ville,
    code_postal,
    pays,
    numero_etudiant
) VALUES (
             1,
             'coach',
             'coach',
             'coach',
             'coach@example.com',
             'coach',
             '-',
             '-',
             '-',
             '-',
             '-',
             '-',
             NULL
         );

INSERT INTO Users (
    id_coach,
    role,
    prenom,
    nom,
    email,
    password,
    telephone,
    address_ligne1,
    address_ligne2,
    ville,
    code_postal,
    pays,
    numero_etudiant
) VALUES (
             NULL,
             'client',
             'client',
             'client',
             'client@example.com',
             'client',
             '-',
             '-',
             '-',
             '-',
             '-',
             '-',
             '19042004'
         );