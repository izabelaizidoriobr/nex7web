document.addEventListener("DOMContentLoaded", () => {
  const botoesFiltro = document.querySelectorAll(".btn-f");
  const todasCategorias = document.querySelectorAll(".container-cards");

  mostrarTodas();

  botoesFiltro.forEach((botao) => {
    botao.addEventListener("click", () => {
      const filtro = botao.dataset.filter;

      // Atualiza visual dos botões
      botoesFiltro.forEach(b => b.classList.remove("ativo"));
      botao.classList.add("ativo");

      if (filtro === "todos") {
        mostrarTodas();
      } else {
        filtrarPorCategoria(filtro);
      }
    });
  });

  function mostrarTodas() {
    todasCategorias.forEach(cat => {
      cat.style.display = "block";
    });
  }

  function filtrarPorCategoria(filtro) {
    todasCategorias.forEach(cat => {
      const categoria = cat.dataset.category;
      if (categoria === filtro) {
        cat.style.display = "block";
      } else {
        cat.style.display = "none";
      }
    });
  }
});
