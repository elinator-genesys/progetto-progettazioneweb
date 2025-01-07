CREATE DATABASE IF NOT EXISTS tonci_635715;

USE tonci_635715;

CREATE TABLE IF NOT EXISTS Utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    nomeUtente VARCHAR(50) NOT NULL UNIQUE,
    telefono VARCHAR(10) DEFAULT "",
    email VARCHAR(255) NOT NULL UNIQUE,
    livello VARCHAR(50) DEFAULT "Principiante",
    pass VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

INSERT IGNORE INTO Utenti(nome, cognome, nomeUtente, email, livello, pass, role) VALUES 
("admin", "admin", "admin", "", "", "$2y$10$7Lh2BPdX./jcJGyu62Yy6eU8DH3wzRZRzoSXtayO.1K8m23KkN7Zi", "admin"),
("Elia", "Tonci", "EliaT", "elia@gmail.com", "Esperto", "$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm", "user"),
("Mario", "Rossi", "MarioR", "mario@gmail.com", "Intermedio", "$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm", "user"),
("Luigi", "Bianchi", "LuigiB", "luigi@gmail.com", "Principiante", "$2y$10$BC9aFYQxCWjXW2hOTSZWl.hHrFUkX5ZAq.ozMBrYiwI08zmIwJkDm", "user");

CREATE TABLE IF NOT EXISTS Campi(
	numero INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descrizione VARCHAR(255),
    disponibile BOOLEAN DEFAULT TRUE
);

INSERT IGNORE INTO Campi(numero, nome, descrizione) VALUES 
(1, 'Campo1-Tennis', 'Campo da tennis esterno'),
(2, 'Campo2-Tennis', 'Campo da tennis esterno'),
(3, 'Campo3-Tennis', 'Campo da tennis esterno'),
(4, 'Campo4-Tennis', 'Campo da tennis coperto'),
(5, 'Campo5-Tennis', 'Campo da tennis coperto'),
(6, 'Campo6-Tennis', 'Campo da tennis coperto'),
(7, 'Campo1-Padel', 'Campo da padel esterno'),
(8, 'Campo2-Padel', 'Campo da padel esterno'),
(9, 'Campo3-Padel', 'Campo da padel coperto');

CREATE TABLE IF NOT EXISTS PrenotazioniCampi(
	id INT AUTO_INCREMENT PRIMARY KEY,
    idUtente INT NOT NULL,
    numeroCampo INT NOT NULL,
    giorno DATE,
    orario TIME
);

CREATE TABLE IF NOT EXISTS PrenotazioniLezioniGruppo(
	id INT AUTO_INCREMENT PRIMARY KEY,
    idUtente INT NOT NULL,
    giorno DATE,
    orario TIME
);

CREATE TABLE IF NOT EXISTS PrenotazioniLezioniSingole(
	id INT AUTO_INCREMENT PRIMARY KEY,
    idUtente INT NOT NULL,
    giorno DATE,
    orario TIME
);

CREATE TABLE IF NOT EXISTS Sfide(
	id INT AUTO_INCREMENT PRIMARY KEY,
	idSfidante INT NOT NULL,
    idDestinatario INT NOT NULL,
    stato VARCHAR(10) DEFAULT "IN ATTESA"
);

select * from Utenti;
select * from Campi;
select * from Prenotazionicampi;
select * from PrenotazioniLezioniGruppo;
select * from PrenotazioniLezioniSingole;
select * from Sfide;