show tables;

SELECT * FROM Paciente;
SELECT * FROM Doctor;
SELECT * FROM Citas;

SELECT * FROM cCatalog;
SELECT * FROM cTipPerson;
SELECT * FROM cServicio;
SELECT * FROM cNombre;
SELECT * FROM cApellido;
SELECT * FROM cGenero;
SELECT * FROM cEstado;
SELECT * FROM cMunicipio;
SELECT * FROM cColonia;
SELECT * FROM cCalle;
SELECT * FROM mPersona;
SELECT * FROM Users;
SELECT * FROM maplicaciones;
SELECT * FROM maccesos;	

SELECT u.Login, a.CvAplicacion FROM maccesos a, users u WHERE a.CvUsuario = u.CvUser;

DELETE FROM maccesos WHERE cvaplicacion = 'SIC10000' AND cvusuario = 2;

SELECT * FROM maccesos ORDER BY cvaplicacion ASC;

SELECT * FROM aplicaciones WHERE CvAplicacion LIKE '%0000';
SELECT * FROM aplicaciones WHERE CvAplicacion LIKE 'SIC4%' LIMIT 18446744073709551615 OFFSET 1;
SELECT * FROM aplicaciones WHERE CvAplicacion LIKE 'SIC1%' ;

DELETE FROM aplicaciones where id_aplicacion = 11;

UPDATE aplicaciones SET cvaplicacion = '123', dsaplicacion = '321' WHERE id_aplicacion = 1;

SELECT * FROM doctor WHERE email NOT IN ('admin');
SELECT * FROM Users WHERE login NOT IN ('admin') ORDER BY CvUser ASC;

SELECT u.cvuser, u.login, p.cvperson, n.dsnombre, a.dsapellido, u.fecini, u.fecfin, u.edocta
FROM users u, mpersona p, cnombre n, capellido a
WHERE p.cvperson = u.cvperson AND n.cvnombre = p.cvnombre AND a.cvapellido = p.cvapepat;