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



// Aplicar cor salva ao carregar
document.addEventListener('DOMContentLoaded', () => {
  const savedColor = localStorage.getItem('themeColor');
  const options = document.querySelectorAll('#theme-options li');

  options.forEach(option => {
    const color = option.getAttribute('data-color');
    if (color === savedColor) {
      document.body.style.backgroundColor = color;
      option.classList.add('active-color');
    } else {
      option.classList.remove('active-color');
    }
  });

  // Se não houver cor salva, define a cor original
  if (!savedColor) {
    const original = document.querySelector('#theme-options li[data-color="#1b1b1b"]');
    if (original) {
      original.classList.add('active-color');
      document.body.style.backgroundColor = "#1b1b1b";
    }
  }
});

// Mudar tema ao clicar nas opções
document.querySelectorAll('#theme-options li').forEach(option => {
  option.addEventListener('click', () => {
    const color = option.getAttribute('data-color');
    document.body.style.backgroundColor = color;
    localStorage.setItem('themeColor', color);

    themeOptions.classList.remove('show');
    document.querySelectorAll("#theme-options li").forEach(op => {
      op.classList.remove('active-color');
    });
    option.classList.add('active-color');
  });
});
