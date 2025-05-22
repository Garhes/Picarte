// Función para abrir el menú
function abrirMenu() {
    document.getElementById("menuModal").style.display = "flex";
}

// Función para cerrar el menú
function cerrarMenu() {
    document.getElementById("menuModal").style.display = "none";
}

// Función para redirigir a la pasarela de pago en una nueva pestaña
function redirigirPago() {
    window.open("pago.html", "_blank"); // Se abre en una nueva pestaña
}

// Cerrar el modal cuando se haga clic fuera de él
window.addEventListener("click", function (event) {
    const modal = document.getElementById("menuModal");
    if (event.target === modal) {
        console.log("Clic fuera del modal, cerrándolo...");
        cerrarMenu();
    }
});
