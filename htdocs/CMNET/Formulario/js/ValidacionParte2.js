// ValidacionParte2.js
window.onload = function() {
    var form = document.querySelector('form');
    var continuarBtn = document.getElementById('BotonContinuar');

    // Validar que todos los campos obligatorios estén completos antes de enviar el formulario
    form.addEventListener('submit', function(event) {
        var nombre = document.getElementById('InputNombre').value.trim();
        var apellidos = document.getElementById('InputApellidos').value.trim();
        var email = document.getElementById('InputEmail').value.trim();
        var telefono = document.getElementById('InputNumeroTelefono').value.trim();

        if (!nombre || !apellidos || !email || !telefono) {
            event.preventDefault(); // Evitar envío del formulario
            alert('Por favor, complete todos los campos obligatorios.');
        } else if (!isValidName(nombre)) {
            event.preventDefault();
            alert('El nombre solo puede contener letras.');
        } else if (!isValidName(apellidos)) {
            event.preventDefault();
            alert('Los apellidos solo pueden contener letras.');
        } else if (!isValidEmail(email)) {
            event.preventDefault();
            alert('Por favor, ingrese un correo electrónico válido.');
        } else if (!isValidPhoneNumber(telefono)) {
            event.preventDefault();
            alert('Por favor, ingrese un número de teléfono válido.');
        }
    });

    // Validar que el nombre y apellidos solo contengan letras
    function isValidName(name) {
        return /^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/.test(name);
    }

    // Validar el formato del correo electrónico
    function isValidEmail(email) {
        return /\S+@\S+\.\S+/.test(email);
    }

    // Validar el formato del número de teléfono
    function isValidPhoneNumber(phoneNumber) {
        return /^\d{9}$/.test(phoneNumber);
    }
};