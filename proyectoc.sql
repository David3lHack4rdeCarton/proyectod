-- Tabla de roles
CREATE TABLE roles (
    id_roles INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL
);

-- Insertar roles iniciales
INSERT INTO roles (nombre) VALUES ('Admin');
INSERT INTO roles (nombre) VALUES ('Secretaria');

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    correo VARCHAR(50),
    contraseña VARCHAR(50),
    rol_id INT,
    FOREIGN KEY (rol_id) REFERENCES roles(id_roles)
);

-- Insertar usuario con rol de Admin
INSERT INTO usuarios (nombre, correo, contraseña, rol_id) VALUES ('admin', 'admin@gmail.com', 'admin123', 1);

-- Tabla de carreras
CREATE TABLE carreras (
    id_carreras INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(90) NOT NULL -- Ajustado el tamaño a 90 caracteres
);

-- Insertar nuevas carreras
INSERT INTO carreras (nombre) VALUES ('T.S.U. en Desarrollo de Negocios Área Mercadotecnia');
INSERT INTO carreras (nombre) VALUES ('Licenciatura en Innovación de Negocios y Mercadotecnia');
INSERT INTO carreras (nombre) VALUES ('T.S.U. en Gastronomía');
INSERT INTO carreras (nombre) VALUES ('Licenciatura en Gastronomía');
INSERT INTO carreras (nombre) VALUES ('T.S.U. en Mantenimiento Industrial Área Instalaciones');
INSERT INTO carreras (nombre) VALUES ('Ingeniería en Mantenimiento Industrial');
INSERT INTO carreras (nombre) VALUES ('T.S.U. en Tecnologías de la Información Área Desarrollo de Software Multiplataforma');
INSERT INTO carreras (nombre) VALUES ('Ingeniería en Desarrollo y Gestión de Software');

-- Tabla de géneros
CREATE TABLE generos (
    id_generos INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(10) NOT NULL
);

-- Insertar géneros
INSERT INTO generos (nombre) VALUES ('Hombre');
INSERT INTO generos (nombre) VALUES ('Mujer');
-- Puedes agregar más géneros según sea necesario

-- Tabla de estudiantes con el campo "carrera_id", "genero_id" y "correo"
CREATE TABLE estudiantes (
    id_estudiantes INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    apellidoP VARCHAR(50),
    apellidoM VARCHAR(50),
    matricula VARCHAR(20),
    calificacionG FLOAT,
    desercion BOOLEAN,
    genero_id INT,
    edad INT,
    correo VARCHAR(90), -- Ajustado el tamaño a 90 caracteres
    usuario_id INT,
    carrera_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (carrera_id) REFERENCES carreras(id_carreras),
    FOREIGN KEY (genero_id) REFERENCES generos(id_generos)
);
