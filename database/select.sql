show tables;

select * from doctor;
select * from servicios;	
select * from prefijo;
select * from especialidad;

INSERT INTO doctor(id_especialidad, cedula, nombre, ape_pat, ape_mat, direccion, telefono, email, password, perfil) VALUES 
(1, '123456789', 'Shaun', 'Murphy', 'Highmore', 'Vancouver, Canadá', '335594', 'shaun.murphy@mail.com', 'gooddoctor', 'admin'),
(2, '987654321', 'Gregory', 'House', 'Laurie', 'Fox en Los Ángeles', '335594', 'gregory.house@mail.com', 'drhouse', 'admin');