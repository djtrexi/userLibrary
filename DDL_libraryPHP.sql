CREATE DATABASE bibloteca;

use bibloteca;

CREATE TABLE utenti(
  id INT AUTO_INCREMENT NOT NULL,
  nome VARCHAR(30) NOT NULL,
  cognome VARCHAR(40) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE libri(
  id INT AUTO_INCREMENT NOT NULL,
  titolo VARCHAR(100) NOT NULL,
  casaeditrice VARCHAR(50) NOT NULL,
  edizione BIT NOT NULL,
  annodipubblicazione DATE NOT NULL,
  prezzo DOUBLE NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE aggiunta(
  codiceutente INT NOT NULL,
  codicelibri INT NOT NULL,
  acquistato BOOLEAN,
  FOREIGN KEY(codiceutente) REFERENCES utenti(id),
  FOREIGN KEY(codicelibri) REFERENCES libri(id)
);