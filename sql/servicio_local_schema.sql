CREATE DATABASE servicio_local;

USE servicio_local;

CREATE TABLE personas(
	id_persona INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(45) NOT NULL,
	apellido VARCHAR(60) NOT NULL,
	tipo_dni ENUM('DNI', 'Partida de Naciemiento', 'Pasaporte') DEFAULT 'dni',
	dni INT NOT NULL UNIQUE,
	fecha_nacimiento DATE NOT NULL,
	domicilio VARCHAR(100) NOT NULL,
	barrio ENUM('Santa Brigida', 'Sarmiento', 'Mitre', 'San Miguel') DEFAULT 'San Miguel',
	telefono INT DEFAULT NULL,
	PRIMARY KEY (id_persona)
);

SHOW COLUMNS FROM personas LIKE 'barrio';

INSERT INTO personas (nombre, apellido, tipo_dni, dni, fecha_nacimiento, domicilio, barrio, telefono) VALUES(
'Elias', 'Tofaletti', 'DNI', 44611684, '2003-03-11', 'Santander 139', 'Santa Brigida', 1136760920);

CREATE TABLE responsables(
	id_responsable INT NOT NULL AUTO_INCREMENT,
    id_persona INT NOT NULL,
    relacion ENUM('Madre', 'Padre', 'Abuela', 'Abuelo', 'Tio', 'Tia', 'Tutor', 'Madrina', 'Padrino', 'Vecino', 'Vecina') DEFAULT NULL,
    PRIMARY  KEY (id_responsable),
    FOREIGN KEY (id_persona) REFERENCES personas (id_persona) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO responsables (relacion) VALUES('Madre');

CREATE TABLE chicos(
	id_chico INT NOT NULL AUTO_INCREMENT,
    id_persona INT NOT NULL,
    id_responsable INT NOT NULL,
    apodo VARCHAR(45) DEFAULT NULL,
    PRIMARY KEY (id_chico),
	FOREIGN KEY (id_persona) REFERENCES personas (id_persona) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO chicos (apodo) VALUES ('Toffa');

CREATE TABLE casos(
	id_caso INT NOT NULL AUTO_INCREMENT,
    id_chico INT NOT NULL,
    id_responsable INT NOT NULL,
    n_expediente INT NOT NULL,
    ingreso DATE,
    denunciante VARCHAR(100),
    origen ENUM('Municipio', 'Iglesia', 'Comisaría', 'Civil', 'Salud', 'Escuelas', 'UFIS', 'Coordinación'),
    medidas_tomadas JSON,
    observaciones JSON,
    PRIMARY KEY (id_caso),
	FOREIGN KEY (id_responsable) REFERENCES responsables (id_responsable) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_chico) REFERENCES chicos (id_chico) ON DELETE CASCADE ON UPDATE CASCADE
);

