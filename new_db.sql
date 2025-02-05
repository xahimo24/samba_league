CREATE DATABASE samba_league;  -- Create the database

USE samba_league;  -- Use the database

CREATE TABLE Jugadores (  -- Create the teams table
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    dorsal VARCHAR(4) NOT NULL,
    posicion VARCHAR(20) NOT NULL,
    ritmo int NOT NULL,
    disparo int NOT NULL,
    pase int NOT NULL,
    regate int NOT NULL,
    defensa int NOT NULL,
    fisico int NOT NULL
);

INSERT INTO 'Jugadores' ('nombre', 'dorsal', 'posicion', 'ritmo', 'disparo', 'pase', 'regate', 'defensa', 'fisico') VALUES 
('AITOR', '420', 'CM', 77, 72, 84, 80, 69, 71),
('ALBERTO', NULL, 'GK', NULL, NULL, NULL, NULL, NULL, NULL),
('ALVARO', '23', 'CB', 74, 69, 77, 66, 86, 85),
('ANDREU', '32', 'ST', 75, 67, 82, 82, 68, 68),
('BIEL', '14', 'ST', 77, 82, 68, 5, 12, 74),
('BRAIS', '10', 'CM', 73, 63, 84, 81, 67, 64),
('EDU', '37', 'CD', 62, 67, 67, 65, 80, 80),
('HUGO', '45', 'GK', 66, 74, 73, 64, 66, 67),
('JAVI', '11', 'ST', 84, 88, 74, 80, 44, 75),
('JOAN', '3', 'CB', 84, 66, 71, 70, 76, 82),
('PETACA', '17', 'CB', NULL, NULL, NULL, NULL, NULL, NULL),
('PEDRI', '78', 'CB', 64, 57, 65, 60, 81, 86),
('JUSI', '6', 'CM', 75, 72, 76, 76, 60, 67),
('MARCEL', '37', 'CD', 75, 82, 70, 71, 42, 71),
('MIQUEL', '1', 'CM', 80, 44, 60, 55, 65, 65),
('NANO', '16', 'CM', 74, 75, 78, 74, 76, 76),
('OSCAR', '8', 'ST', 75, 79, 70, 73, 64, 80),
('PERAS', '87', 'CM', 72, 65, 75, 70, 73, 79),
('VITO', '37', 'ST', NULL, NULL, NULL, NULL, NULL, NULL),
('XASQUI', '15', 'CB', 64, 66, 70, 64, 83, 84),
('XAVI', '5', 'CM', 73, 80, 83, 82, 73, 70),
('COCA', NULL, 'ST', NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE Estadisticas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_jugador INT NOT NULL,
    partidos_jugados INT NOT NULL,
    vitorias INT NOT NULL,
    derrotas INT NOT NULL,
    goles INT NOT NULL,
    asistencias INT NOT NULL,
    paradas INT NOT NULL,
    defensa INT NOT NULL,
    puntos INT NOT NULL,
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id)
);

INSERT INTO 'Estadisticas' ('id_jugador', 'partidos_jugados', 'vitorias', 'derrotas', 'goles', 'asistencias', 'paradas', 'defensa', 'puntos') VALUES 
(1, 10, 3, 7, 6, 8, 1, 4, 73.90),
(2, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(3, 10, 8, 2, 6, 8, 1, 9, 105.10),
(4, 8, 5, 3, 10, 6, 0, 0, 72.00),
(5, 5, 3, 2, 11, 2, 1, 0, 50.80),
(6, 11, 4, 7, 9, 5, 1, 0, 10, 75.10),
(7, 8, 3, 5, 3, 8, 2, 0, 52.70),
(8, 9, 5, 4, 7, 2, 2, 0, 63.00),
(9, 10, 6, 4, 22, 12, 1, 0, 117.20),
(10, 6, 3, 3, 6, 5, 1, 4, 59.80),
(11, 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(12, 8, 3, 5, 4, 2, 2, 4, 59.40),
(13, 10, 7, 3, 11, 9, 4, 0, 92.40),
(14, 7, 3, 4, 15, 2, 1, 0, 67.00),
(15, 6, 3, 3, 2, 0, 2, 0, 32.60),
(16, 9, 4, 5, 10, 4, 0, 61.00),
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

INSERT INTO 'Equipos' ('color') VALUES 
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

CREATE TABLE Plantilla (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_jugador INT NOT NULL,
    id_equipo INT NOT NULL,
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id),
    FOREIGN KEY (id_equipo) REFERENCES Equipos(id)
);

CREATE TABLE Partidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    jornada INT NOT NULL,
    fecha DATE NOT NULL,
    id_equipo_local INT NOT NULL,
    id_equipo_visitante INT NOT NULL,
    goles_local INT NOT NULL,
    goles_visitante INT NOT NULL,
    comentarios TEXT,
    FOREIGN KEY (id_equipo_local) REFERENCES Equipos(id),
    FOREIGN KEY (id_equipo_visitante) REFERENCES Equipos(id)
);

CREATE TABLE Eventos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_partido INT NOT NULL,
    id_jugador_principal INT NOT NULL,
    id_jugador_secundario INT,
    minuto INT NOT NULL,
    tipo_evento VARCHAR(20) NOT NULL,
    comentarios TEXT,
    FOREIGN KEY (id_partido) REFERENCES Partidos(id),
    FOREIGN KEY (id_jugador) REFERENCES Jugadores(id)
);

