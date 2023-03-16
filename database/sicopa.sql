DROP DATABASE IF EXISTS sicopa;
CREATE DATABASE IF NOT EXISTS sicopa;
USE sicopa;

-- < ------------------------------------ CATALOGOS a considerar []-------------------------------------------- > --
CREATE TABLE cCatalog(
	CvCatal INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    DsCatal VARCHAR(30), 
    NmFisCat VARCHAR(30), 
    NmColCv VARCHAR(30), 
    NmColDs VARCHAR(30)
) ENGINE = InnoDb;

CREATE TABLE cServicio  (CvServicio  INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsServicio  VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cTipPerson (CvTipPerson INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsTipPerson VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cNombre    (CvNombre    INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsNombre    VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cApellido  (CvApellido  INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsApellido  VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cGenero    (CvGenero    INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsGenero    VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cEstado    (CvEstado    INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsEstado    VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cMunicipio (CvMunicipio INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsMunicipio VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cColonia   (CvColonia   INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsColonia   VARCHAR(30)) Engine = InnoDB;
CREATE TABLE cCalle     (CvCalle     INT PRIMARY KEY AUTO_INCREMENT NOT NULL,  DsCalle     VARCHAR(30)) Engine = InnoDB;
-- < ----------------------------------------------------------------------------------------------------------- > ---


-- < ------------------------------------ DATOS PERSONALES -------------------------------------------- > --
CREATE TABLE mPersona(
	CvPerson INT PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    
	CvTipPerson INT, 
    
    Curp VARCHAR(20),
    Rfc VARCHAR(20),
    Email VARCHAR(30),
    CvNombre INT, 
    CvApePat INT, 
    CvApeMat INT, 
    FecNac DATE,
    CvGenero INT, 
    Telefono VARCHAR(15),

    CvEstado INT,
    CvMunicipio INT,
    CvColonia INT,
    CvCalle INT,
    Numero VARCHAR(10), 
    Cp INT,    
    
    FOREIGN KEY (CvTipPerson) REFERENCES cTipPerson(CvTipPerson),
    
    FOREIGN KEY (CvNombre) REFERENCES cNombre(CvNombre),
    FOREIGN KEY (CvApePat) REFERENCES cApellido(CvApellido),
    FOREIGN KEY (CvApeMat) REFERENCES cApellido(CvApellido),
    FOREIGN KEY (CvGenero) REFERENCES cGenero(CvGenero),
    
    FOREIGN KEY (CvEstado) REFERENCES cEstado(CvEstado),
    FOREIGN KEY (CvMunicipio) REFERENCES cMunicipio(CvMunicipio),
    FOREIGN KEY (CvColonia) REFERENCES cColonia(CvColonia),
    FOREIGN KEY (CvCalle) REFERENCES cCalle(CvCalle)
) Engine = InnoDB;
-- < ------------------------------------ end of DATOS PERSONALES -------------------------------------------- > --
CREATE TABLE Users (
	CvUser    INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CvPerson  INT  		   NOT NULL,
	Login 	  VARCHAR(30)  NOT NULL,
	Password  VARCHAR(100) NOT NULL,
	FecIni    DATE         NOT NULL,
	FecFin    DATE         NOT NULL,
	EdoCta    BOOLEAN      NOT NULL, 
    
    FOREIGN KEY (CvPerson) REFERENCES mPersona(CvPerson)
)ENGINE = InnoDB;


-- < ------------------------------------ SICOPA -------------------------------------------- > --
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
-- < ------------------------------------ end of SICOPA -------------------------------------------- > --