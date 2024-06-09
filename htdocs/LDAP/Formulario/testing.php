<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing-main.php</title>
    <style>
        body {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
<?php
// Comprobamos si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los datos del formulario
    $numero = $_POST["Numero"];
    $clave = $_POST["Clave"];
    $puesto = $_POST["Puesto"];
    $horaInicio = $_POST["HoraInicio"];
    $horaFinal = $_POST["HoraFinal"];
    $nombre = $_POST["Nombre"];
    $apellidos = $_POST["Apellidos"];
    $descripcion = $_POST["Descripcion"];
    $numeroTelefono = $_POST["NumeroTelefono"];
    $correoElectronico = $_POST["CorreoElectronico"];

    // Mostramos los datos por pantalla
    echo "<p><strong>Numero:</strong> $numero</p>";
    echo "<p><strong>Clave:</strong> $clave</p>";
    echo "<p><strong>Puesto seleccionado:</strong> $puesto</p>";
    echo "<p><strong>Hora inicio:</strong> $horaInicio</p>";
    echo "<p><strong>Hora final:</strong> $horaFinal</p>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Apellidos:</strong> $apellidos</p>";
    echo "<p><strong>Descripción:</strong> $descripcion</p>";
    echo "<p><strong>Número de teléfono:</strong> $numeroTelefono</p>";
    echo "<p><strong>Correo electrónico:</strong> $correoElectronico</p>";
} else {
    // Si no se enviaron los datos del formulario, mostramos un mensaje de error
    echo "<p>No se han recibido datos del formulario.</p>";
}
?>
</body>
</html>
