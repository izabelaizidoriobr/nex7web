document.addEventListener("DOMContentLoaded", () => {
  const botoesFiltro = document.querySelectorAll(".btn-f");
  const todasCategorias = document.querySelectorAll(".container-cards");

  // Ativa o botão 'todos' por padrão
  const botaoTodos = document.querySelector('.btn-f[data-filter="todos"]');
  if (botaoTodos) {
    botaoTodos.classList.add("ativo");
  }

  mostrarTodas();

  botoesFiltro.forEach((botao) => {
    botao.addEventListener("click", () => {
      const filtro = botao.dataset.filter;

      // Atualiza botões ativos
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
      cat.style.display = (categoria === filtro) ? "block" : "none";
    });
  }
});
