DROP DATABASE IF EXISTS sicopa;
CREATE DATABASE IF NOT EXISTS sicopa;
USE sicopa;

/** Catalogos a considerar [] */
CREATE TABLE prefijo (id_prefijo INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_prefijo VARCHAR(10) NOT NULL); # Ing, Lic, Sr, Sra, Srta, etc.
CREATE TABLE servicios (id_servicio INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_servicio VARCHAR(30) NOT NULL);
CREATE TABLE alergias (id_alergia INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_alergia VARCHAR(30) NOT NULL);
CREATE TABLE detalles_alergias (id_alergia INT NOT NULL, detalles_alergia TEXT NOT NULL, FOREIGN KEY(id_alergia) REFERENCES alergias(id_alergia));

CREATE TABLE paciente (
	id_paciente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    fec_nac DATE NOT NULL,
    tel VARCHAR(30) NOT NULL,
    email VARCHAR(50), 
    password VARCHAR(120),
        
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE doctor (
	id_doctor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cedula VARCHAR(50) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(120),
    perfil VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE alergias_pacientes (
    id_ INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_paciente INT NOT NULL,
    id_alergia INT NOT NULL,
    
    FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente),
    FOREIGN KEY (id_alergia) REFERENCES alergias(id_alergia)
);


CREATE TABLE citas (
	id_cita INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_paciente INT NOT NULL,
    id_doctor INT NOT NULL,
    estado_cita INT NOT NULL, # [1] => vigente, [0] => cancelada
    fecha_atencion DATE NOT NULL,
    inicio_atencion DATETIME NOT NULL,
    fin_atencion DATETIME NOT NULL,
    motivo VARCHAR (50) NOT NULL,
    observaciones TEXT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente),
    FOREIGN KEY (id_doctor) REFERENCES doctor(id_doctor)
);