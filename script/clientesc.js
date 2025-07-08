document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.getElementById('clientes-carousel');
    const logosToShow = 5;

    // Inicial: mostra só os primeiros 5 logos
    const allLogos = Array.from(carousel.children);
    let currentIndex = 0;

    function updateVisibleLogos() {
        // Oculta todos
        allLogos.forEach(logo => logo.style.display = 'none');

        // Mostra os 5 consecutivos a partir do índice atual
        for (let i = 0; i < logosToShow; i++) {
            const index = (currentIndex + i) % allLogos.length;
            allLogos[index].style.display = 'block';
        }
    }

    function showNextLogo() {
        currentIndex = (currentIndex + 1) % allLogos.length;
        updateVisibleLogos();
    }

    updateVisibleLogos(); // mostra inicial
    setInterval(showNextLogo, 2000); // troca a cada 2 segundos
});
