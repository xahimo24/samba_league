document.addEventListener('DOMContentLoaded', function() {
    const taskForm = document.getElementById('taskForm');
    const newTaskInput = document.getElementById('newTask');
    const pendingTasks = document.getElementById('pendingTasks');
    const inProgressTasks = document.getElementById('inProgressTasks');
    const completedTasks = document.getElementById('completedTasks');

    // Load tasks from the server
    loadTasks();

    taskForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const taskText = newTaskInput.value;
        addTask(taskText, 'pending');
        saveTask(taskText, 'pending');
        newTaskInput.value = '';
    });

    function addTask(task, status) {
        const li = document.createElement('li');
        li.textContent = task;
        li.setAttribute('data-task', task); // Store the task text in a data attribute

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.addEventListener('click', function() {
            li.parentElement.removeChild(li);
            deleteTask(task);
        });

        li.textContent = ''; // Clear the text content before appending buttons
        li.appendChild(document.createTextNode(task)); // Add the task text as a text node
        li.appendChild(deleteButton);

        if (status !== 'completed') {
            const moveButton = document.createElement('button');
            moveButton.classList.add('move-button');
            if (status === 'pending') {
                moveButton.textContent = 'En Proceso';
                moveButton.addEventListener('click', function() {
                    moveTask(li, 'inProgress');
                });
            } else if (status === 'inProgress') {
                moveButton.textContent = 'Realizado';
                moveButton.addEventListener('click', function() {
                    moveTask(li, 'completed');
                });
            }
            li.appendChild(moveButton);
        }

        if (status === 'pending') {
            pendingTasks.appendChild(li);
        } else if (status === 'inProgress') {
            inProgressTasks.appendChild(li);
        } else if (status === 'completed') {
            completedTasks.appendChild(li);
        }
    }

    function moveTask(taskElement, newStatus) {
        const taskText = taskElement.getAttribute('data-task'); // Get the task text from the data attribute
        taskElement.parentElement.removeChild(taskElement);
        addTask(taskText, newStatus);
        updateTaskStatus(taskText, newStatus);
    }

    function loadTasks() {
        fetch('load_tasks.php')
            .then(response => response.json())
            .then(tasks => {
                tasks.forEach(task => {
                    addTask(task.task, task.status);
                });
            });
    }

    function saveTask(task, status) {
        fetch('save_task.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ task, status })
        });
    }

    function updateTaskStatus(task, status) {
        fetch('update_task.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ task, status })
        });
    }

    function deleteTask(task) {
        fetch('delete_task.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ task })
        });
    }
});