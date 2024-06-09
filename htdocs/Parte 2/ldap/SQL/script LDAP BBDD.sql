CREATE DATABASE ldap;

USE ldap;

CREATE TABLE FormularioLDAP (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Numero VARCHAR(50) NOT NULL,
    Clave VARCHAR(50) NOT NULL,
    Puesto VARCHAR(10) NOT NULL,
    HoraInicio TIME NOT NULL,
    HoraFinal TIME NOT NULL,
    Nombre VARCHAR(100) NOT NULL,
    Apellidos VARCHAR(100) NOT NULL,
    Descripcion TEXT NOT NULL,
    NumeroTelefono VARCHAR(20) NOT NULL,
    CorreoElectronico VARCHAR(100) NOT NULL
);

CREATE USER IF NOT EXISTS 'PuenteFormularioMySQL'@'%' IDENTIFIED BY '1234';
GRANT SELECT, INSERT ON ldap.* TO 'PuenteFormularioMySQL'@'%';
FLUSH PRIVILEGES;