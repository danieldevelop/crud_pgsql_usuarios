CREATE DATABASE crudpgsql;

--
-- STRUCTURE TABLE mvc_usuario
--
CREATE TABLE usuario(
    id SERIAL,
    rut VARCHAR(14),
    apllidos VARCHAR(45),
    nombre VARCHAR(45),
    nacionalidad VARCHAR(30),
    sexo VARCHAR(5),
    fchNacimiento VARCHAR(25),
    username VARCHAR(45),
    userpass VARCHAR(255)
);

--
-- ADD INDEX IN TABLE
--
ALTER TABLE usuario ADD PRIMARY KEY(id);
ALTER TABLE usuario ADD UNIQUE(username), ADD UNIQUE(rut);
