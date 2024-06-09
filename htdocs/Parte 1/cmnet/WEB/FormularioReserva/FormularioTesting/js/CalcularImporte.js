// CalcularImporte.js
function calcularImporte() {
    // Obtener el puesto seleccionado
    const puestoSeleccionado = document.querySelector('input[name="Puesto"]:checked');

    if (!puestoSeleccionado) {
        document.getElementById('SpanImporte').textContent = 'Seleccione un puesto';
        return;
    }

    const precioHora = parseFloat(puestoSeleccionado.getAttribute('data-PrecioHora'));
    
    const horaInicio = document.getElementById('InputHoraInicio').value;
    const horaFinal = document.getElementById('InputHoraFinal').value;

    if (!horaInicio || !horaFinal) {
        document.getElementById('SpanImporte').textContent = 'Seleccione las horas';
        return;
    }

    const horaInicioDate = new Date(`01/01/2024 ${horaInicio}`);
    const horaFinalDate = new Date(`01/01/2024 ${horaFinal}`);

    const tiempoEnHoras = (horaFinalDate - horaInicioDate) / 1000 / 3600;

    if (tiempoEnHoras <= 0) {
        document.getElementById('SpanImporte').textContent = 'Horas no válidas';
        return;
    }

    const importe = precioHora * tiempoEnHoras;

    document.getElementById('SpanImporte').textContent = importe.toFixed(2) + ' €';
    document.querySelector('input[name="Importe"]').value = importe.toFixed(2);
}

document.getElementById('InputHoraInicio').addEventListener('change', calcularImporte);
document.getElementById('InputHoraFinal').addEventListener('change', calcularImporte);

const puestos = document.querySelectorAll('input[name="Puesto"]');
puestos.forEach(puesto => puesto.addEventListener('change', calcularImporte));