// FechaMinimaDiaSiguiente.js
document.addEventListener("DOMContentLoaded", function() {
    const inputFecha = document.getElementById('InputFecha');
    const fechaActual = new Date();
    fechaActual.setDate(fechaActual.getDate() + 1); // Sumar 1 día

    const dia = fechaActual.getDate();
    const mes = fechaActual.getMonth() + 1;
    const año = fechaActual.getFullYear();

    const fechaMinima = año + '-' + (mes < 10 ? '0' : '') + mes + '-' + (dia < 10 ? '0' : '') + dia;
    
    inputFecha.setAttribute('min', fechaMinima);
});