// Elementos HTML
const userSelect = document.getElementById('select-users');
const userContainer = document.getElementById('user-container');
const taskContainer = document.getElementById('task-container');

// Código necesario para mostrar información
userSelect.addEventListener('change', (event) => {
  const selectedUserId = parseInt(event.target.value);
  getUserInfo(selectedUserId);
  getUserTasks(selectedUserId);
});

async function getUserInfo(userId) {
  try {
    const users = await getAllUsers();
    const selectedUser = users.find(user => user.id === userId);
    if (selectedUser) {
      userContainer.innerHTML = `
        <h3>Información del usuario seleccionado</h3>
        <ul>
          <li>Nombre completo: ${selectedUser.firstname} ${selectedUser.lastname}</li>
          <li>Email: ${selectedUser.email}</li>
        </ul>
      `;
    } else {
      userContainer.innerHTML = '<p>Usuario no encontrado</p>';
    }
  } catch (error) {
    console.error('Error al obtener información del usuario:', error);
  }
}

async function getUserTasks(userId) {
  try {
    const tasks = await getAllTasks();
    const userTasks = tasks.filter(task => task.userId === userId);
    if (userTasks.length > 0) {
      taskContainer.innerHTML = `
        <h3>Lista de tareas del usuario</h3>
        <ul>
          ${userTasks.map(task => `
            <li>
              <span>${task.title}</span>
              <input type="checkbox" ${task.completed ? 'checked' : ''}>
            </li>
          `).join('')}
        </ul>
      `;
    } else {
      taskContainer.innerHTML = '<p>No hay tareas para este usuario</p>';
    }
  } catch (error) {
    console.error('Error al obtener tareas del usuario:', error);
  }
}

// Funciones
/**
 * Obtiene una lista de todos los usuarios que pueden existir
 * @returns {Promise<User[]>}
 */
function getAllUsers() {
  return fetch('/data/usuarios.json')
    .then(resp => resp.json());
}

/**
 * Obtiene una lista de todas las tareas que hay de todos los usuarios
 * @returns {Promise<Task[]>}
 */
function getAllTasks() {
  return fetch('/data/tareas.json')
    .then(resp => resp.json());
}

/**
 * @typedef User Definición de un usuario
 * @property {number} id Identificador único del usuario
 * @property {string} firstname Primer nombre del usuario
 * @property {string} lastname Apellido del usuario
 * @property {string} email Correo electrónico del usuario
 */

/**
 * @typedef Task Definición de una tarea de usuario
 * @property {number} id Identificador único de la tarea
 * @property {number} userId Identificador del usuario a quien corresponde la tarea
 * @property {string} title Título de la tarea
 * @property {boolean} completed Estado de la tarea si está completada o no
 */


