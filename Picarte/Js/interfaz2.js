let indice = 0;
        const slider = document.querySelector(".slider2");
        const totalSlides = document.querySelectorAll(".slider2 img").length;

        function moverSlide(direccion) {
            indice += direccion;
            if (indice < 0) { indice = totalSlides - 1; } 
            if (indice >= totalSlides) { indice = 0; }
            slider.style.transform = `translateX(-${indice * 100}%)`;
        }