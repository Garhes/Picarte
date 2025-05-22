function redirigirPago(metodo) {
    let urls = {
        'pse': 'https://www.pse.com.co',
        'nequi': 'https://www.nequi.com.co',
        'daviplata': 'https://www.daviplata.com',
        'paypal': 'https://www.paypal.com',
        'tarjeta': 'https://www.visa.com' // Cambia por una pasarela real
    };
    window.open(urls[metodo], '_blank');
}
