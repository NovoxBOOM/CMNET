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
    // Verificar si se recibieron datos del formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los valores de los campos del formulario
        $numero = $_POST["Numero"];
        $clave = $_POST["Clave"];
        $puesto = $_POST["Puesto"];
        $equipo = $_POST["Equipo"];
        $tipo = $_POST["Tipo"];
        $precioHora = $_POST["PrecioHora"];
        $fecha = $_POST["Fecha"];
        $horaInicio = $_POST["HoraInicio"];
        $horaFinal = $_POST["HoraFinal"];
        $nombre = $_POST["Nombre"];
        $apellidos = $_POST["Apellidos"];
        $email = $_POST["Email"];
        $numeroTelefono = $_POST["NumeroTelefono"];
        $importe = $_POST["Importe"];
        $fechaHora = $_POST["FechaHora"];
        $titular = $_POST["Titular"];
        $numeroTarjeta = $_POST["NumeroTarjeta"];
        $fechaCaducidad = $_POST["FechaCaducidad"];
        $cvv = $_POST["CVV"];

        // Mostrar los datos recibidos
        echo "<h2>Datos recibidos:</h2>";
        echo "<p>Número: $numero</p>";
        echo "<p>Clave: $clave</p>";
        echo "<p>Puesto: $puesto</p>";
        echo "<p>Equipo: $equipo</p>";
        echo "<p>Tipo: $tipo</p>";
        echo "<p>Precio por hora: $precioHora</p>";
        echo "<p>Fecha: $fecha</p>";
        echo "<p>Hora de inicio: $horaInicio</p>";
        echo "<p>Hora final: $horaFinal</p>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Apellidos: $apellidos</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Número de teléfono: $numeroTelefono</p>";
        echo "<p>Importe: $importe</p>";
        echo "<p>Fecha y hora: $fechaHora</p>";
        echo "<p>Titular: $titular</p>";
        echo "<p>Número de tarjeta: $numeroTarjeta</p>";
        echo "<p>Fecha de caducidad: $fechaCaducidad</p>";
        echo "<p>CVV: $cvv</p>";
    } else {
        // Si no se recibieron datos del formulario, mostrar un mensaje de error
        echo "<p>No se han recibido datos del formulario.</p>";
    }
    ?>
</body>
</html>