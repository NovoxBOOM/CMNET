// FormularioRecogidaDatosSpan.js
// Get all radio inputs for workstations
const radioInputs = document.querySelectorAll('input[type="radio"][name="Puesto"]');

// Add event listener to each radio input
radioInputs.forEach(input => {
    input.addEventListener('change', function() {
        // Retrieve data attributes
        const equipo = input.getAttribute('data-Equipo');
        const tipo = input.getAttribute('data-Tipo');
        const precioHora = input.getAttribute('data-PrecioHora');

        // Update hidden input fields with the retrieved values
        document.querySelector('input[name="Equipo"]').value = equipo;
        document.querySelector('input[name="Tipo"]').value = tipo;
        document.querySelector('input[name="PrecioHora"]').value = precioHora;
    });
});