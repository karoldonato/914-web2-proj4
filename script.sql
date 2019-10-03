CREATE DATABASE db_proj3;
USE db_proj3;

CREATE TABLE ocorrencias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo VARCHAR(20),
    descricao LONGTEXT,
    horario DATETIME,
    coordenadaX INT,
    coordenadaY INT
);
