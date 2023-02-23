DROP DATABASE IF EXISTS sicopa;
CREATE DATABASE IF NOT EXISTS sicopa;
USE sicopa;

/** Catalogos a considerar [] */
CREATE TABLE prefijo (id_prefijo INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_prefijo VARCHAR(10) NOT NULL); # Ing, Lic, Sr, Sra, Srta, etc.
CREATE TABLE servicios (id_servicio INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_servicio VARCHAR(30) NOT NULL);
CREATE TABLE especialidad (id_especialidad INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_especialidad VARCHAR(30) NOT NULL);
CREATE TABLE alergias (id_alergia INT PRIMARY KEY AUTO_INCREMENT NOT NULL, ds_alergia VARCHAR(30) NOT NULL);
CREATE TABLE detalles_alergias (id_alergia INT NOT NULL, detalles_alergia TEXT NOT NULL, FOREIGN KEY(id_alergia) REFERENCES alergias(id_alergia));

### ===> ? no esta completa <== ##
CREATE TABLE usuarios (
	id_usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email VARCHAR(40),
    rol VARCHAR(30)
);
### ===> no esta completa ¿ <== ##

CREATE TABLE paciente (
	id_paciente INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    alergias INT NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    ape_pat VARCHAR(30) NOT NULL,
    ape_mat VARCHAR(30) NOT NULL,
    fec_nac DATE NOT NULL,
    email VARCHAR(50), 
    sexo VARCHAR(30) NOT NULL,
    direccion VARCHAR(50),
    correo VARCHAR(50),
    password VARCHAR(50),
        
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE doctor (
	id_doctor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_especialidad INT NOT NULL,
    cedula VARCHAR(50) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    ape_pat VARCHAR(30) NOT NULL,
    ape_mat VARCHAR(30) NOT NULL,
    direccion VARCHAR(50) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(100),
    perfil VARCHAR(20),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (id_especialidad) REFERENCES especialidad(id_especialidad)
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