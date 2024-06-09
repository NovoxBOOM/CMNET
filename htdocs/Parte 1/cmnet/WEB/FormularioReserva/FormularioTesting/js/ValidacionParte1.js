// ValidacionParte1.js
window.onload = function() {
    var form = document.querySelector('form');
    var radios = document.querySelectorAll('input[type="radio"]');
    var continuarBtn = document.getElementById('BotonContinuar');
    var retrocederBtn = document.getElementById('BotonRetroceder');

    // Habilitar botón de continuar solo si se selecciona un puesto
    radios.forEach(function(radio) {
        radio.addEventListener('change', function() {
            continuarBtn.disabled = false;
            actualizarValoresPuestoSeleccionado();
        });
    });

    // Validar que todos los campos obligatorios estén completos antes de enviar el formulario
    form.addEventListener('submit', function(event) {
        var nombre = document.getElementById('InputNombre').value;
        var apellidos = document.getElementById('InputApellidos').value;
        var email = document.getElementById('InputEmail').value;
        var telefono = document.getElementById('InputNumeroTelefono').value;
        var fecha = document.getElementById('InputFecha').value;
        var horaInicio = document.getElementById('InputHoraInicio').value;
        var horaFinal = document.getElementById('InputHoraFinal').value;

        if (!nombre || !apellidos || !email || !telefono || !fecha || !horaInicio || !horaFinal) {
            event.preventDefault(); // Evitar envío del formulario
            alert('Por favor, complete todos los campos obligatorios.');
        }
    });

    // Actualizar los valores de Equipo, Tipo y Precio por hora cuando se seleccione un puesto
    function actualizarValoresPuestoSeleccionado() {
        var puestoSeleccionado = document.querySelector('input[name="Puesto"]:checked');

        if (puestoSeleccionado) {
            var equipo = puestoSeleccionado.getAttribute("data-Equipo");
            var tipo = puestoSeleccionado.getAttribute("data-Tipo");
            var precioHora = puestoSeleccionado.getAttribute("data-PrecioHora");

            document.querySelector('input[name="Equipo"]').value = equipo;
            document.querySelector('input[name="Tipo"]').value = tipo;
            document.querySelector('input[name="PrecioHora"]').value = precioHora;
        }
    }

    // Llamar a la función para actualizar los valores inicialmente
    actualizarValoresPuestoSeleccionado();
};