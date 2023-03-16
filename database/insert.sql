INSERT INTO cCatalog(DsCatal, NmFisCat, NmColCv, NmColDs) VALUES 
('Tipo de Persona', 'cTipPerson', 'CvTipPerson', 'DsTipPerson'),
('Servicios', 'cServicio', 'CvServicio', 'DsServicio'),
('Nombre', 'cNombre', 'CvNombre', 'DsNombre'),
('Apellido', 'cApellido', 'CvApellido', 'DsApellido'),
('Género', 'cGenero', 'CvGenero', 'DsGenero'),
('Estado', 'cEstado', 'CvEstado', 'DsEstado'),
('Municipio', 'cMunicipio', 'CvMunicipio', 'DsMunicipio'),
('Colonia', 'cColonia', 'CvColonia', 'DsColonia'),
('Calle', 'cCalle', 'CvCalle', 'DsCalle');

INSERT INTO cTipPerson(DsTipPerson) VALUES ('Doctor'), ('Paciente');
INSERT INTO cNombre(DsNombre) VALUES ('Francisco'), ('Mario'), ('Miguel'), ('Cleydi');
INSERT INTO cApellido(DsApellido) VALUES ('Virbes'), ('Tomas'), ('Santiz'), ('Lazaro');
INSERT INTO cGenero(DsGenero) VALUES ('Masculino'), ('Femenino');
INSERT INTO cEstado(DsEstado) VALUES ('Chiapas'), ('Jalisco'), ('Nuevo León');
INSERT INTO cMunicipio(DsMunicipio) VALUES ('Comitán'), ('Margaritas'), ('Trinitaria');
INSERT INTO cColonia(DsColonia) VALUES ('Linda Vista'), ('Cerrito Concepción'), ('Cedro');
INSERT INTO cCalle(DsCalle) VALUES ('Arenal'), ('Laguna Esmeralda'), ('Miguel Aleman');
INSERT INTO cServicio(DsServicio) VALUES ('Limpieza bucal'), ('Empastes'), ('Endodoncia'), 
('Prótesis'), ('Implantes'), ('Cirugías bucales'), ('Cosmética dental'), ('Extracción'), 
('Limpieza'), ('Blanqueamiento dental'), ('Resinas'), ('Incrustaciones'), ('Coronas');

INSERT INTO mPersona(CvTipPerson, Curp, Rfc, Email, CvNombre, CvApePat, CvApeMat, FecNac, CvGenero, Telefono, CvEstado, CvMunicipio, CvColonia, CvCalle, Numero, Cp) VALUES
(1, 1, 1, 1, 1, 1, 1, '', 1, '963', 1, 1, 1, 1, 'S/N', '30038');

INSERT INTO Users() VALUES(0, 1, 'admin', '$2a$07$asxx54ahjppf45sd87a5aunxs9bkpyGmGE/.vekdjFg83yRec789S', '', '', true);

INSERT INTO doctor(cedula, nombre, apellidos, direccion, telefono, email, password, perfil) VALUES 
('0', 'Administrador', 'Sicopa', '', '', 'admin', 'admin', 'admin'),
('123456789', 'Shaun', 'Murphy Highmore', 'Vancouver, Canadá', '335594', 'shaun.murphy@mail.com', 'gooddoctor', 'doctor'),
('987654321', 'Gregory', 'House Laurie', 'Fox en Los Ángeles', '335594', 'gregory.house@mail.com', 'drhouse', 'doctor');

INSERT INTO paciente(nombre, apellidos, fec_nac, tel, email, password) VALUES
('Francisco', 'Virbes Juan', '', '', 'virbes@mail.com', 'virbes'),
('Mario Adolfo', 'Tomas Roblero','', '', 'mario@mail.com', 'mario');