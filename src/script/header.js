const toggleButton = document.getElementById('menu-toggle');
const navContainer = document.getElementById('nav-container');

toggleButton.addEventListener('click', () => {
    navContainer.classList.toggle('open');
    toggleButton.classList.toggle('open'); // troca ☰ por ✕
});

