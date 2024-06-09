<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="main.css">
    <script src="js/ValidacionParte1.js"></script>
    <script src="js/ValidacionParte2.js"></script>
    <script src="js/ValidacionParte3.js"></script>
</head>
<body>
    <form action="reserva-realizada.php" method="post" target="_blank">
        <div id="Parte1" style="display: block;">
            <div style="display: none;">
                <label for="Numero">Numero: </label><span id="SpanNumero"></span><input type="hidden" name="Numero">
                <label for="Clave">Clave: </label><span id="SpanClave"></span><input type="hidden" name="Clave">
            </div>

            <nav>
                <h1 class="Activo">Selección de Puesto</h1>
                <h1 class="">Datos del Usuario</h1>
                <h1 class="">Proceso de Pago</h1>
                <h1 class="">Resumen de la Reserva</h1>
            </nav>
            <div class="ContenedorPuesto">
                <div class="Fila">
                    <div><input type="radio" name="Puesto" id="InputRadio1" value="PC01" data-Equipo="1" data-Tipo="Juegos" data-PrecioHora="20" required><label for="InputRadio1">1</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio2" value="PC02" data-Equipo="2" data-Tipo="Estandar" data-PrecioHora="10" required><label for="InputRadio2">2</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio3" value="PC03" data-Equipo="3" data-Tipo="Juegos" data-PrecioHora="20" required><label for="InputRadio3">3</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio4" value="PC04" data-Equipo="4" data-Tipo="Estandar" data-PrecioHora="10" required><label for="InputRadio4">4</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio5" value="PC05" data-Equipo="5" data-Tipo="Juegos" data-PrecioHora="20" required><label for="InputRadio5">5</label></div>
                </div>
                <div class="Fila">
                    <div><input type="radio" name="Puesto" id="InputRadio6" value="PC06" data-Equipo="6" data-Tipo="Estandar" data-PrecioHora="10" required><label for="InputRadio6">6</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio7" value="PC07" data-Equipo="7" data-Tipo="Juegos" data-PrecioHora="20" required><label for="InputRadio7">7</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio8" value="PC08" data-Equipo="8" data-Tipo="Estandar" data-PrecioHora="10" required><label for="InputRadio8">8</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio9" value="PC09" data-Equipo="9" data-Tipo="Juegos" data-PrecioHora="20" required><label for="InputRadio9">9</label></div>
                    <div><input type="radio" name="Puesto" id="InputRadio10" value="PC10" data-Equipo="10" data-Tipo="Estandar" data-PrecioHora="10" required><label for="InputRadio10">10</label></div>
                </div>
            </div>
            <div class="ContenedorFormulario">
                <div class="Columna">
                    <div><label for="Equipo">Equipo: </label><span id="SpanEquipo"></span><input type="hidden" name="Equipo"></div>
                    <div><label for="Tipo">Tipo: </label><span id="SpanTipo"></span><input type="hidden" name="Tipo"></div>
                    <div><label for="PrecioHora">Cuota: </label><span id="SpanPrecioHora"></span><input type="hidden" name="PrecioHora"></div>
                </div>
                <hr>
                <div class="Columna">
                    <div><label for="Fecha">Fecha: </label><input type="date" name="Fecha" id="InputFecha" min="2024-01-01" max="2024-12-31" required></div>
                    <div><label for="HoraInicio">Hora de inicio: </label><input type="time" name="HoraInicio" id="InputHoraInicio" step="3600" min="01:00" max="23:00" required></div>
                    <div><label for="HoraFinal">Hora de finalizacion: </label><input type="time" name="HoraFinal" id="InputHoraFinal" step="3600" min="01:00" max="23:00" required></div>
                </div>
            </div>
        </div>

        <div id="Parte2" style="display: none;">
            <nav>
                <h1 class="">Selección de Puesto</h1>
                <h1 class="Activo">Datos del Usuario</h1>
                <h1 class="">Proceso de Pago</h1>
                <h1 class="">Resumen de la Reserva</h1>
            </nav>
            <div class="FormularioUsuario">
                <div><label for="Nombre">Nombre: </label><input type="text" name="Nombre" id="InputNombre" placeholder="Juan" maxlength="50" required></div>
                <div><label for="Apellidos">Apellidos: </label><input type="text" name="Apellidos" id="InputApellidos" placeholder="Perez Garcia" maxlength="50" required></div>
                <div><label for="Email">Correo electronico: </label><input type="email" name="Email" id="InputEmail" placeholder="ejemplo@dominio.com" maxlength="100" required></div>
                <div><label for="NumeroTelefono">Numero de telefono: </label><input type="tel" name="NumeroTelefono" id="InputNumeroTelefono" placeholder="123456789" maxlength="9" required></div>
            </div>
        </div>

        <div id="Parte3" style="display: none;">
            <nav>
                <h1 class="">Selección de Puesto</h1>
                <h1 class="">Datos del Usuario</h1>
                <h1 class="Activo">Proceso de Pago</h1>
                <h1 class="">Resumen de la Reserva</h1>
            </nav>
            <div class="FormularioPago">
                <div><label for="Importe">Importe: </label><span id="SpanImporte"></span><input type="hidden" name="Importe"></div>
                <hr>
                <div><label for="FechaHora"></label><input type="hidden" name="FechaHora"></div>
                <div><label for="Titular">Titular: </label><input type="text" name="Titular" id="InputTitular" placeholder="Nombre del titular" maxlength="100" required></div>
                <div><label for="NumeroTarjeta">Numero de tarjeta: </label><input type="tel" name="NumeroTarjeta" id="InputNumeroTarjeta" placeholder="1234123412341234" maxlength="16" required></div>
                <div><label for="FechaCaducidad">Fecha de caducidad: </label><input type="date" name="FechaCaducidad" id="InputFechaCaducidad" pattern="....-..-01" min="2024-01-01" max="9999-12-01" required></div>
                <div><label for="CVV">CVV: </label><input type="tel" name="CVV" id="InputCVV" placeholder="123" maxlength="3" required></div>
            </div>
        </div>

        <div class="ContenedorBotones">
            <button type="button" id="BotonRetroceder" disabled>Retroceder</button>
            <button type="submit" id="BotonEnviar" disabled>Realizar reserva</button>
            <button type="button" id="BotonContinuar">Continuar</button>
        </div>
    </form>
    <script src="js/ActualizarSpan.js"></script>
    <script src="js/FechaMinimaDiaSiguiente.js"></script>
    <script src="js/FuncionBotones.js"></script>
    <script src="js/CalcularImporte.js"></script>
    <script src="js/GenerarClave_Numero.js"></script>
    <script src="js/FormularioRecogidaDatosSpan.js"></script>
    <script src="js/FechaCaducidad01.js"></script>
</body>
</html>