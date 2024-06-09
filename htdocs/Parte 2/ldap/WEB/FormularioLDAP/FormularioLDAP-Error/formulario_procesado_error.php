<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<!--

Error willing 

Warning: ldap_modify(): Modify: Server is unwilling to perform in C:\xampp\htdocs\ldap\formulario_procesado.php on line 278
Error al modificar el usuario: Server is unwilling to perform

-->
<?php
// Valores recibidos del formulario
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

// Detalles de la conexión LDAP
$servidorLDAP = "ldap://CMNET-SP"; // Por ejemplo, "ldap.example.com"
$puertoLDAP = 50000; // Puerto por defecto
$usuarioLDAP = "CN=Administrador,CN=Users,DC=cmnet,DC=local";
$contrasenaLDAP = "Windows2024";

// Establecer conexión LDAP
$ldapconn = ldap_connect($servidorLDAP, $puertoLDAP)
    or die("No se pudo conectar con el servidor LDAP.");

// Configurar el protocolo LDAP a la versión 3
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

// Autenticación
$ldapbind = ldap_bind($ldapconn, $usuarioLDAP, $contrasenaLDAP)
    or die("No se pudo autenticar en el servidor LDAP.");

// Construir DN del usuario a modificar
$dn = "CN=$puesto,OU=Usuarios,OU=CMNET,DC=cmnet,DC=local";

echo "Valor de \$dn: $dn <br>"; // Comprobar el valor de la variable $dn

// Atributos a modificar
$info["givenName"] = $nombre;
$info["sn"] = $apellidos;
$info["displayName"] = $nombre . ".(" . $numero . ")";
$info["description"] = $descripcion;
$info["telephoneNumber"] = $numeroTelefono;
$info["mail"] = $correoElectronico;
$info["userPassword"] = $clave;
$info["logonHours"] = $horaFinal; // Considera ajustar el formato según sea necesario

// Modificar el usuario
$mod = ldap_modify($ldapconn, $dn, $info);

if ($mod) {
    echo "Usuario modificado correctamente.";
} else {
    echo "Error al modificar el usuario: " . ldap_error($ldapconn);
}

// Cerrar conexión LDAP
ldap_close($ldapconn);
?>



<!--

Error willing con codificacion de la contraseña

Warning: ldap_modify(): Modify: Server is unwilling to perform in C:\xampp\htdocs\ldap\formulario_procesado.php on line 278
Error al modificar el usuario: Server is unwilling to perform

-->
<?php
// // Valores recibidos del formulario
// $numero = $_POST["Numero"];
// $clave = $_POST["Clave"];
// $puesto = $_POST["Puesto"];
// $horaInicio = $_POST["HoraInicio"];
// $horaFinal = $_POST["HoraFinal"];
// $nombre = $_POST["Nombre"];
// $apellidos = $_POST["Apellidos"];
// $descripcion = $_POST["Descripcion"];
// $numeroTelefono = $_POST["NumeroTelefono"];
// $correoElectronico = $_POST["CorreoElectronico"];

// // Detalles de la conexión LDAP
// $servidorLDAP = "ldap://CMNET-SP"; // Por ejemplo, "ldap.example.com"
// $puertoLDAP = 50000; // Puerto por defecto
// $usuarioLDAP = "CN=Administrador,CN=Users,DC=cmnet,DC=local";
// $contrasenaLDAP = "Windows2024";

// // Establecer conexión LDAP
// $ldapconn = ldap_connect($servidorLDAP, $puertoLDAP);
// if (!$ldapconn) {
//     die("No se pudo conectar con el servidor LDAP.");
// }

// // Configurar el protocolo LDAP a la versión 3
// ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

// // Autenticación
// $ldapbind = ldap_bind($ldapconn, $usuarioLDAP, $contrasenaLDAP);
// if (!$ldapbind) {
//     die("No se pudo autenticar en el servidor LDAP.");
// }

// // Construir DN del usuario a modificar
// $dn = "CN=$puesto,OU=Usuarios,OU=CMNET,DC=cmnet,DC=local";

// echo "Valor de \$dn: $dn <br>"; // Comprobar el valor de la variable $dn

// // Atributos a modificar
// $info = array();
// $info["givenName"] = $nombre;
// $info["sn"] = $apellidos;
// $info["displayName"] = $nombre . ".(" . $numero . ")";
// $info["description"] = $descripcion;
// $info["telephoneNumber"] = $numeroTelefono;
// $info["mail"] = $correoElectronico;
// $info["unicodePwd"] = mb_convert_encoding("\"$clave\"", 'UTF-16LE');

// // Convertir $horaInicio y $horaFinal a formato binario para logonHours
// $logonHours = array_fill(0, 21, 0x00); // Crear matriz de 21 bytes (168 bits)

// list($horaInicioHora, $horaInicioMinuto) = explode(':', $horaInicio);
// list($horaFinalHora, $horaFinalMinuto) = explode(':', $horaFinal);

// $horaInicioPos = (int)$horaInicioHora;
// $horaFinalPos = (int)$horaFinalHora;

// // Establecer bits en 1 para las horas permitidas
// for ($i = 0; $i < 7; $i++) { // Para cada día de la semana
//     for ($j = $horaInicioPos; $j <= $horaFinalPos; $j++) {
//         $byteIndex = (int)(($i * 24 + $j) / 8);
//         $bitIndex = ($i * 24 + $j) % 8;
//         $logonHours[$byteIndex] |= (1 << (7 - $bitIndex));
//     }
// }

// $info["logonHours"] = implode(array_map("chr", $logonHours));

// // Modificar el usuario
// $mod = ldap_modify($ldapconn, $dn, $info);

// if ($mod) {
//     echo "Usuario modificado correctamente.";
// } else {
//     echo "Error al modificar el usuario: " . ldap_error($ldapconn);
// }

// // Cerrar conexión LDAP
// ldap_close($ldapconn);
?>



</body>
</html>
