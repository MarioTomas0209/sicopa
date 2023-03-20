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
SELECT * FROM sicopa.Users;

SELECT * FROM doctor WHERE email NOT IN ('admin');
SELECT * FROM Users WHERE login NOT IN ('admin') ORDER BY CvUser ASC;

SELECT u.cvuser, u.login, p.cvperson, n.dsnombre, a.dsapellido, u.fecini, u.fecfin, u.edocta
FROM users u, mpersona p, cnombre n, capellido a
WHERE login = 'migue' AND password = 'migue' AND
p.cvperson = u.cvperson AND n.cvnombre = p.cvnombre AND a.cvapellido = p.cvapepat;