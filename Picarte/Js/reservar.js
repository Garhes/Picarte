document.getElementById('btn-reservar').onclick = function() {
    document.getElementById('mapaMesas').style.display = 'block';
};

// Cuando se selecciona una mesa, muestra el formulario y oculta el mapa
document.querySelectorAll('.mesa-btn').forEach(btn => {
    btn.onclick = function() {
        document.getElementById('mesa').value = this.dataset.mesa;
        document.getElementById('modal-reserva').style.display = 'block';
        document.getElementById('mapaMesas').style.display = 'none';
    };
});

function cerrarReserva() {
    document.getElementById('modal-reserva').style.display = 'none';
}
document.getElementById('form-reserva').onsubmit = function(e) {
    e.preventDefault();
    alert('¡Reserva enviada para la mesa ' + document.getElementById('mesa').value + '!');
    cerrarReserva();
    this.reset();
};