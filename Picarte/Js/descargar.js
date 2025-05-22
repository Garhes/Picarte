document.getElementById('descargarMenuBtn').onclick = function() {
    const confirmado = confirm('El archivo pesa aproximadamente 450 MB. ¿Deseas continuar con la descarga?');
    if (confirmado) {
        // Crea un enlace temporal para descargar el PDF
        const link = document.createElement('a');
        link.href = '../Img/pdf/Picarte';
        link.download = 'Menu Picarte.pdf';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
};