document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM completamente cargado");

    const formulario = document.getElementById("pedidoForm");
    const modal = document.getElementById("modal");
    const btnCerrar = document.getElementById("btnCerrar");

    if (!formulario || !modal || !btnCerrar) {
        console.error("❌ Error: No se encontró alguno de los elementos");
        return;
    } else {
        console.log("✔ Elementos encontrados correctamente");
    }

    formulario.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita recargar la página
        console.log("Formulario enviado, mostrando modal...");

        modal.style.display = "flex"; 
    });

    btnCerrar.addEventListener("click", function () {
        console.log("Cerrando modal...");
        modal.style.display = "none";
        formulario.reset(); // Borra los datos después de cerrar
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            console.log("Clic fuera del modal, cerrándolo...");
            modal.style.display = "none";
        }
    });
});
