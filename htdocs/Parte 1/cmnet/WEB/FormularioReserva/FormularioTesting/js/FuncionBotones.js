// FuncionBotones.js
document.addEventListener("DOMContentLoaded", function() {
    const partes = document.querySelectorAll('[id^="Parte"]');
    const botones = {
        retroceder: document.getElementById('BotonRetroceder'),
        enviar: document.getElementById('BotonEnviar'),
        continuar: document.getElementById('BotonContinuar')
    };

    let pasoActual = 0;

    function actualizarBotones() {
        botones.retroceder.disabled = pasoActual === 0;
        botones.continuar.disabled = pasoActual === partes.length - 1;
        botones.enviar.disabled = pasoActual !== partes.length - 1;
    }

    function mostrarParte(paso) {
        partes.forEach((parte, index) => {
            parte.style.display = index === paso ? 'block' : 'none';
        });
    }

    actualizarBotones();

    botones.continuar.addEventListener('click', function() {
        pasoActual++;
        mostrarParte(pasoActual);
        actualizarBotones();
    });

    botones.retroceder.addEventListener('click', function() {
        pasoActual--;
        mostrarParte(pasoActual);
        actualizarBotones();
    });
});