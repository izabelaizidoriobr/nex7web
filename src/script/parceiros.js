document.addEventListener("DOMContentLoaded", () => {
    const parceirosCarousel = document.getElementById('parceiros-carousel');
    const parceirosLogos = Array.from(parceirosCarousel.children);
    const parceirosToShow = 5;
    let parceirosIndex = 0;

    function updateParceirosLogos() {
        parceirosLogos.forEach(logo => logo.style.display = 'none');
        for (let i = 0; i < parceirosToShow; i++) {
            const index = (parceirosIndex + i) % parceirosLogos.length;
            parceirosLogos[index].style.display = 'block';
        }
    }

    function showNextParceirosLogo() {
        parceirosIndex = (parceirosIndex + 1) % parceirosLogos.length;
        updateParceirosLogos();
    }

    updateParceirosLogos();
    setInterval(showNextParceirosLogo, 2000);
});
