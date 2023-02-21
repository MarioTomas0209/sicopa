/** Titulos y/o abreviaciones de los pacientes */
INSERT INTO prefijo(ds_prefijo) VALUES ('Sra'), ('Srta'), ('Sr'), ('Lic'), ('Ing'), ('Dr'), ('Arq'), ('Mtro'), ('Prof');

/** Las diferentes tareas que el profesional puede realizar */
INSERT INTO tipo_consulta(ds_tipo) VALUES 
('Limpieza bucal'), ('Empastes'), ('Endodoncia'), ('Prótesis'), ('Implantes'), ('Cirugías bucales'), 
('Cosmética dental'), ('Extracción'), ('Limpieza'), ('Blanqueamiento dental'), ('Resinas'), ('Incrustaciones'), 
('Coronas');

/** Rama en la que se especializa el doctor */
INSERT INTO especialidad(ds_especialidad) VALUES 
('Odontología general'), ('Cirugía oral y maxilofacial'), ('Endodoncia'), 
('Odontologia estética'), ('Odontopediatría'), ('Ortodoncia'), ('Patología bucal');

/** Algunas [alergias] que el paciente puede presentar por los medicamentos o herramientas a utilizar */
INSERT INTO alergias(ds_alergia) VALUES 
('Látex'), ('Resinas'), ('Materiales de impresión'), ('Alergias a metales');
INSERT INTO detalles_alergias(detalles_alergia) VALUES
(1, 'Los guantes de látex son uno de los principales en generar dermatitis de contacto en personas alérgicas, por lo general evidencian rubor e hinchazón pero en casos avanzados se acompaña de conjuntivitis, desmayos y choque anafiláctico; las personas que han sido sometida a demasiadas operaciones suelen presentar esta condición. Lo mejor es prevenir detectando la alergia en la historia clínica o preguntándole directamente al paciente y familiares sobre sus antecedentes.'),
(2, 'Las restauraciones con resinas acrílicas o compuestas, son capaces de desencadenar reacciones alérgicas en la mucosa oral, evidenciando estomatitis, dolor, sensación de ardor y alteraciones del gusto. En algunos casos suele ser momentáneo presentando signos solo al momento de la colocación de la resina, este material en contacto con la flora bucal se vuelve poroso y el componente bacteriano unido a la secreción salival es una esponja de gérmenes, incluso este posiblemente es  el inicio de la infección por cándida una bacteria común que se aloja en la boca pero cuando el balance se descontrola genera candidiasis, actualmente las resinas compuestas se activan por medio de luz reduciendo estos problemas.'),
(3, 'La probabilidad de alergias por materiales de impresión es baja pero existe, en su mayoría están elaborados con poliésteres, y las precauciones que debe tener el odontólogo o auxiliar consisten en una manipulación adecuada para lograr una perfecta combinación catalizadora de la pasta base, está comprobado que trazos en la pasta catalizados en  contacto con la mucosa de la piel desencadenan alergias, durante su preparación el profesional debe tener sumo cuidado de no mancharse.'),
(4, 'Los metales de cómo el  Níquel, Cromo, Cobalto y Platino son ampliamente utilizados en odontología, sobretodo en aparatos de ortodoncia, una vez en la boca y en contacto con la mucosa causan absorción en el organismo dando como resultado alergias.');