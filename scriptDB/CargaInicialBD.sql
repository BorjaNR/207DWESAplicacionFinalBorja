-- Me posiciono en la base de datos
USE DB207DWESAplicacionFinalBorja;

-- Inserto los datos iniciales en la tabla T02_Departamento
INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio, T02_FechaBajaDepartamento) VALUES
    ('AAA', 'Departamento de Ventas', NOW(), 100000.50, NULL),
    ('AAB', 'Departamento de Marketing', NOW(), 50089.50, NULL),
    ('AAC', 'Departamento de Finanzas', NOW(), 600.50, '2023-11-13 13:06:00');

-- Inserto los datos iniciales en la tabla T01_Usuario con contraseñas cifradas en SHA-256
INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) VALUES
    ('admin', SHA2('adminpaso', 256), 'administrador', 'administrador'),
    ('alvaro', SHA2('alvaropaso', 256), 'Álvaro Cordero Miñambres', 'usuario'),
    ('carlos', SHA2('carlospaso', 256), 'Carlos García Cachón', 'usuario'),
    ('oscar', SHA2('oscarpaso', 256), 'Oscar Pascual Ferrero', 'usuario'),
    ('borja', SHA2('borjapaso', 256), 'Borja Nuñez Refoyo', 'usuario'),
    ('rebeca', SHA2('rebecapaso', 256), 'Rebeca Sánchez Pérez', 'usuario'),
    ('erika', SHA2('erikapaso', 256), 'Erika Martínez Pérez', 'usuario'),
    ('ismael', SHA2('ismaelpaso', 256), 'Ismael Ferreras García', 'usuario'),
    ('heraclio', SHA2('heracliopaso', 256), 'Heraclio Borbujo Moran', 'usuario'),
    ('amor', SHA2('amorpaso', 256), 'Amor Rodriguez Navarro', 'usuario');

-- Inserto los datos iniciales en la tabla T10_Vehiculo con contraseñas cifradas en SHA-256
INSERT INTO T10_Vehiculo (T10_Matricula, T10_Modelo, T10_FechaCompra, T10_NumPuertas, T10_Color, T10_Valor, T10_FechaBaja) VALUES
    ('ABC1234', 'Toyota Corolla', '2023-01-15 10:30:00', 4, 'Rojo', 15000.00, NULL),
    ('DEF5678', 'Honda Civic', '2022-11-20 14:45:00', 4, 'Azul', 18000.50, NULL),
    ('GHI9012', 'Ford Mustang', '2023-05-10 09:15:00', 2, 'Negro', 35000.75, NULL),
    ('JKL3456', 'Chevrolet Camaro', '2023-07-05 11:00:00', 2, 'Blanco', 32000.25, NULL),
    ('MNO7890', 'Volkswagen Golf', '2023-03-28 08:00:00', 4, 'Gris', 22000.00, NULL);
