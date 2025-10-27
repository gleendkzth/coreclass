<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Acceso denegado.</div>";
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$docenteController = new DocenteController($conn);
$id_usuario = $_SESSION['id_usuario'];
$programas = $docenteController->obtenerProgramasDelDocente($id_usuario);
?>

<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Gestión de Tareas</h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" id="nueva-tarea-btn" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <span class="material-icons-round -ml-1 mr-2">add</span>
                Nueva Tarea
            </button>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="filtro-programa" class="block text-sm font-medium text-gray-700">Programa de Estudio</label>
                <select id="filtro-programa" name="filtro-programa" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Todos los programas</option>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa['id_programa']; ?>"><?php echo htmlspecialchars($programa['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="filtro-semestre" class="block text-sm font-medium text-gray-700">Semestre</label>
                <select id="filtro-semestre" name="filtro-semestre" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Todos los semestres</option>
                </select>
            </div>
            <div>
                <label for="filtro-curso" class="block text-sm font-medium text-gray-700">Curso</label>
                <select id="filtro-curso" name="filtro-curso" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Todos los cursos</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Contenedor para la lista de tareas -->
    <div id="lista-tareas-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Las tareas se cargarán aquí dinámicamente -->
    </div>
</div>

<script>
(() => {
    const mainContent = document.getElementById('contenido-principal');
    const programaSelect = document.getElementById('filtro-programa');
    const semestreSelect = document.getElementById('filtro-semestre');
    const cursoSelect = document.getElementById('filtro-curso');
    const tareasContainer = document.getElementById('lista-tareas-container');

    const cargarTareas = async () => {
        const idPrograma = programaSelect.value;
        const semestre = semestreSelect.value;
        const idCurso = cursoSelect.value;

        let url = 'ajax_get_tareas.php?';
        if (idPrograma) url += `id_programa=${idPrograma}&`;
        if (semestre) url += `semestre=${semestre}&`;
        if (idCurso) url += `id_curso=${idCurso}`;

        tareasContainer.innerHTML = '<p class="text-center col-span-3">Cargando tareas...</p>';

        try {
            const response = await fetch(url);
            const result = await response.json();

            if (!result.success) throw new Error(result.message);

            tareasContainer.innerHTML = '';
            if (result.data.length === 0) {
                tareasContainer.innerHTML = '<p class="text-center col-span-3 text-gray-500">No se encontraron tareas con los filtros seleccionados.</p>';
                return;
            }

            result.data.forEach(tarea => {
                const estadoClass = tarea.estado.toLowerCase() === 'en curso' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800';
                const fecha = new Date(tarea.fecha_creacion).toLocaleDateString('es-ES');

                const cardHtml = `
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col hover:shadow-md transition-shadow duration-200">
                        <div class="p-5 flex-grow">
                            <div class="flex justify-between items-start mb-2">
                                <p class="text-xs text-gray-500 uppercase tracking-wider">${tarea.programa}</p>
                                <span class="px-2 py-1 inline-flex text-xs leading-4 font-semibold rounded-full ${estadoClass}">${tarea.estado}</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">${tarea.titulo}</h3>
                            <p class="text-sm font-medium text-red-700 mt-1">${tarea.curso} <span class="text-gray-500 font-normal">- ${tarea.semestre}</span></p>
                        </div>
                        <div class="border-t border-gray-200 bg-gray-50 px-5 py-3 flex justify-between items-center">
                            <p class="text-sm text-gray-600"><span class="font-medium">Publicado:</span> ${fecha}</p>
                            <div class="flex items-center space-x-1">
                                <button class="editar-tarea-btn p-1 text-gray-500 hover:text-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" title="Editar Tarea" data-id="${tarea.id_tarea}">
                                    <span class="material-icons-round">edit</span>
                                </button>
                                <button class="ver-entregas-btn p-1 text-gray-500 hover:text-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" title="Ver Entregas">
                                    <span class="material-icons-round">assignment</span>
                                </button>
                            </div>
                        </div>
                    </div>`;
                tareasContainer.innerHTML += cardHtml;
            });

            // Añadir event listeners a los nuevos botones de editar
            document.querySelectorAll('.editar-tarea-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const idTarea = this.dataset.id;
                    cargarVistaEdicion(idTarea);
                });
            });

        } catch (error) {
            tareasContainer.innerHTML = `<p class="text-center col-span-3 text-red-500">Error al cargar las tareas: ${error.message}</p>`;
        }
    };

    const cargarSemestres = () => {
        const idPrograma = programaSelect.value;
        semestreSelect.innerHTML = '<option value="">Cargando...</option>';
        fetch(`ajax_get_semestres.php?id_programa=${idPrograma}`)
            .then(res => res.json())
            .then(data => {
                semestreSelect.innerHTML = '<option value="">Todos los semestres</option>';
                data.forEach(s => semestreSelect.add(new Option(s.semestre, s.semestre)));
            });
    };

    const cargarCursos = () => {
        const idPrograma = programaSelect.value;
        const semestre = semestreSelect.value;
        cursoSelect.innerHTML = '<option value="">Cargando...</option>';
        fetch(`ajax_get_cursos.php?id_programa=${idPrograma}&semestre=${semestre}`)
            .then(res => res.json())
            .then(data => {
                cursoSelect.innerHTML = '<option value="">Todos los cursos</option>';
                data.forEach(c => cursoSelect.add(new Option(c.nombre, c.id_curso)));
            });
    };

    // Navegación
    document.getElementById('nueva-tarea-btn').addEventListener('click', () => {
        mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';
        fetch('nueva_tarea.php')
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;
                const newScript = document.createElement('script');
                const scriptContent = mainContent.querySelector('script');
                if (scriptContent) {
                    newScript.textContent = scriptContent.innerHTML;
                    document.body.appendChild(newScript).parentNode.removeChild(newScript);
                }
            });
    });

    // Event Listeners para filtros
    programaSelect.addEventListener('change', () => { cargarSemestres(); cargarTareas(); });
    semestreSelect.addEventListener('change', () => { cargarCursos(); cargarTareas(); });
    cursoSelect.addEventListener('change', cargarTareas);

    const cargarVistaEdicion = (idTarea) => {
        mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';
        fetch(`nueva_tarea.php?id_tarea=${idTarea}`)
            .then(response => response.text())
            .then(html => {
                mainContent.innerHTML = html;
                const newScript = document.createElement('script');
                const scriptContent = mainContent.querySelector('script');
                if (scriptContent) {
                    newScript.textContent = scriptContent.innerHTML;
                    document.body.appendChild(newScript).parentNode.removeChild(newScript);
                }
            });
    };

    // Carga inicial
    cargarTareas();
})();
</script>

