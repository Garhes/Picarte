document.addEventListener("DOMContentLoaded", function () {
    var menu = document.querySelector("#burger");
    var menuIcon = document.querySelector(".menu-icon");
    menuIcon.addEventListener("click", function () {
        menu.classList.toggle("show"); // Muestra/oculta el menú
    });
    document.addEventListener("click", function (event) {
        if (!menu.contains(event.target) && !menuIcon.contains(event.target)) {
            menu.classList.remove("show"); // Cierra el menú si se hace clic fuera
        }
    });
});