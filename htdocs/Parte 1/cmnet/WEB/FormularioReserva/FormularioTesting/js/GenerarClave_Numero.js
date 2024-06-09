// generarClaveNumero.js
// Función para generar un número aleatorio
function generarNumero() {
    // Generar dos letras aleatorias
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var letra1 = letras.charAt(Math.floor(Math.random() * letras.length));
    var letra2 = letras.charAt(Math.floor(Math.random() * letras.length));

    // Generar tres números aleatorios
    var numeros = '';
    for (var i = 0; i < 3; i++) {
        numeros += Math.floor(Math.random() * 10);
    }

    // Combinar letras y números para formar el número
    var numero = letra1 + letra2 + numeros;

    return numero;
}

// Función para generar una clave aleatoria
function generarClave() {
    // Generar 10 letras aleatorias
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var clave = '';
    for (var i = 0; i < 10; i++) {
        clave += letras.charAt(Math.floor(Math.random() * letras.length));
    }

    return clave;
}

// Función para asignar valores a los campos ocultos "Numero" y "Clave"
function asignarNumeroYClave() {
    // Generar número y clave al cargar la página
    var numeroGenerado = generarNumero();
    var claveGenerada = generarClave();
    
    // Mostrar el número y la clave en los elementos span
    document.getElementById('SpanNumero').textContent = numeroGenerado;
    document.getElementById('SpanClave').textContent = claveGenerada;

    // Asignar los valores al campo oculto "Numero" y "Clave"
    document.querySelector('input[name="Numero"]').value = numeroGenerado;
    document.querySelector('input[name="Clave"]').value = claveGenerada;
}

// Llamar a la función al cargar la página
window.onload = asignarNumeroYClave;

window.onload = function() {
    // Generar número y clave al cargar la página
    var numeroGenerado = generarNumero();
    var claveGenerada = generarClave();
    
    // Mostrar el número y la clave en los elementos span
    document.getElementById('SpanNumero').textContent = numeroGenerado;
    document.getElementById('SpanClave').textContent = claveGenerada;

    // Asignar los valores al campo oculto "Numero" y "Clave"
    document.querySelector('input[name="Numero"]').value = numeroGenerado;
    document.querySelector('input[name="Clave"]').value = claveGenerada;

    // Obtener la fecha y hora actual
    var fechaActual = new Date();
    var fechaHoraActual = fechaActual.toISOString().slice(0,16).replace("T", " ");

    // Asignar la fecha y hora actual al campo oculto "FechaHora"
    document.querySelector('input[name="FechaHora"]').value = fechaHoraActual;
};