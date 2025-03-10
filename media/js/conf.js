// PARTIDOS

//crear partido
function openCreateMatchModal() {
  document.getElementById("createMatchModal").style.display = "block";
}

function closeCreateMatchModal() {
  document.getElementById("createMatchModal").style.display = "none";
  document.getElementById("createMatchForm").reset();
  resetPlayerOptions();
  resetEventPlayerOptions();
}

document
  .getElementById("createMatchForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(this);
    const teamPlayers = [];
    document.querySelectorAll("#team_players_list li").forEach((li) => {
      teamPlayers.push({
        playerId: li.dataset.playerId,
        color: li.dataset.color,
      });
    });
    formData.append("teamPlayers", JSON.stringify(teamPlayers));

    const events = [];
    document.querySelectorAll("#events_list li").forEach((li) => {
      events.push({
        minute: li.dataset.minute,
        type: li.dataset.type,
        playerMainId: li.dataset.playerMainId,
        playerSecondaryId: li.dataset.playerSecondaryId,
      });
    });
    formData.append("events", JSON.stringify(events));

    fetch("create-partido.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert(data.message);
          closeCreateMatchModal();
        } else {
          alert(data.message);
        }
      })
      .catch((error) => console.error("Error:", error));
  });

function addTeamPlayer() {
  const playerSelect = document.getElementById("team_player");
  const playerId = playerSelect.value;
  const playerName = playerSelect.options[playerSelect.selectedIndex].text;
  const colorSelect = document.getElementById("team_color");
  const color = colorSelect.value;

  if (playerId && color) {
    const listItem = document.createElement("li");
    listItem.textContent = `${playerName} (${color})`;
    listItem.dataset.playerId = playerId;
    listItem.dataset.color = color;
    document.getElementById("team_players_list").appendChild(listItem);

    // Remove the selected player from the dropdown
    playerSelect.options[playerSelect.selectedIndex].remove();

    // Add the player to the event player options
    addEventPlayerOption(playerId, playerName);
  }
}

function resetPlayerOptions() {
  const playerSelect = document.getElementById("team_player");
  playerSelect.innerHTML = '<option value="">Seleccionar Jugador</option>';
  jugadores.forEach((jugador) => {
    const option = document.createElement("option");
    option.value = jugador.id;
    option.textContent = jugador.nombre;
    playerSelect.appendChild(option);
  });
}

function addEventPlayerOption(playerId, playerName) {
  const eventPlayerMainSelect = document.getElementById("event_player_main");
  const eventPlayerSecondarySelect = document.getElementById(
    "event_player_secondary"
  );

  const optionMain = document.createElement("option");
  optionMain.value = playerId;
  optionMain.textContent = playerName;
  eventPlayerMainSelect.appendChild(optionMain);

  const optionSecondary = document.createElement("option");
  optionSecondary.value = playerId;
  optionSecondary.textContent = playerName;
  eventPlayerSecondarySelect.appendChild(optionSecondary);
}

function resetEventPlayerOptions() {
  const eventPlayerMainSelect = document.getElementById("event_player_main");
  const eventPlayerSecondarySelect = document.getElementById(
    "event_player_secondary"
  );

  eventPlayerMainSelect.innerHTML =
    '<option value="">Seleccionar Jugador</option>';
  eventPlayerSecondarySelect.innerHTML =
    '<option value="NULL">Ninguno</option>';
}

function addEvent() {
  const minute = document.getElementById("event_minute").value;
  const type = document.getElementById("event_type").value;
  const playerMainId = document.getElementById("event_player_main").value;
  const playerSecondaryId = document.getElementById(
    "event_player_secondary"
  ).value;
  const playerMainName =
    document.getElementById("event_player_main").options[
      document.getElementById("event_player_main").selectedIndex
    ].text;
  const playerSecondaryName = document.getElementById("event_player_secondary")
    .options[document.getElementById("event_player_secondary").selectedIndex]
    .text;

  const resultadoLocal =
    parseInt(document.getElementById("resultado_local").value) || 0;
  const resultadoVisitante =
    parseInt(document.getElementById("resultado_visitante").value) || 0;
  const totalGoles = resultadoLocal + resultadoVisitante;
  const currentGoles = document.querySelectorAll(
    '#events_list li[data-type="gol"]'
  ).length;

  if (type && playerMainId) {
    if (type.toLowerCase() === "gol" && currentGoles >= totalGoles) {
      alert(
        "El número de goles en los eventos no puede exceder el resultado total del partido."
      );
      return;
    }

    const listItem = document.createElement("li");
    listItem.textContent = `Minuto ${
      minute || "N/A"
    }: ${type} - ${playerMainName} ${
      playerSecondaryId ? `asistencia de ${playerSecondaryName}` : ""
    }`;
    listItem.dataset.minute = minute || "N/A";
    listItem.dataset.type = type;
    listItem.dataset.playerMainId = playerMainId;
    listItem.dataset.playerSecondaryId = playerSecondaryId;
    document.getElementById("events_list").appendChild(listItem);
  }
}

//editar partido
function openEditMatchModal() {
  document.getElementById("editMatchModal").style.display = "block";
}

function closeEditMatchModal() {
  document.getElementById("editMatchModal").style.display = "none";
  document.getElementById("editMatchForm").reset();
  // Clear jornadas select
  document.getElementById("select_jornada").selectedIndex = 0;
  // Clear team players list
  document.getElementById("edit_team_players_list").innerHTML = "";
  // Clear events list
  document.getElementById("edit_events_list").innerHTML = "";
}

function loadMatchData() {
  const matchId = document.getElementById("select_jornada").value;
  if (matchId) {
    const match = partidos.find((p) => p.id == matchId);
    if (match) {
      document.getElementById("edit_partido_id").value = match.id;
      document.getElementById("edit_fecha").value = match.fecha;
      document.getElementById("edit_jornada").value = match.jornada;
      document.getElementById("edit_resultado_local").value = match.goles_local;
      document.getElementById("edit_resultado_visitante").value =
        match.goles_visitante;

      // Load team players
      const teamPlayersList = document.getElementById("edit_team_players_list");
      teamPlayersList.innerHTML = "";
      match.teamPlayers.forEach((player) => {
        const listItem = document.createElement("li");
        listItem.textContent = `${player.nombre} (${player.color})`;
        listItem.dataset.playerId = player.id;
        listItem.dataset.color = player.color;
        teamPlayersList.appendChild(listItem);
      });

      // Load events
      const eventsList = document.getElementById("edit_events_list");
      eventsList.innerHTML = "";
      match.events.forEach((event) => {
        const listItem = document.createElement("li");
        listItem.textContent = `Minuto ${event.minuto}: ${
          event.tipo_evento
        } - ${event.jugador_principal} ${
          event.id_jugador_secundario
            ? `asistencia de ${event.jugador_secundario}`
            : ""
        }`;
        listItem.dataset.minute = event.minuto;
        listItem.dataset.type = event.tipo_evento;
        listItem.dataset.playerMainId = event.id_jugador_principal;
        listItem.dataset.playerSecondaryId = event.id_jugador_secundario;
        eventsList.appendChild(listItem);
      });
    }
  }
}

// JUGADORES
let currentPlayerIndex = 0;

function editPlayer(id) {
  currentPlayerIndex = jugadores.findIndex((j) => j.id == id);
  fillForm(currentPlayerIndex);
  document.getElementById("editPlayerModal").style.display = "block";
}

function fillForm(index) {
  const jugador = jugadores[index];
  document.getElementById("playerId").value = jugador.id;
  document.getElementById("nombre").value = jugador.nombre;
  document.getElementById("partidos_jugados").value = jugador.partidos_jugados;
  document.getElementById("partidos_ganados").value = jugador.victorias;
  document.getElementById("partidos_perdidos").value = jugador.derrotas;
  document.getElementById("posicion").value = jugador.posicion;
  document.getElementById("goles").value = jugador.goles;
  document.getElementById("asistencias").value = jugador.asistencias;
  document.getElementById("paradas").value = jugador.paradas;
  document.getElementById("stats_defensivas").value = jugador.stats_defensivas;
  document.getElementById("dorsal").value = jugador.dorsal;
}

function closeModal() {
  document.getElementById("editPlayerModal").style.display = "none";
}

function prevPlayer() {
  if (currentPlayerIndex > 0) {
    currentPlayerIndex--;
    fillForm(currentPlayerIndex);
  }
}

function nextPlayer() {
  if (currentPlayerIndex < jugadores.length - 1) {
    currentPlayerIndex++;
    fillForm(currentPlayerIndex);
  }
}

function openCreatePlayerModal() {
  document.getElementById("createPlayerModal").style.display = "block";
}

function closeCreateModal() {
  document.getElementById("createPlayerModal").style.display = "none";
  document.getElementById("createPlayerForm").reset();
}

function deletePlayer(id) {
  Swal.fire({
    title: "¿Estás seguro de que deseas eliminar este jugador?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#82BC6A",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "delete-jugador.php?id=" + id;
    }
  });
}

// Función para hacer que el header sea sticky
function StickyHeader() {
  let header = document.querySelector("header");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 30) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  });
}

window.addEventListener("load", () => {
  StickyHeader();
});
