function generarCodigoNumero() {
    const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const numeros = '0123456789';
    let codigo = '';
    for (let i = 0; i < 2; i++) {
        codigo += letras.charAt(Math.floor(Math.random() * letras.length));
    }
    for (let i = 0; i < 3; i++) {
        codigo += numeros.charAt(Math.floor(Math.random() * numeros.length));
    }
    return codigo;
}

function generarCodigoClave() {
    const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let codigo = '';
    for (let i = 0; i < 10; i++) {
        codigo += letras.charAt(Math.floor(Math.random() * letras.length));
    }
    return codigo;
}

window.onload = function() {
    document.getElementById('InputNumero').value = generarCodigoNumero();
    document.getElementById('InputClave').value = generarCodigoClave();
}