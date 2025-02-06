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
  
  
// Función para inicializar el modal de login
function initializeLoginModal() {
  var modal = document.getElementById("loginModal");
  var loginBtn = document.querySelector(".header-btn");
  var closeBtn = modal.querySelector(".close"); // Se obtiene el botón de cerrar solo dentro del modal

  function showModal() {
      modal.style.display = "block";
  }

  function closeModal() {
      modal.style.display = "none";
  }

  loginBtn.addEventListener("click", showModal);
  closeBtn.addEventListener("click", closeModal);

  window.addEventListener("click", function (event) {
      if (event.target == modal) {
          closeModal();
      }
  });
}

// Función para inicializar el modal de reglas
function initializeRulesModal() {
  var modal = document.getElementById("rulesModal");
  var rulesBtn = document.querySelector(".rules"); // Corregido el selector
  var closeBtn = modal.querySelector(".close"); // Se obtiene el botón de cerrar dentro del modal

  function showModal() {
      modal.style.display = "block";
  }

  function closeModal() {
      modal.style.display = "none";
  }

  rulesBtn.addEventListener("click", showModal);
  closeBtn.addEventListener("click", closeModal);

  window.addEventListener("click", function (event) {
      if (event.target == modal) {
          closeModal();
      }
  });
}

// Inicialización cuando el DOM esté cargado
document.addEventListener("DOMContentLoaded", function () {
  initializeLoginModal();
  initializeRulesModal(); // Se corrige el nombre de la función
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

    document.querySelectorAll('.jugador').forEach(jugador => {
      jugador.addEventListener('click', () => {
          if (jugador.classList.contains('is-flipped')) {
              if (jugador.querySelector('.jugador-back').style.display === 'block') {
                  jugador.querySelector('.jugador-back').style.display = 'none';
                  jugador.querySelector('.jugador-back-2').style.display = 'block';
              } else {
                  jugador.classList.remove('is-flipped');
                  jugador.querySelector('.jugador-back-2').style.display = 'none';
              }
          } else {
              jugador.classList.add('is-flipped');
              jugador.querySelector('.jugador-back').style.display = 'block';
          }
      });
  });
});

