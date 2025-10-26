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

// Datos de ejemplo para el diseño visual
$tareas = [
    [
        'programa' => 'Ingeniería de Software con IA',
        'semestre' => 'Semestre III',
        'curso' => 'Inteligencia Artificial',
        'titulo' => 'Investigación sobre IA',
        'fecha_creacion' => '2024-10-01',
        'estado' => 'en curso'
    ],
    [
        'programa' => 'Ingeniería de Software con IA',
        'semestre' => 'Semestre III',
        'curso' => 'Inteligencia Artificial',
        'titulo' => 'Ensayo sobre Redes Neuronales',
        'fecha_creacion' => '2024-09-15',
        'estado' => 'finalizado'
    ],
    [
        'programa' => 'Ciencias de la Computación',
        'semestre' => 'Semestre I',
        'curso' => 'Cálculo I',
        'titulo' => 'Práctica Calificada 1',
        'fecha_creacion' => '2024-09-10',
        'estado' => 'finalizado'
    ],
];

?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado y filtros -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Gestión de Tareas
            </h2>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button type="button" id="nueva-tarea-btn" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <span class="material-icons-round -ml-1 mr-2">add</span>
                Nueva Tarea
            </button>
        </div>
    </div>

    <!-- filtros -->
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

    <!-- lista de tareas publicadas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($tareas as $tarea): ?>
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="p-5 flex-grow">
                                                            <div class="flex justify-between items-start mb-2">
                        <p class="text-xs text-gray-500 uppercase tracking-wider"><?php echo htmlspecialchars($tarea['programa']); ?></p>
                        <span class="px-2 py-1 inline-flex text-xs leading-4 font-semibold rounded-full 
                            <?php echo $tarea['estado'] === 'en curso' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'; ?>
                        ">
                            <?php echo htmlspecialchars(ucfirst($tarea['estado'])); ?>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-red-800">
                        <?php echo htmlspecialchars($tarea['titulo']); ?>
                    </h3>
                    <p class="text-sm font-medium text-red-700 mt-1">
                        <?php echo htmlspecialchars($tarea['curso']); ?> <span class="text-gray-500 font-normal">- <?php echo htmlspecialchars($tarea['semestre']); ?></span>
                    </p>
                </div>
                <div class="border-t border-gray-200 bg-gray-50 px-5 py-3 flex justify-between items-center">
                    <p class="text-sm text-gray-600">
                        <span class="font-medium">Publicado:</span>
                        <?php 
                            $fecha = new DateTime($tarea['fecha_creacion']);
                            echo $fecha->format('d/m/Y');
                        ?>
                    </p>
                                                                                                    <div class="flex items-center space-x-1">
                        <button class="p-1 text-gray-500 hover:text-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" title="Editar Tarea">
                            <span class="material-icons-round">edit</span>
                        </button>
                        <button class="p-1 text-gray-500 hover:text-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" title="Ver Entregas">
                            <span class="material-icons-round">assignment</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
(() => {
    const nuevaTareaBtn = document.getElementById('nueva-tarea-btn');
    if (nuevaTareaBtn) {
        nuevaTareaBtn.addEventListener('click', () => {
            const mainContent = document.getElementById('contenido-principal');
            mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';

            fetch('nueva_tarea.php')
                .then(response => response.text())
                .then(html => {
                    mainContent.innerHTML = html;
                    // Re-ejecutar el script del contenido cargado
                    const newScript = document.createElement('script');
                    const scriptContent = mainContent.querySelector('script');
                    if (scriptContent) {
                        newScript.textContent = scriptContent.innerHTML;
                        document.body.appendChild(newScript).parentNode.removeChild(newScript);
                    }
                })
                .catch(error => {
                    mainContent.innerHTML = `<div class="text-center text-red-500 p-8"><strong>Error:</strong> ${error.message}</div>`;
                });
        });
    }

    const programaSelect = document.getElementById('filtro-programa');
    const semestreSelect = document.getElementById('filtro-semestre');
    const cursoSelect = document.getElementById('filtro-curso');

    if (!programaSelect || !semestreSelect || !cursoSelect) {
        console.warn('Faltan elementos de filtro en el DOM, el script no se ejecutará.');
        return;
    }

    // Cargar semestres al cambiar de programa
    programaSelect.addEventListener('change', function() {
        const idPrograma = this.value;
        semestreSelect.innerHTML = '<option value="">Cargando...</option>';
        cursoSelect.innerHTML = '<option value="">Todos los cursos</option>'; // Resetear cursos

        if (!idPrograma) {
            semestreSelect.innerHTML = '<option value="">Todos los semestres</option>';
            return;
        }

        fetch(`ajax_get_semestres.php?id_programa=${idPrograma}`)
            .then(response => response.json())
            .then(data => {
                semestreSelect.innerHTML = '<option value="">Todos los semestres</option>';
                if (data.length > 0) {
                    data.forEach(semestre => {
                        const option = document.createElement('option');
                        option.value = semestre.semestre;
                        option.textContent = semestre.semestre;
                        semestreSelect.appendChild(option);
                    });
                } else {
                    semestreSelect.innerHTML = '<option value="">No hay semestres</option>';
                }
            })
            .catch(error => {
                console.error('Error al cargar semestres:', error);
                semestreSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    });

    // Cargar cursos al cambiar de semestre
    semestreSelect.addEventListener('change', function() {
        const idPrograma = programaSelect.value;
        const semestre = this.value;
        cursoSelect.innerHTML = '<option value="">Cargando...</option>';

        if (!idPrograma || !semestre) {
            cursoSelect.innerHTML = '<option value="">Todos los cursos</option>';
            return;
        }

        fetch(`ajax_get_cursos.php?id_programa=${idPrograma}&semestre=${semestre}`)
            .then(response => response.json())
            .then(data => {
                cursoSelect.innerHTML = '<option value="">Todos los cursos</option>';
                if (data.length > 0) {
                    data.forEach(curso => {
                        const option = document.createElement('option');
                        option.value = curso.id_curso;
                        option.textContent = curso.nombre;
                        cursoSelect.appendChild(option);
                    });
                } else {
                    cursoSelect.innerHTML = '<option value="">No hay cursos</option>';
                }
            })
            .catch(error => {
                console.error('Error al cargar cursos:', error);
                cursoSelect.innerHTML = '<option value="">Error al cargar</option>';
            });
    });

})();
</script>

