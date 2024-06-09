-- Crea la BBDD y la Utiliza
CREATE DATABASE IF NOT EXISTS cmnet;
USE cmnet;

-- Crea las Tablas
CREATE TABLE IF NOT EXISTS Usuarios (
    ID INT AUTO_INCREMENT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Apellidos VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    NumeroTelefono VARCHAR(15) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS Ordenadores (
    ID INT AUTO_INCREMENT NOT NULL,
    Puesto VARCHAR(4) NOT NULL,
    PrecioHora INT NOT NULL,
    Tipo VARCHAR(10) NOT NULL,
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS Reservas (
    ID INT AUTO_INCREMENT NOT NULL,
    Fecha DATE NOT NULL,
    HoraInicio TIME NOT NULL,
    HoraFinal TIME NOT NULL,
    UsuarioID INT NOT NULL,
    OrdenadorID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID),
    FOREIGN KEY (OrdenadorID) REFERENCES Ordenadores(ID)
);

CREATE TABLE IF NOT EXISTS Pagos (
    ID INT AUTO_INCREMENT NOT NULL,
    Importe INT NOT NULL,
    FechaHora DATETIME NOT NULL,
    Titular VARCHAR(255) NOT NULL,
    NumeroTarjeta VARCHAR(16) NOT NULL,
    FechaCaducidad DATE NOT NULL,
    CVV VARCHAR(3),
    UsuarioID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

CREATE TABLE IF NOT EXISTS Formularios (
    ID INT AUTO_INCREMENT NOT NULL,
    Numero VARCHAR(5) NOT NULL,
    Clave VARCHAR(10) NOT NULL,
    UsuarioID INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID)
);

-- Uso exclusivo para el Procedimeinto Almacenado
CREATE TABLE IF NOT EXISTS ReservasHoy (
    ID INT AUTO_INCREMENT NOT NULL,
    NombreUsuario VARCHAR(50),
    ApellidosUsuario VARCHAR(50),
    EmailUsuario VARCHAR(100),
    NumeroTelefonoUsuario VARCHAR(15),
    PuestoOrdenador VARCHAR(4),
    TipoOrdenador VARCHAR(10),
    HoraInicioReserva TIME,
    HoraFinalReserva TIME,
    NumeroFormulario VARCHAR(5),
    ClaveFormulario VARCHAR(10),
    PRIMARY KEY (ID)
);

-- Crear al Usuario que hace de Conexion con el PHP
-- Asigna los permisos necesarios
-- Recarga los permisos
CREATE USER IF NOT EXISTS 'PuenteFormularioMySQL'@'%' IDENTIFIED BY '1234';
GRANT SELECT, INSERT ON cmnet.* TO 'PuenteFormularioMySQL'@'%';
FLUSH PRIVILEGES;

-- Crea el Procedimiento Almacenado
DELIMITER //
CREATE PROCEDURE CopiarDatosReservasHoy()
BEGIN
    DECLARE tomorrow DATE;
    SET tomorrow = CURDATE() + INTERVAL 1 DAY;

    -- Limpia la tabla ReservasHoy antes de la inserción
    TRUNCATE TABLE ReservasHoy;

    -- Inserta los datos combinados en ReservasHoy para la fecha de mañana
    INSERT INTO ReservasHoy (NombreUsuario, ApellidosUsuario, EmailUsuario, NumeroTelefonoUsuario, PuestoOrdenador, TipoOrdenador, HoraInicioReserva, HoraFinalReserva, NumeroFormulario, ClaveFormulario)
    SELECT 
        u.Nombre AS NombreUsuario, 
        u.Apellidos AS ApellidosUsuario, 
        u.Email AS EmailUsuario, 
        u.NumeroTelefono AS NumeroTelefonoUsuario, 
        o.Puesto AS PuestoOrdenador, 
        o.Tipo AS TipoOrdenador, 
        r.HoraInicio AS HoraInicioReserva, 
        r.HoraFinal AS HoraFinalReserva, 
        f.Numero AS NumeroFormulario, 
        f.Clave AS ClaveFormulario
    FROM Reservas r
    JOIN Usuarios u ON r.UsuarioID = u.ID
    JOIN Ordenadores o ON r.OrdenadorID = o.ID
    LEFT JOIN Formularios f ON r.UsuarioID = f.UsuarioID AND r.Fecha = tomorrow
    WHERE r.Fecha = tomorrow;
END//
DELIMITER ;

-- Habilita el Planificador de Eventos Globales
SET GLOBAL event_scheduler = ON;

-- Crea el Evento
DELIMITER //
CREATE EVENT IF NOT EXISTS CopiarDatosEvento
ON SCHEDULE EVERY 1 DAY STARTS CURRENT_DATE + INTERVAL 1 DAY
DO
BEGIN
    CALL CopiarDatosReservasHoy();
END//
DELIMITER ;

-- Datos de prueba
INSERT INTO Usuarios (Nombre, Apellidos, Email, NumeroTelefono) VALUES
('Juan', 'Pérez', 'juan@example.com', '555-1234'),
('María', 'García', 'maria@example.com', '555-5678'),
('Alejandro', 'Rodríguez', 'alejandro@example.com', '555-9101'),
('Laura', 'Martínez', 'laura@example.com', '555-2345'),
('Carlos', 'Sánchez', 'carlos@example.com', '555-6789');

INSERT INTO Ordenadores (Puesto, PrecioHora, Tipo) VALUES
('PC01', 20, 'Juegos'),
('PC05', 10, 'Oficina'),
('PC10', 20, 'Juegos'),
('PC20', 10, 'Oficina'),
('PC08', 20, 'Juegos');

INSERT INTO Reservas (Fecha, HoraInicio, HoraFinal, UsuarioID, OrdenadorID) VALUES
('2024-05-15', '09:00:00', '10:00:00', 1, 1),
('2024-05-16', '14:00:00', '15:00:00', 2, 2),
('2024-05-17', '10:00:00', '11:00:00', 3, 1),
('2024-05-18', '13:00:00', '14:00:00', 4, 2),
('2024-05-19', '11:00:00', '12:00:00', 5, 1);

INSERT INTO Pagos (Importe, FechaHora, Titular, NumeroTarjeta, FechaCaducidad, CVV, UsuarioID) VALUES
(20, '2024-05-15 10:30:00', 'Juan Pérez', '1234567890123', '2026-08-01', '123', 1),
(15, '2024-05-16 15:45:00', 'María García', '9876543210987', '2025-12-01', '456', 2),
(24, '2024-05-17 11:20:00', 'Alejandro Rodríguez', '4567890123456', '2027-03-01', '789', 3),
(30, '2024-05-18 14:55:00', 'Laura Martínez', '7890123456789', '2024-11-01', '135', 4),
(10, '2024-05-19 12:10:00', 'Carlos Sánchez', '2345678901234', '2026-02-01', '246', 5);

INSERT INTO Formularios (Numero, Clave, UsuarioID) VALUES
('AB123', 'WQJLPURZOT', 1),
('XY789', 'KGYHBNMCAW', 2),
('PQ456', 'VXNPOQZRSL', 3),
('RS987', 'JFWTKGSXED', 4),
('UV321', 'HRYFAJKLNP', 5);