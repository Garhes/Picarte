let carrito = [];
let total = 0;

function agregarAlCarrito(nombre, precio) {
    carrito.push({ nombre, precio });
    total += precio;
    actualizarCarrito();
}

function eliminarDelCarrito(index) {
    total -= carrito[index].precio;
    carrito.splice(index, 1);
    actualizarCarrito();
}

function actualizarCarrito() {
    const lista = document.getElementById("carrito-lista");
    const contador = document.getElementById("contador");
    lista.innerHTML = "";
    carrito.forEach((item, index) => {
    const div = document.createElement("div");
    div.className = "item-carrito";
    div.innerHTML = `
        <span>${item.nombre} - $${item.precio.toLocaleString()}</span>
        <button onclick="eliminarDelCarrito(${index})">❌</button>
    `;
    lista.appendChild(div);
    });
    document.getElementById("total").textContent = total.toLocaleString();
    contador.textContent = carrito.length;
}

function abrirCarrito() {
    document.getElementById("modal-carrito").style.display = "block";
}

function cerrarCarrito() {
    document.getElementById("modal-carrito").style.display = "none";
}

function comprar() {
    if (carrito.length === 0) {
    alert("Tu carrito está vacío 🛒");
    } else {
    alert("¡Gracias por tu compra! 🎉");
    carrito = [];
    total = 0;
    actualizarCarrito();
    cerrarCarrito();
    }
}

  // Cierra el carrito si se hace clic fuera del modal
window.onclick = function(event) {
    const modal = document.getElementById("modal-carrito");
    if (event.target === modal) {
    cerrarCarrito();
    }
}

function irAlCheckout() {
    // Guardamos los datos del carrito en localStorage para leerlos en la otra página
    localStorage.setItem("carrito", JSON.stringify(carrito));
    localStorage.setItem("total", total);
    
    // Redirigimos a la página de compra
    window.location.href = "checkout.html";
}
