// Captura el evento de envío del formulario
document.getElementById('usuario').addEventListener('submit', function (event) {
    // Evita que la página se recargue al enviar el formulario
    event.preventDefault();

    // Oculta el formulario
    document.getElementById('usuario').style.display = 'none';

    // Muestra el mensaje de agradecimiento
    document.getElementById('thankYouMessage').style.display = 'block';
});