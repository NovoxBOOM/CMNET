// ValidacionParte3.js
window.onload = function() {
    var form = document.querySelector('form');
    var fechaCaducidadInput = document.getElementById('InputFechaCaducidad');

    // Cambiar automáticamente el día a "01" en el campo de FechaCaducidad
    fechaCaducidadInput.addEventListener('change', function() {
        var fechaCaducidad = fechaCaducidadInput.value;
        var partesFecha = fechaCaducidad.split('-');
        partesFecha[2] = '01'; // Cambiar el día a "01"
        fechaCaducidadInput.value = partesFecha.join('-');
    });

    // Validar que todos los campos obligatorios estén completos antes de enviar el formulario
    form.addEventListener('submit', function(event) {
        var titular = document.getElementById('InputTitular').value.trim();
        var numeroTarjeta = document.getElementById('InputNumeroTarjeta').value.trim();
        var cvv = document.getElementById('InputCVV').value.trim();

        if (!titular || !numeroTarjeta || !cvv) {
            event.preventDefault(); // Evitar envío del formulario
            alert('Por favor, complete todos los campos obligatorios.');
        } else if (!isValidName(titular)) {
            event.preventDefault();
            alert('El titular de la tarjeta solo puede contener letras.');
        } else if (!isValidCardNumber(numeroTarjeta)) {
            event.preventDefault();
            alert('Por favor, ingrese un número de tarjeta válido.');
        } else if (!isValidCVV(cvv)) {
            event.preventDefault();
            alert('Por favor, ingrese un CVV válido.');
        }
    });

    // Validar que el titular de la tarjeta solo contenga letras
    function isValidName(name) {
        return /^[a-zA-Z\s]+$/.test(name);
    }

    // Validar el formato del número de tarjeta
    function isValidCardNumber(cardNumber) {
        return /^\d{16}$/.test(cardNumber);
    }

    // Validar el formato del CVV
    function isValidCVV(cvv) {
        return /^\d{3}$/.test(cvv);
    }
};