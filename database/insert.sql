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
INSERT INTO cNombre(DsNombre) VALUES ('Trinidad'),('Gumaro'),('Policarpio'),('Dimitrio'),('Guadalupe'),('Gumercinda'),('Yaravi'),('Conception');
INSERT INTO cApellido(DsApellido) VALUES ('Camargo'),('Salas'),('Bolton'),('Tarzo'),('Solano'),('Llamas'),('Inocencio'),('Dimitrio');
INSERT INTO cGenero(DsGenero) VALUES ('Masculino'), ('Femenino');
INSERT INTO cEstado(DsEstado) VALUES ('Chiapas'), ('Jalisco'), ('Nuevo León'),('Frontera Comalapa');
INSERT INTO cMunicipio(DsMunicipio) VALUES ('Comitán'), ('Margaritas'), ('Trinitaria');
INSERT INTO cColonia(DsColonia) VALUES ('Linda Vista'), ('Cerrito Concepción'), ('Cedro');
INSERT INTO cCalle(DsCalle) VALUES ('Arenal'), ('Laguna Esmeralda'), ('Miguel Aleman');
INSERT INTO cServicio(DsServicio) VALUES ('Limpieza bucal'), ('Empastes'), ('Endodoncia'), 
('Prótesis'), ('Implantes'), ('Cirugías bucales'), ('Cosmética dental'), ('Extracción'), 
('Limpieza'), ('Blanqueamiento dental'), ('Resinas'), ('Incrustaciones'), ('Coronas');

INSERT INTO mPersona(CvTipPerson, Curp, Rfc, Email, CvNombre, CvApePat, CvApeMat, FecNac, CvGenero, Telefono, CvEstado, CvMunicipio, CvColonia, CvCalle, Numero, Cp) VALUES
(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null),
(2, 'LAMC970924MCSZRL09', 'MAGA910701LX9', 'cley12@gmail.com', 2, 2, 2, '1999-12-12', 1, '9631567898', 1, 1, 2, 1, '12', 30020),
(2, 'LAMC970924MCSZRL08', 'MAGA910701LX9', 'cley12@gmail.com', 1, 3, 3, '2000-12-19', 1, '9631281987', 1, 2, 2, 2, '13', 30022),
(2, 'LAMC970924MCSZRL07', 'MAGA910701LX9', 'cley12@gmail.com', 2, 2, 2, '1989-05-23', 1, '9786543213', 1, 2, 1, 3, '14', 30078),
(2, 'LAMC970924MCSZRL06', 'MAGA910701LX9', 'cleydi12@gmail.com', 3, 1, 3, '1987-09-24', 2, '9876543245', 1, 3, 2, 2, '15', 30045),
(2, 'LAMC970924MCSZRL05', 'MAGA910701LX9', 'cleydi12@gmail.com', 2, 3, 2, '1999-12-31', 2, '9641243567', 1, 1, 3, 2, '16', 30056),
(2, 'LAMC970924MCSZRL04', 'MAGA910701LX9', 'cley12@gmail.com', 3, 2, 1, '2001-05-16', 2, '9631345162', 1, 2, 2, 3, '17', 30000);

INSERT INTO Users(CvPerson, Login, Password, FecIni, FecFin, EdoCta) VALUES
(1, 'admin', 'admin', '', '', true),
(3, 'Triny', 'Triny', '2023-04-29', '2023-05-13', true),
(4, 'Guma', 'Guma', '2023-04-28', '2023-05-15', true),
(5, 'Poli', 'Poli', '2023-04-30', '2023-05-10', true),
(6, 'Gume', 'Gume', '2023-03-28', '2023-04-02', true);


INSERT INTO maplicaciones (CvAplicacion, DsAplicacion) VALUES
('SIC10000', 'Catálogos'),
('SIC11000', 'Alta de Catálogos'),
('SIC12000', 'Modificación de Catálogos'),
('SIC13000', 'Baja de Catálogos'),
('SIC20000', 'Datos Personales'),
('SIC21000', 'Alta de Datos personales'),
('SIC22000', 'Modificacion de datos personales'),
('SIC23000', 'Baja de datos personales'),
('SIC30000', 'Usuarios'),
('SIC31000', 'Alta de Usuarios'),
('SIC32000', 'Modificacion de Usuarios'),
('SIC33000', 'Baja de Usuarios'),
('SIC40000', 'Contraseña'),
('SIC41000', 'Alta de contraseña'),
('SIC42000', 'Modificacion de Contraseña'),
('SIC43000', 'Baja de Contraseña'),
('SIC50000', 'Aplicaciones'),
('SIC51000', 'Alta de aplicaciones'),
('SIC52000', 'Modificacion de Aplicaciones'),
('SIC53000', 'Baja de Aplicaciones'),
('SIC60000', 'Accesos'),
('SIC61000', 'Alta de Accesos'),
('SIC62000', 'Modificacion de Accesos'),
('SIC63000', 'Baja de Accesos');