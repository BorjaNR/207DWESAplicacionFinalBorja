--Eliminar base de datos en caso de que exista
DROP DATABASE IF EXISTS DB207DWESAplicacionFinalBorja;

DROP USER IF EXISTS 'user207DWESAplicacionFinal'@'%';

--Crear la base de datos
CREATE DATABASE DB207DWESAplicacionFinalBorja;

--Utilizar la base de datos recién creada
USE DB207DWESAplicacionFinalBorja;

--Crear la tabla T01_Usuario
CREATE TABLE T01_Usuario (
    T01_CodUsuario CHAR(8) PRIMARY KEY,
    T01_Password VARCHAR(64),
    T01_DescUsuario VARCHAR(255),
    T01_NumConexiones INT DEFAULT 0,
    T01_FechaHoraUltimaConexion DATETIME DEFAULT NULL,
    T01_Perfil ENUM('usuario','administrador') DEFAULT 'usuario',
    T01_ImagenUsuario BLOB
)ENGINE=INNODB;

--Crear la tabla T02_Departamento
CREATE TABLE T02_Departamento (
    T02_CodDepartamento CHAR(3) PRIMARY KEY,
    T02_DescDepartamento VARCHAR(255),
    T02_FechaCreacionDepartamento DATETIME DEFAULT CURRENT_TIMESTAMP,
    T02_VolumenDeNegocio DOUBLE,
    T02_FechaBajaDepartamento DATETIME
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS T10_Vehiculo (
    T10_Matricula VARCHAR(7) NOT NULL,
    T10_Modelo VARCHAR(50) NOT NULL,
    T10_FechaCompra DATETIME NOT NULL,
    T10_NumPuertas INT NOT NULL,
    T10_Color VARCHAR(50),
    T10_Valor DECIMAL(18,2),
    T10_FechaBaja DATETIME DEFAULT NULL,
    PRIMARY KEY (T10_Matricula));

--Creación del usuario de la base de datos
CREATE USER 'user207DWESAplicacionFinal'@'%' IDENTIFIED BY 'paso';
--Otorgar permisos al usuario para acceder a la base de datos
GRANT ALL PRIVILEGES ON DB207DWESAplicacionFinalBorja.* TO 'user207DWESAplicacionFinal'@'%';