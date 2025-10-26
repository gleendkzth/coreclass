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

<div class="container mx-auto p-4 sm:p-6 lg:p-8">
    <!-- Encabezado -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Crear Nueva Tarea</h1>
            <p class="text-gray-500 mt-1">Completa los siguientes campos para asignar una nueva actividad.</p>
        </div>
        <button id="volver-a-tareas-btn" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            <span class="material-icons-round -ml-1 mr-2">arrow_back</span>
            Volver
        </button>
    </div>

    <!-- Formulario -->
    <form id="form-nueva-tarea" class="bg-white rounded-lg shadow-lg p-6 space-y-6">
        
        <!-- Título -->
        <div>
            <label for="titulo-tarea" class="block text-sm font-medium text-gray-700">Título de la Tarea</label>
            <input type="text" name="titulo-tarea" id="titulo-tarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
        </div>

        <!-- Descripción -->
        <div>
            <label for="descripcion-tarea" class="block text-sm font-medium text-gray-700">Descripción e Instrucciones</label>
            <textarea id="descripcion-tarea" name="descripcion-tarea" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Explica detalladamente qué deben hacer los estudiantes..."></textarea>
        </div>

        <!-- Material de Apoyo -->
        <div>
            <label for="material-apoyo" class="block text-sm font-medium text-gray-700">Material de Apoyo (Opcional)</label>
            <input type="file" name="material-apoyo" id="material-apoyo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
        </div>

        <!-- Filtros dinámicos -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label for="programa-estudio-tarea" class="block text-sm font-medium text-gray-700">Programa de Estudio</label>
                <select id="programa-estudio-tarea" name="programa-estudio-tarea" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Seleccionar programa...</option>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa['id_programa']; ?>"><?php echo htmlspecialchars($programa['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="semestre-tarea" class="block text-sm font-medium text-gray-700">Semestre</label>
                <select id="semestre-tarea" name="semestre-tarea" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Seleccionar semestre...</option>
                </select>
            </div>
            <div>
                <label for="curso-tarea" class="block text-sm font-medium text-gray-700">Curso</label>
                <select id="curso-tarea" name="curso-tarea" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                    <option value="">Seleccionar curso...</option>
                </select>
            </div>
        </div>

        <!-- Fecha Límite y Puntaje -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="fecha-limite" class="block text-sm font-medium text-gray-700">Fecha Límite de Entrega</label>
                <input type="date" name="fecha-limite" id="fecha-limite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
            </div>
            <div>
                <label for="puntaje-tarea" class="block text-sm font-medium text-gray-700">Puntaje Máximo</label>
                <input type="number" name="puntaje-tarea" id="puntaje-tarea" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="20">
            </div>
        </div>

        <!-- Botones de Acción -->
        <div class="flex justify-end pt-4 border-t border-gray-200">
            <button type="button" id="cancelar-btn" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Cancelar</button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-800 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Guardar y Publicar Tarea
            </button>
        </div>
    </form>
</div>

<script>
(() => {
    // Lógica para menús desplegables
    const programaSelect = document.getElementById('programa-estudio-tarea');
    const semestreSelect = document.getElementById('semestre-tarea');
    const cursoSelect = document.getElementById('curso-tarea');

    programaSelect.addEventListener('change', function() {
        const idPrograma = this.value;
        semestreSelect.innerHTML = '<option value="">Cargando...</option>';
        cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
        if (!idPrograma) {
            semestreSelect.innerHTML = '<option value="">Seleccionar semestre...</option>';
            return;
        }
        fetch(`ajax_get_semestres.php?id_programa=${idPrograma}`)
            .then(response => response.json())
            .then(data => {
                semestreSelect.innerHTML = '<option value="">Seleccionar semestre...</option>';
                data.forEach(semestre => {
                    semestreSelect.innerHTML += `<option value="${semestre.semestre}">${semestre.semestre}</option>`;
                });
            });
    });

    semestreSelect.addEventListener('change', function() {
        const idPrograma = programaSelect.value;
        const semestre = this.value;
        cursoSelect.innerHTML = '<option value="">Cargando...</option>';
        if (!idPrograma || !semestre) {
            cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
            return;
        }
        fetch(`ajax_get_cursos.php?id_programa=${idPrograma}&semestre=${semestre}`)
            .then(response => response.json())
            .then(data => {
                cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
                data.forEach(curso => {
                    cursoSelect.innerHTML += `<option value="${curso.id_curso}">${curso.nombre}</option>`;
                });
            });
    });

    // Lógica para botones de navegación
    const volverBtn = document.getElementById('volver-a-tareas-btn');
    const cancelarBtn = document.getElementById('cancelar-btn');
    
    function volverATareas() {
        const mainContent = document.getElementById('contenido-principal');
        mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';
        fetch('tareas.php')
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
    }

    volverBtn.addEventListener('click', volverATareas);
    cancelarBtn.addEventListener('click', volverATareas);

})();
</script>
