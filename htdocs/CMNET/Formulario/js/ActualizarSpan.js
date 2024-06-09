// ActualizarSpan.js
// Obtener referencias a los elementos relevantes
const spanEquipo = document.getElementById("SpanEquipo");
const spanTipo = document.getElementById("SpanTipo");
const spanPrecioHora = document.getElementById("SpanPrecioHora");

// Obtener referencias a los inputs de radio
const radioButtons = document.querySelectorAll('input[type="radio"]');

// Función para actualizar los valores de los span
function actualizarValores() {
    // Buscar el input de radio seleccionado
    const radioButtonSeleccionado = document.querySelector('input[type="radio"]:checked');
    if (radioButtonSeleccionado) {
        // Obtener los valores de data-Equipo, data-Tipo y data-PrecioHora
        const equipo = radioButtonSeleccionado.getAttribute("data-Equipo");
        const tipo = radioButtonSeleccionado.getAttribute("data-Tipo");
        const precioHora = radioButtonSeleccionado.getAttribute("data-PrecioHora");

        // Actualizar los valores de los span con los valores obtenidos
        spanEquipo.textContent = `PC ${equipo}`;
        spanTipo.textContent = tipo;
        spanPrecioHora.textContent = `${precioHora} €/h`;
    } else {
        // Si no hay ningún radio button seleccionado, establecer los span en blanco
        spanEquipo.textContent = "";
        spanTipo.textContent = "";
        spanPrecioHora.textContent = "";
    }
}

// Evento change para los radio buttons
radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener("change", actualizarValores);
});

// Llamar a la función para actualizar los valores inicialmente
actualizarValores();
