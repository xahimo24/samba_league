CREATE DATABASE samba_league;  -- Create the database

USE samba_league;

CREATE TABLE Jugadores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    dorsal VARCHAR(4),
    posicion VARCHAR(20),
    ritmo int,
    disparo int,
    pase int,
    regate int,
    defensa int,
    fisico int 
);

INSERT INTO Jugadores (nombre, dorsal, posicion, ritmo, disparo, pase, regate, defensa, fisico) VALUES 
('AITOR', '420', 'CM', 75, 74, 84, 81, 75, 75),
('ALBERTO', NULL, 'GK', NULL, NULL, NULL, NULL, NULL, NULL),
('ALVARO', '23', 'CB', 76, 70, 75, 66, 86, 85),
('ANDREU', '32', 'ST', 75, 75, 81, 82, 65, 65),
('BIEL', '14', 'ST', 79, 77, 65, 72, 18, 75),
('BRAIS', '10', 'CM', 70, 63, 82, 81, 67, 65),
('EDU', '37', 'CD', 60, 69, 77, 63, 82, 80),
('HUGO', '45', 'GK', 66, 74, 76, 64, 67, 68),
('JAVI', '11', 'ST', 85, 88, 77, 82, 58, 77),
('JOAN', '3', 'CB', 86, 73, 72, 74, 78, 84),
('PETACA', '17', 'CB', NULL, NULL, NULL, NULL, NULL, NULL),
('PEDRI', '78', 'CB', 67, 62, 65, 60, 82, 84),
('JUSI', '6', 'CM', 73, 75, 76, 76, 62, 63),
('MARCEL', '37', 'CD', 77, 84, 72, 72, 34, 74),
('MIQUEL', '1', 'CM', 77, 48, 60, 55, 66, 65),
('NANO', '16', 'CM', 74, 79, 76, 77, 66, 76),
('OSCAR', '8', 'ST', 72, 78, 66, 70, 64, 78),
('PERAS', '87', 'CM', 74, 74, 81, 79, 69, 75),
('VITO', '37', 'ST', NULL, NULL, NULL, NULL, NULL, NULL),
('XASQUI', '15', 'CB', 65, 68, 71, 64, 84, 83),
('XAVI', '5', 'CM', 70, 80, 86, 81, 75, 68),
('COCA', NULL, 'ST', NULL, NULL, NULL, NULL, NULL, NULL),
('RIGAU', NULL, 'ST', 79, 79, 78, 78, 18, 77);

CREATE TABLE Estadisticas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_jugador INT NOT NULL,
    partidos_jugados INT NOT NULL,
    victorias INT NOT NULL,
    derrotas INT NOT NULL,
    goles INT NOT NULL,
    asistencias INT NOT NULL,
    paradas INT NOT NULL,
    defensa INT NOT NULL,
    puntos INT NOT NULL,
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id)
);

INSERT INTO Estadisticas (id_jugador, partidos_jugados, victorias, derrotas, goles, asistencias, paradas, defensa, puntos) VALUES 
(1, 10, 3, 7, 6, 8, 1, 4, 73.90),
(2, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(3, 10, 8, 2, 6, 8, 1, 9, 105.10),
(4, 8, 5, 3, 10, 6, 0, 0, 72.00),
(5, 5, 3, 2, 11, 2, 1, 0, 50.80),
(6, 11, 4, 7, 9, 5, 1, 10, 75.10),
(7, 8, 3, 5, 3, 8, 2, 0, 52.70),
(8, 9, 5, 4, 7, 2, 2, 0, 63.00),
(9, 10, 6, 4, 22, 12, 1, 0, 117.20),
(10, 6, 3, 3, 6, 5, 1, 4, 59.80),
(11, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(12, 8, 3, 5, 4, 2, 2, 4, 59.40),
(13, 10, 7, 3, 11, 9, 4, 0, 92.40),
(14, 7, 3, 4, 15, 2, 1, 0, 67.00),
(15, 6, 3, 3, 2, 0, 2, 0, 32.60),
(16, 9, 4, 5, 10, 4, 0, 2, 61.00),
(17, 3, 1, 2, 3, 3, 1, 0, 25.00),
(18, 4, 2, 2, 1, 6, 2, 2, 34.60),
(19, 1, 1, 0, 0, 2, 0, 0, 8.00),
(20, 10, 5, 5, 2, 7, 1, 4, 70.40),
(21, 6, 4, 2, 10, 9, 2, 1, 59.40),
(22, 1, 0, 1, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE Equipos (  -- Create the teams table
    id INT PRIMARY KEY AUTO_INCREMENT,
    color VARCHAR(20) NOT NULL
);

INSERT INTO Equipos (color) VALUES 
('negro'),
('blanco'),
('azul'),
('rojo'),
('rojo'),
('negro'),
('blanco'),
('negro'),
('blanco'),
('negro'),
('blanco'),
('negro'),
('azul'),
('rojo'),
('azul'),
('rojo'),
('negro'),
('blanco'),
('rojo'),
('negro'),
('negro'),
('rojo'),
('negro'),
('rojo');

CREATE TABLE Plantilla (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_equipo INT NOT NULL,
    id_jugador INT NOT NULL,
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id),
    FOREIGN KEY (id_equipo) REFERENCES Equipos(id)
);

INSERT INTO Plantilla (id_equipo, id_jugador) VALUES
(1, 1),
(1, 13),
(1, 8),
(1, 10),
(1, 20),
(1, 17)
(2, 3),
(2, 6),
(2, 9),
(2, 4),
(2, 15),
(2, 16),
(3, 19),
(3, 3),
(3, 20),
(3, 10),
(3, 14),
(3, 6),
(4, 4),
(4, 9),
(4, 17),
(4, 16),
(4, 5),
(4, 8),
(4, 7),
(5, 14),
(5, 15),
(5, 1),
(5, 9),
(5, 7),
(5, 12),
(5, 8),
(6, 13),
(6, 21),
(6, 16),
(6, 4),
(6, 6),
(6, 20),
(6, 3),
(6, 6),
(7, 9),
(7, 17),
(7, 8),
(7, 3),
(7, 21),
(7, 10),
(7, 7),
(7, 15),
(8, 1),
(8, 6),
(8, 12),
(8, 13),
(8, 14),
(8, 16),
(8, 20),
(8, 5),
(9, 3),
(9, 4),
(9, 5),
(9, 8),
(9, 13),
(9, 20),
(9, 21),
(10, 1),
(10, 6),
(10, 7),
(10, 9),
(10, 12),
(10, 16),
(10, 15),
(11, 4),
(11, 10),
(11, 3),
(11, 20),
(11, 6),
(12, 8),
(12, 13),
(12, 12),
(12, 1),
(12, 21),
(12, 9),
(13, 9),
(13, 6),
(13, 21),
(13, 5),
(13, 15),
(14, 3),
(14, 1),
(14, 20),
(14, 18),
(14, 16),
(14, 12),
(14, 14),
(15, 6),
(15, 21),
(15, 20),
(15, 18),
(15, 5),
(15, 10),
(15, 12),
(15, 4),
(16, 3),
(16, 8),
(16, 1),
(16, 7),
(16, 14),
(16, 9),
(16, 13),
(16, 16),
(17, 5),
(17, 13),
(17, 18),
(17, 10),
(17, 9),
(18, 14),
(18, 7),
(18, 6),
(18, 12),
(18, 1),
(19, 18),
(19, 1),
(19, 20),
(19, 14),
(19, 16),
(19, 7),
(19, 8),
(20, 12),
(20, 6),
(20, 5),
(20, 3),
(20, 4),
(20, 15),
(20, 13),
(21, 4),
(21, 20),
(21, 8),
(21, 9),
(21, 7),
(22, 16),
(22, 1),
(22, 13),
(22, 3),
(22, 6),
(23, 9),
(23, 1),
(23, 7),
(23, 21),
(23, 12),
(24, 3),
(24, 14),
(24, 4),
(24, 20),
(24, 16),
(24, 8);

CREATE TABLE Partidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    jornada INT NOT NULL,
    id_equipo_local INT NOT NULL,
    id_equipo_visitante INT NOT NULL,
    goles_local INT NOT NULL,
    goles_visitante INT NOT NULL,
    comentarios TEXT,
    FOREIGN KEY (id_equipo_local) REFERENCES Equipos(id),
    FOREIGN KEY (id_equipo_visitante) REFERENCES Equipos(id)
);

INSERT INTO Partidos (fecha, jornada, id_equipo_local, id_equipo_visitante, goles_local, goles_visitante, comentarios) VALUES
('2024-09-22', 1, 1, 2, 8, 6),
('2024-09-29', 2, 3, 4, 8, 10),
('2024-10-06', 3, 5, 6, 7, 3),
('2024-10-12', 4, 7, 8, 9, 3),
('2024-10-19', 5, 9, 10, 4, 11),
('2024-11-03', 6, 11, 12, 7, 6),
('2024-11-09', 7, 13, 14, 10, 4),
('2024-11-16', 8, 15, 16, 6, 5),
('2024-11-24', 9, 17, 18, 5, 9),
('2024-11-30', 10, 19, 20, 3, 8),
('2024-12-07', 11, 21, 22, 9, 8),
('2024-12-21', 12, 23, 24, 8, 5);

CREATE TABLE Eventos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_partido INT NOT NULL,
    minuto INT NOT NULL,
    tipo_evento VARCHAR(20) NOT NULL,
    id_jugador_principal INT NOT NULL,
    id_jugador_secundario INT
    FOREIGN KEY (id_partido) REFERENCES Partidos(id),
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id)
);

INSERT INTO Eventos (id_partido, minuto, tipo_evento, id_jugador_principal, id_jugador_secundario) VALUES
(1, NULL, 'gol', 6, 9),
(1, NULL, 'gol', 6, 9),
(1, NULL, 'gol', 9, 3),
(1, NULL, 'gol', 9, NULL),
(1, NULL, 'gol', 16, NULL),
(1, NULL, 'gol', 16, NULL),
(1, NULL, 'gol', 3, NULL),
(1, NULL, 'gol', 1, NULL),
(1, NULL, 'gol', 8, 1),
(1, NULL, 'gol', 13, NULL),
(1, NULL, 'gol', 10, NULL),
(1, NULL, 'gol', 15, NULL),
(2, 4, 'gol', 5, 4),
(2, 5, 'gol', 14, NULL),
(2, 12, 'gol', 4, 8),
(2, 23, 'gol', 10, 14),
(2, 24, 'gol', 14, 10),
(2, 25, 'gol', 6, 3),
(2, 27, 'gol', 4, NULL),
(2, 31, 'gol', 14, 19),
(2, 37, 'gol', 14, 10),
(2, 39, 'gol', 3, 10),
(2, 41, 'gol', 17, 9),
(2, 43, 'gol', 14, NULL),
(2, 51, 'gol', 10, 20),
(2, 56, 'gol', 6, 19),
(2, 58, 'gol', 5, 7),
(2, 63, 'gol', 9, NULL),
(2, 66, 'gol', 8, 9),
(3, NULL, 'gol', 9, 7),
(3, NULL, 'gol', 14, 9),
(3, NULL, 'gol', 14, NULL),
(3, NULL, 'gol', 4, 20),
(3, NULL, 'gol', 13, 20),
(3, NULL, 'gol', 16, 21),
(3, NULL, 'gol', 21, 13),
(3, NULL, 'gol', 16, NULL),
(3, NULL, 'gol', 21, NULL),
(3, NULL, 'gol', 5, NULL),
(4, NULL, 'gol', 14, 16),
(4, NULL, 'gol', 9, NULL),
(4, NULL, 'gol', 8, 9),
(4, NULL, 'gol', 21, 9),
(4, NULL, 'gol', 7, 21),
(4, NULL, 'gol', 9, 21),
(4, NULL, 'gol', 13, 14),
(4, NULL, 'gol', 9, NULL),
(4, NULL, 'gol', 13, NULL),
(4, NULL, 'gol', 9, 21),
(4, NULL, 'gol', 21, 17),
(4, NULL, 'gol', 17, 7),
(5, NULL, 'gol', 21, 13),
(5, NULL, 'gol', 4, NULL),
(5, NULL, 'gol', 5, NULL),
(5 NULL, 'gol', 4, 5),
(5, NULL, 'gol', 9, NULL),
(5, NULL, 'gol', 5, 20),
(5, NULL, 'gol', 3, NULL),
(5, NULL, 'gol', 6, 9),
(5, NULL, 'gol', 9, NULL),
(5, NULL, 'gol', 5, NULL),
(5, NULL, 'gol', 13, 8),
(5, NULL, 'gol', 8, 21),
(5, NULL, 'gol', 21, 4),
(5, NULL, 'gol', 13, NULL),
(5, NULL, 'gol', 9, 1),
(6, NULL, 'gol', 4, NULL),
(6, NULL, 'gol', 9, 13),
(6, NULL, 'gol', 13, NULL),
(6, NULL, 'gol', 9, NULL),
(6, NULL, 'gol', 6, NULL),
(6, NULL, 'gol', 10, 4),
(6, NULL, 'gol', 9, 21),
(6, NULL, 'gol', 10, NULL),
(6, NULL, 'gol', 9, NULL),
(6, NULL, 'gol', 8, 21),
(6, NULL, 'gol', 9, NULL);

CREATE TABLE Valoraciones (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_jugador INT NOT NULL,
    id_partido INT NOT NULL,
    valoracion_personal INT NOT NULL,
    valoracion_compañeros INT NOT NULL,
    overall DECIMAL DEFAULT NULL,
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id),
    FOREIGN KEY (id_partido) REFERENCES Partidos(id)
);

INSERT INTO Valoraciones (id_jugador, id_partido, valoracion_personal, valoracion_compañeros, overall) VALUES
(1, 1, 3, 3, 8.0),
(3, 1, 4, 5, 12.7),
(4, 1, 4, 3, 6.3),
(6, 1, 4, 3, 10.3),
(8, 1, 3, 2, 6.3),
(9, 1, 4, 5, 14.7),
(10, 1, 4, 3, 5.3),
(13, 1, 3, 2, 6.3),
(15, 1, 3, 2, 7.3),
(16, 1, 4, 5, 14.7),
(17, 1, 4, 3, 6.3),
(20, 1, 3, 4, 5.7),
(3, 2, 4, 4, 12.0),
(4, 2, 4, 4, 9.0),
(6, 2, 4, 4, 13.0),
(7, 2, 2, 3, 5.7),
(8, 2, 2, 3, 5.7),
(9, 2, 2, 3, 5.7),
(10, 2, 4, 5, 17.7),
(13, 2, 3, 3, 7.0),
(14, 2, 4, 4, 18.0),
(16, 2, 2, 3, 2.7),
(17, 2, 2, 3, 6.7),
(19, 2, 3, 3, 8.0),
(20, 2, 4, 4, 10.0),
(1, 3, 3, 3, 3.0),
(3, 3, 4, 4, 9.0),
(4, 3, 4, 3, 9.3),
(6, 3, 3, 4, 6.7),
(7, 3, 3, 3, 6.0),
(8, 3, 3, 3, 3.0),
(9, 3, 4, 4, 7.0),
(12, 3, 4, 4, 6.0),
(13, 3, 4, 4, 10.0),
(14, 3, 4, 4, 8.0),
(16, 3, 3, 3, 5.0),
(17, 3, 4, 4, 11.0),
(20, 3, 4, 5, 11.7),
(1, 4, 3, 3, 5.0),
(3, 4, 4, 4, 9.0),
(6, 4, 3, 3, 3.0),
(7, 4, 4, 4, 10.0),
(8, 4, 4, 4, 11.0),
(9, 4, 4, 5, 15.7),
(10, 4, 3, 4, 10.7),
(12, 4, 4, 4, 6.0),
(13, 4, 4, 3, 7.3),
(14, 4, 3, 3, 6.0),
(15, 4, 3, 3, 6.0),
(16, 4, 3, 3, 3.0),
(17, 4, 4, 4, 12.0),
(20, 4, 2, 3, 2.7),
(21, 4, 5, 5, 15.0),
(1, 5, 4, 4, 8.0),
(3, 5, 4, 5, 13.7),
(4, 5, 4, 5, 12.7),
(5, 5, 5, 4, 14.3),
(6, 5, 4, 3, 5.3),
(7, 5, 3, 3, 3.0),
(8, 5, 3, 3, 9.0),
(9, 5, 4, 4, 11.0),
(12, 5, 2, 4, 5.4),
(13, 5, 4, 4, 12.0),
(15, 5, 3, 2, 2.3),
(16, 5, 2, 2, 2.0),
(20, 5, 4, 3, 7.3),
(21, 5, 4, 5, 17.7),
(1, 6, 4, 3, 8.3),
(3, 6, 3, 3, 3.0),
(4, 6, 4, 4, 7.0),
(6, 6, 4, 3, 3.3),
(8, 6, 4, 3, 8.3),
(9, 6, 5, 5, 18.0),
(10, 6, 3, 4, 7.7),
(12, 6, 3, 3, 8.0),
(13, 6, 3, 4, 11.7),
(20, 6, 3, 2, 2.3),
(21, 6, 4, 4, 11.0),
(1, 7, 4, 4, 15.0),
(3, 7, 4, 4, 11.0),
(5, 7, 1, 3, 4.4),
(6, 7, 2, 3, 4.7),
(9, 7, 2, 4, 4.4),
(12, 7, 4, 4, 14.0),
(14, 7, 5, 4, 18.3),
(15, 7, 2, 1, 1.3),
(16, 7, 3, 3, 6.0),
(18, 7, 4, 3, 8.3),
(20, 7, 3, 3, 7.0),
(21, 7, 2, 3, 4.7),
(1, 8, 4, 3, 8.3),
(3, 8, 4, 5, 13.7),
(4, 8, 3, 4, 5.7),
(5, 8, 2, 2, 5.0),
(6, 8, 4, 4, 6.0),
(7, 8, 3, 3, 7.0),
(8, 8, 2, 3, 5.7),
(9, 8, 4, 4, 11.0),
(10, 8, 3, 4, 5.7),
(12, 8, 3, 3, 4.0),
(13, 8, 2, 3, 7.7),
(14, 8, 3, 3, 10.0),
(16, 8, 3, 2, 6.3),
(18, 8, 5, 4, 7.3),
(20, 8, 3, 3, 5.0),
(21, 8, 5, 5, 11.0),
(1, 9, 4, 3, 5.3),
(5, 9, 2, 4, 12.4),
(6, 9, 4, 4, 7.0),
(7, 9, 3, 3, 7.0),
(9, 9, 4, 5, 14.7),
(10, 9, 3, 4, 12.7),
(12, 9, 3, 3, 7.0),
(13, 9, 4, 4, 11.0),
(14, 9, 2, 3, 4.7),
(18, 9, 5, 5, 15.0),
(1, 10, 3, 4, 3.7),
(3, 10, 4, 4, 12.0),
(4, 10, 4, 4, 10.0),
(5, 10, 3, 4, 14.7),
(6, 10, 0, 4, 8.8),
(7, 10, 3, 3, 3.0),
(8, 10, 3, 3, 5.0),
(12, 10, 4, 4, 9.0),
(13, 10, 3, 4, 10.7),
(14, 10, 2, 2, 2.0),
(15, 10, 3, 4, 10.7),
(16, 10, 3, 3, NULL),
(18, 10, 2, 2, 4.0),
(20, 10, 3, 4, 5.7),
(1, 11, 5, 4, 9.3),
(3, 11, 4, 4, 9.0),
(4, 11, 4, 4, 12.0),
(6, 11, 4, 4, 7.0),
(7, 11, 4, 4, 11.0),
(8, 11, 4, 4, 9.0),
(9, 11, 5, 5, 15.0),
(13, 11, 3, 4, 8.7),
(16, 11, 5, 4, 16.3),
(20, 11, 4, 4, 13.0);

CREATE TABLE usuarios (
    id int(11) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);


INSERT INTO usuarios (id, username, password, email, created_at) VALUES
(1, 'admin', '$2y$10$NVFhHl83vsLgzOAF7d1bm.PboVGo0tSrChWXS8H/GY2Vu7aw/buja', 'adminsambaleague@gmail.com', '2025-01-27 18:48:25');
