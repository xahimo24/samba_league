let currentPlayerIndex = 0;

        function editPlayer(id) {
            currentPlayerIndex = jugadores.findIndex(j => j.id == id);
            fillForm(currentPlayerIndex);
            document.getElementById('editPlayerModal').style.display = 'block';
        }

        function fillForm(index) {
            const jugador = jugadores[index];
            document.getElementById('playerId').value = jugador.id;
            document.getElementById('nombre').value = jugador.nombre;
            document.getElementById('partidos_jugados').value = jugador.partidos_jugados;
            document.getElementById('partidos_ganados').value = jugador.partidos_ganados;
            document.getElementById('partidos_perdidos').value = jugador.partidos_perdidos;
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
            teamPlayers = [];
            events = [];
            updateTeamPlayersList();
            updateEventsList();
        }
    
        function resetForm() {
            document.getElementById('createMatchForm').reset();
        }