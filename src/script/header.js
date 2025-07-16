// MENU BURGER
const toggleButton = document.getElementById('menu-toggle');
const navContainer = document.getElementById('nav-container');

toggleButton.addEventListener('click', () => {
    navContainer.classList.toggle('open');
    toggleButton.classList.toggle('open');
});

// SELETOR DE TEMA
const themeToggle = document.getElementById('theme-toggle');
const themeOptions = document.getElementById('theme-options');

themeToggle.addEventListener('click', () => {
    themeOptions.classList.toggle('show');
});

// Mudar tema ao clicar nas opções
document.querySelectorAll('#theme-options li').forEach(option => {
    option.addEventListener('click', () => {
        const color = option.getAttribute('data-color');
        document.body.style.backgroundColor = color;
        themeOptions.classList.remove('show');
    });
});
