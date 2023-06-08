USE servicio_local;

INSERT INTO personas (nombre, apellido, tipo_dni, dni, fecha_nacimiento, domicilio, barrio, telefono) VALUES(
'Elias', 'Tofaletti', 'DNI', 44611684, '2003-03-11', 'Santander 139', 'Santa Brigida', 1136760920);

SET @id_persona = last_insert_id();

INSERT INTO responsables (relacion, id_persona) VALUES('Madre', @id_persona);

SET @id_responsable = last_insert_id();

INSERT INTO chicos (apodo, id_persona, id_responsable) VALUES ('Toffa', @id_persona, @id_responsable);

SET @id_chico = last_insert_id();

INSERT INTO casos (n_expediente, ingreso, denunciante, origen, observaciones, id_chico, id_responsable) VALUES (
1111, '2023-06-06', 'Vecino', 'Comisaria', 'El chico tenia mucha hambre, y frio', @id_chico, @id_responsable);

SELECT * FROM personas 
JOIN responsables ON responsables.id_persona = personas.id_persona
JOIN chicos ON chicos.id_persona = personas.id_persona
JOIN casos ON casos.id_chico = chicos.id_chico AND casos.id_responsable = responsables.id_responsable
;