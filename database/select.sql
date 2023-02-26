show tables;

select * from doctor;
select * from paciente;
select * from servicios;	
select * from prefijo;
select * from especialidad;

INSERT INTO paciente(alergias, nombre, ape_pat, ape_mat, fec_nac, sexo, direccion, email, password) VALUES
('', 'Francisco', 'Virbes', 'Juan', '', '', '', 'virbes@mail.com', 'virbes'),
('', 'Mario Adolfo', 'Tomas', 'Roblero', '', '', '', 'mario@mail.com', 'mario');