// Función para hacer que el header sea sticky
window.addEventListener("load", () => {
    function StickyHeader() {
      let header = document.querySelector("header");
  
      window.addEventListener("scroll", () => {
        if (window.scrollY > 70) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      });
    }
    StickyHeader();
  });
  
  // Función para manejar el clic en los headers de los equipos
  const teamHeaders = document.querySelectorAll(".team-header");
  
  teamHeaders.forEach((header) => {
    header.addEventListener("click", (event) => {
      event.stopPropagation(); // Evita que el evento se propague a otros elementos
      const team = header.dataset.team;
      const playerList = document.querySelector(
        `.player-list[data-team="${team}"]`
      );
  
      playerList.classList.toggle("show");
    });
  });
  
  // Función para girar las tarjetas de los jugadores
  function flipCard(element) {
    element.classList.toggle("is-flipped");
  }
  
  // Función para inicializar el modal de login
  function initializeLoginModal() {
    // Obtenemos el modal, el botón de login, y el botón de cerrar
    var modal = document.getElementById("loginModal");
    var loginBtn = document.querySelector(".header-btn");
    var closeBtn = document.querySelector(".modal .close");
  
    // Función que muestra el modal estableciendo su estilo "display" en "block"
    function showModal() {
      modal.style.display = "block";
    }
  
    // Función que oculta el modal cambiando su estilo "display" a "none"
    function closeModal() {
      modal.style.display = "none";
    }
  
    // Añadimos un evento para cuando el usuario haga clic en el botón de login
    loginBtn.addEventListener("click", showModal);
  
    // Añadimos un evento para cuando el usuario haga clic en el botón de cerrar ("X")
    closeBtn.addEventListener("click", closeModal);
  
    // Añadimos un evento al objeto window para detectar clics en cualquier parte de la ventana
    window.addEventListener("click", function (event) {
      // Si el usuario hace clic fuera del modal (en el fondo del modal), también se cierra el modal
      if (event.target == modal) {
        closeModal();
      }
    });
  }
  
  // Escuchamos el evento 'DOMContentLoaded', que ocurre cuando todo el DOM se ha cargado completamente
  document.addEventListener("DOMContentLoaded", function () {
    initializeLoginModal();
  });

  document.addEventListener('DOMContentLoaded', function() {
    const matchItems = document.querySelectorAll('.match-item');

    matchItems.forEach(item => {
        item.addEventListener('click', function() {
            this.classList.toggle('expanded');
            const lineups = this.querySelectorAll('.lineup-local, .lineup-visit');
            lineups.forEach(lineup => {
                lineup.querySelector('.player-list').classList.toggle('show');
            });
        });
    });
});

