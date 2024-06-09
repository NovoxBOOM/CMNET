<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <div class="Contenedor">
        <div class="Header"><h1>Formulario de LDAP</h1></div>
        <form action="formulario_procesado_error.php" method="post" class="Contenido" target="_blank">
            <h2>Rellena el siguiente formulario:</h2>
            <div><label for="Numero">Numero: </label><br><input type="text" name="Numero" id="InputNumero" required></div>
            <div><label for="Clave">Contraseña: </label><br><input type="text" name="Clave" id="InputClave" required></div>

            <div>
                <label for="Puesto">Puesto seleccionado:</label><br>
                <select name="Puesto" id="InputPuesto" required>
                    <option value="PC01">PC01</option>
                    <option value="PC02">PC02</option>
                    <option value="PC03">PC03</option>
                    <option value="PC04">PC04</option>
                    <option value="PC05">PC05</option>
                    <option value="PC06">PC06</option>
                    <option value="PC07">PC07</option>
                    <option value="PC08">PC08</option>
                    <option value="PC09">PC09</option>
                    <option value="PC10">PC10</option>
                </select>
            </div>

            <div><label for="HoraInicio">Hora inicio:</label><br><input type="time" name="HoraInicio" id="InputHoraInicio" step="3600" min="00:00" required></div>
            <div><label for="HoraFinal">Hora final:</label><br><input type="time" name="HoraFinal" id="InputHoraFinal" step="3600" max="23:00" required></div>

            <div class="LineaDivisoria"><hr></div>

            <div><label for="Nombre">Nombre: </label><br><input type="text" name="Nombre" id="InputNombre" required></div>
            <div><label for="Apellidos">Apellidos: </label><br><input type="text" name="Apellidos" id="Apellidos" required></div>
            <div><label for="Descripcion">Descripcion: </label><br><input type="text" name="Descripcion" id="InputDescripcion" required></div>
            <div><label for="NumeroTelefono">Numero de telefono : </label><br><input type="tel" name="NumeroTelefono" id="inputNumeroTelefono" required></div>
            <div><label for="CorreoElectronico">Correo Electronico: </label><br><input type="text" name="CorreoElectronico" id="InputCorreoElectronico" required></div>
            <button type="submit">Procesar cambios</button>
        </form>
    </div>
</body>
</html>