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
}
?>

<?php
// Conexión a la base de datos
$servername = "CMNET-SP"; // Cambia esto por la dirección del servidor de tu base de datos si es diferente
$username = "PuenteFormularioMySQL";
$password = "1234";
$dbname = "cmnet";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores de los campos del formulario
$nombre = $_POST["Nombre"];
$apellidos = $_POST["Apellidos"];
$email = $_POST["Email"];
$numeroTelefono = $_POST["NumeroTelefono"];

$puesto = $_POST["Puesto"];
$precioHora = $_POST["PrecioHora"];
$tipo = $_POST["Tipo"];

$fecha = $_POST["Fecha"];
$horaInicio = $_POST["HoraInicio"];
$horaFinal = $_POST["HoraFinal"];

$importe = $_POST["Importe"];
$fechaHora = date("Y-m-d H:i:s"); // Obtener la fecha y hora actual en formato MySQL

$titular = $_POST["Titular"];
$numeroTarjeta = $_POST["NumeroTarjeta"];
$fechaCaducidad = $_POST["FechaCaducidad"];
$cvv = $_POST["CVV"];

// Inserción en la tabla Usuarios
$sql = "INSERT INTO Usuarios (Nombre, Apellidos, Email, NumeroTelefono) VALUES ('$nombre', '$apellidos', '$email', '$numeroTelefono')";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$usuarioID = $conn->insert_id; // Obtener el ID del usuario insertado

// Inserción en la tabla Ordenadores
$sql = "INSERT INTO Ordenadores (Puesto, PrecioHora, Tipo) VALUES ('$puesto', '$precioHora', '$tipo')";
if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$ordenadorID = $conn->insert_id; // Obtener el ID del ordenador insertado

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
            <h1 class="Activo">Resumen de la Reserva</h1>
        </nav>
        <div class="ResumenReserva">

            <div><h1>Su reserva se ha realizado correctamente</h1></div>
            <hr>
            <div>Guarde la siguiente informacion en un lugar seguro</div>
            <div><h2><?php echo "Codigo: " . $numero ?></h2></div>
            <div><h2><?php echo "Clave: " . $clave ?></h2></div>
            <div><h3><?php echo "Dia de la reserva: " . $fecha . ". Desde las " . $horaInicio . " hasta las " . $horaFinal ?></h3></div>
        </div>

        <div class="ContenedorBotones">
            <button type="button" id="VolverPaginaPrincipal"><a href="..\ldap_test\main.html">Volver a la pagina principal</a></button>
        </div>
    </div>
</body>
</html>