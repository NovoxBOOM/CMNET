<?php
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

    // Conexión a la base de datos
    $servername = "localhost";
    $username = "Conexion";
    $password = "123456";
    $dbname = "cmnet";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Inserción en la tabla Usuarios
    $sql = "INSERT INTO Usuarios (Nombre, Apellidos, Email, NumeroTelefono) VALUES ('$nombre', '$apellidos', '$email', '$numeroTelefono')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $usuarioID = $conn->insert_id;

    // Inserción en la tabla Ordenadores
    $sql = "INSERT INTO Ordenadores (Puesto, PrecioHora, Tipo) VALUES ('$puesto', '$precioHora', '$tipo')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $ordenadorID = $conn->insert_id;

    // Inserción en la tabla Reservas
    $sql = "INSERT INTO Reservas (Fecha, HoraInicio, HoraFinal, UsuarioID, OrdenadorID) VALUES ('$fecha', '$horaInicio', '$horaFinal', '$usuarioID', '$ordenadorID')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Inserción en la tabla Pagos
    $sql = "INSERT INTO Pagos (Importe, FechaHora, Titular, NumeroTarjeta, FechaCaducidad, CVV, UsuarioID) VALUES ('$importe', '$fechaHora', '$titular', '$numeroTarjeta', '$fechaCaducidad', '$cvv', '$usuarioID')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Inserción en la tabla Formularios
    $sql = "INSERT INTO Formularios (Numero, Clave, UsuarioID) VALUES ('$numero', '$clave', '$usuarioID')";
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();

    // Datos del servidor remoto
    $remoteServer = "PC01";
    $remoteUsername = "aAdministrador"; // Cambia esto por el nombre de usuario con privilegios en el servidor
    $remotePassword = "Berny123"; // Cambia esto por la contraseña del usuario
    $scriptPath = "C:\\Script Powershell\\create_user.ps1";

    // Comando PowerShell remoto para crear el usuario en AD
    $psCommand = "Enter-PSSession -ComputerName $remoteServer -Credential (New-Object System.Management.Automation.PSCredential('$remoteUsername', (ConvertTo-SecureString '$remotePassword' -AsPlainText -Force))); "
    . "powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\" -givenname \"$nombre\" -surname \"$apellidos\" -email \"$email\" -phone \"$numeroTelefono\"; "
    . "Exit-PSSession";

    // Ejecutar el comando PowerShell
    $output = shell_exec("powershell.exe -Command \"$psCommand\"");

    // Mostrar el resultado de la ejecución del script PowerShell
    echo "<pre>$output</pre>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="Parte4" style="display: block;">
        <nav>
            <h1 class="">Selección de Puesto</h1>
            <h1 class="">Datos del Usuario</h1>
            <h1 class="">Proceso de Pago</h1>
            <h1 class="Activo
