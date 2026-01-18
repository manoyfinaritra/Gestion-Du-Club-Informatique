-- Script de création de la base de données pour le club informatique

CREATE DATABASE IF NOT EXISTS club_informatique;
USE club_informatique;

CREATE TABLE IF NOT EXISTS membres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    age INT,
    genre ENUM('Homme', 'Femme'),
    nom_facebook VARCHAR(150),
    motdepasse VARCHAR(255) NOT NULL
);
