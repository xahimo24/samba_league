let currentPlayerIndex = 0;

function editPlayer(id) {
<<<<<<< HEAD
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
=======
    currentPlayerIndex = jugadores.findIndex(j => j.id == id);
    fillForm(currentPlayerIndex);
    document.getElementById('editPlayerModal').style.display = 'block';
}

function fillForm(index) {
    const jugador = jugadores[index];
    document.getElementById('playerId').value = jugador.id;
    document.getElementById('nombre').value = jugador.nombre;
    document.getElementById('partidos_jugados').value = jugador.partidos_jugados;
    document.getElementById('partidos_ganados').value = jugador.victorias;
    document.getElementById('partidos_perdidos').value = jugador.derrotas;
    document.getElementById('posicion').value = jugador.posicion;
    document.getElementById('goles').value = jugador.goles;
    document.getElementById('asistencias').value = jugador.asistencias;
    document.getElementById('paradas').value = jugador.paradas;
    document.getElementById('stats_defensivas').value = jugador.stats_defensivas;
    document.getElementById('dorsal').value = jugador.dorsal;
}

function closeModal() {
    document.getElementById('editPlayerModal').style.display = 'none';
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
    document.getElementById('createPlayerModal').style.display = 'block';
}

function closeCreateModal() {
    document.getElementById('createPlayerModal').style.display = 'none';
}

function deletePlayer(id) {
    Swal.fire({
        title: '¿Estás seguro de que deseas eliminar este jugador?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#82BC6A',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminarlo!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'delete-jugador.php?id=' + id;
        }
    });
>>>>>>> 3ba653384797bb1576332623c0df6878d0bd89c4
}

// Función para hacer que el header sea sticky
function StickyHeader() {
<<<<<<< HEAD
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

let teamPlayers = [];
let events = [];

function openCreateMatchModal() {
  document.getElementById("createMatchModal").style.display = "block";
}

function closeCreateMatchModal() {
  document.getElementById("createMatchModal").style.display = "none";
  clearTemporaryData();
  resetForm();
}

function addTeamPlayer() {
    const color = document.getElementById("team_color").value;
    const playerId = document.getElementById("team_player").value;
    const playerName = document.getElementById("team_player").selectedOptions[0].text;
    if (color && playerId) {
      teamPlayers.push({ color, playerId, playerName });
      updateTeamPlayersList();
    }
  }
  
  function updateTeamPlayersList() {
    const list = document.getElementById("team_players_list");
    list.innerHTML = "";
    teamPlayers.forEach((tp, index) => {
      const li = document.createElement("li");
      li.textContent = `${tp.color}: ${tp.playerName}`;
      list.appendChild(li);
    });
  }
  
  function addEvent() {
    const minute = document.getElementById("event_minute").value;
    const type = document.getElementById("event_type").value;
    const playerMainId = document.getElementById("event_player_main").value;
    const playerMainName = document.getElementById("event_player_main").selectedOptions[0].text;
    const playerSecondaryId = document.getElementById("event_player_secondary").value;
    const playerSecondaryName = playerSecondaryId ? document.getElementById("event_player_secondary").selectedOptions[0].text : null;
    if (minute && type && playerMainId) {
      events.push({ minute, type, playerMainId, playerMainName, playerSecondaryId, playerSecondaryName });
      updateEventsList();
    }
  }
  
  function updateEventsList() {
    const list = document.getElementById("events_list");
    list.innerHTML = "";
    events.forEach((event, index) => {
      const li = document.createElement("li");
      li.textContent = `Minuto ${event.minute}: ${event.type} - ${event.playerMainName} ${event.playerSecondaryName ? "(Asistencia de " + event.playerSecondaryName + ")" : ""}`;
      list.appendChild(li);
    });
  }
  
  function clearTemporaryData() {
=======
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

function openCreateMatchModal() {
    document.getElementById('createMatchModal').style.display = 'block';
}

function closeCreateMatchModal() {
    document.getElementById('createMatchModal').style.display = 'none';
    clearTemporaryData();
    resetForm();
}

function addTeamPlayer() {
    const color = document.getElementById('team_color').value;
    const player = document.getElementById('team_player').value;
    if (player) {
        teamPlayers.push({ color, player });
        updateTeamPlayersList();
    }
}

function updateTeamPlayersList() {
    const list = document.getElementById('team_players_list');
    list.innerHTML = '';
    teamPlayers.forEach((tp, index) => {
        const li = document.createElement('li');
        li.textContent = `${tp.color}: ${tp.player}`;
        list.appendChild(li);
    });
}

function addEvent() {
    const minute = document.getElementById('event_minute').value;
    const type = document.getElementById('event_type').value;
    const playerMain = document.getElementById('event_player_main').value;
    const playerSecondary = document.getElementById('event_player_secondary').value;
    if (playerMain) {
        events.push({ minute, type, playerMain, playerSecondary });
        updateEventsList();
    }
}

function updateEventsList() {
    const list = document.getElementById('events_list');
    list.innerHTML = '';
    events.forEach((event, index) => {
        const li = document.createElement('li');
        li.textContent = `Minuto ${event.minute}: ${event.type} - ${event.playerMain} ${event.playerSecondary ? '(Asistencia de ' + event.playerSecondary + ')' : ''}`;
        list.appendChild(li);
    });
}

function clearTemporaryData() {
>>>>>>> 3ba653384797bb1576332623c0df6878d0bd89c4
    teamPlayers = [];
    events = [];
    updateTeamPlayersList();
    updateEventsList();
<<<<<<< HEAD
  }
  
  function resetForm() {
    document.getElementById("createMatchForm").reset();
  }
  
  document.getElementById("createMatchForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    formData.append("teamPlayers", JSON.stringify(teamPlayers));
    formData.append("events", JSON.stringify(events));
  
    fetch("create-partido.php", {
      method: "POST",
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        Swal.fire("Éxito", data.message, "success").then(() => {
          closeCreateMatchModal();
          location.reload();
        });
      } else {
        Swal.fire("Error", data.message, "error");
      }
    })
    .catch(error => {
      console.error("Error:", error);
      Swal.fire("Error", "Ocurrió un error al crear el partido.", "error");
    });
  });
=======
}

function resetForm() {
    document.getElementById('createMatchForm').reset();
}

function openEditMatchModal() {
    document.getElementById('editMatchModal').style.display = 'block';
}

function closeEditMatchModal() {
    document.getElementById('editMatchModal').style.display = 'none';
    clearEditTemporaryData();
    resetEditForm();
}

function loadMatchData() {
    const partidoId = document.getElementById('select_jornada').value;
    if (partidoId) {
        const partido = partidos.find(p => p.id == partidoId);
        if (partido) {
            // Llenar los campos del formulario con los datos del partido
            document.getElementById('edit_partido_id').value = partido.id;
            document.getElementById('edit_fecha').value = partido.fecha;
            document.getElementById('edit_jornada').value = partido.jornada;
            document.getElementById('edit_resultado_local').value = partido.goles_local;
            document.getElementById('edit_resultado_visitante').value = partido.goles_visitante;

            // Cargar eventos del partido
            fetch(`get-events.php?partido_id=${partidoId}`)
                .then(response => response.json())
                .then(events => {
                    editEvents = events;
                    updateEditEventsList();
                });

            // Cargar jugadores del partido
            fetch(`get-team-players.php?partido_id=${partidoId}`)
                .then(response => response.json())
                .then(players => {
                    editTeamPlayers = players;
                    updateEditTeamPlayersList();
                });
        }
    }
}

let editTeamPlayers = [];
let editEvents = [];

function addEditTeamPlayer() {
    const color = document.getElementById('edit_team_color').value;
    const player = document.getElementById('edit_team_player').value;
    if (player) {
        editTeamPlayers.push({ color, player });
        updateEditTeamPlayersList();
    }
}

function updateEditTeamPlayersList() {
    const list = document.getElementById('edit_team_players_list');
    list.innerHTML = '';
    editTeamPlayers.forEach((tp, index) => {
        const li = document.createElement('li');
        li.textContent = `${tp.color}: ${tp.player}`;
        list.appendChild(li);
    });
}

function addEditEvent() {
    const minute = document.getElementById('edit_event_minute').value;
    const type = document.getElementById('edit_event_type').value;
    const playerMain = document.getElementById('edit_event_player_main').value;
    const playerSecondary = document.getElementById('edit_event_player_secondary').value;
    if (playerMain) {
        editEvents.push({ minute, type, playerMain, playerSecondary });
        updateEditEventsList();
    }
}

function updateEditEventsList() {
    const list = document.getElementById('edit_events_list');
    list.innerHTML = '';
    editEvents.forEach((event, index) => {
        const li = document.createElement('li');
        li.textContent = `Minuto ${event.minute}: ${event.type} - ${event.playerMain} ${event.playerSecondary ? '(Asistencia de ' + event.playerSecondary + ')' : ''}`;
        list.appendChild(li);
    });
}

function clearEditTemporaryData() {
    editTeamPlayers = [];
    editEvents = [];
    updateEditTeamPlayersList();
    updateEditEventsList();
}

function resetEditForm() {
    document.getElementById('editMatchForm').reset();
}

>>>>>>> 3ba653384797bb1576332623c0df6878d0bd89c4
