document.getElementById('InputFechaCaducidad').addEventListener('input', function() {
    var fechaCaducidad = new Date(this.value);
    var dia = ("0" + 1).slice(-2); // Establecer siempre el día como 01
    var mes = ("0" + (fechaCaducidad.getMonth() + 1)).slice(-2); // Obtener el mes con formato de dos dígitos
    var anio = fechaCaducidad.getFullYear();
    this.value = anio + "-" + mes + "-01"; // Establecer el día como 01 y mantener el mes y año seleccionados
});