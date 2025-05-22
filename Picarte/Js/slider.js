let indice = 0;

function moverSlide(n) {
    let slides = document.querySelectorAll(".slide");
    indice += n;
    if (indice >= slides.length) {
        indice = 0;
    } else if (indice < 0) {
        indice = slides.length - 1;
    }
    document.querySelector(".slides").style.transform = `translateX(${-indice * 100}%)`;
}
// Cambia automáticamente cada 3 segundos
setInterval(() => moverSlide(1), 3000);
