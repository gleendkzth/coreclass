<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Acceso denegado. No tienes permiso para ver esta página.</div>";
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$docenteController = new DocenteController($conn);
$id_usuario = $_SESSION['id_usuario'];
$programas = $docenteController->obtenerProgramasDelDocente($id_usuario);

?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Registro de Asistencia</h1>
        <p class="text-gray-500 mt-1">Selecciona un curso y la fecha para pasar lista.</p>
    </div>

    <!-- filtros y acciones -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
            <div class="w-full md:w-auto">
                <label for="programa-select" class="text-sm font-medium text-gray-700">Programa de Estudio:</label>
                <select id="programa-select" class="mt-1 w-full md:w-64 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option value="">Seleccionar programa...</option>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa['id_programa']; ?>"><?php echo htmlspecialchars($programa['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="semestre-select" class="text-sm font-medium text-gray-700">Semestre:</label>
                <select id="semestre-select" class="mt-1 w-full md:w-auto bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>Seleccionar semestre...</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="curso-select" class="text-sm font-medium text-gray-700">Curso:</label>
                <select id="curso-select" class="mt-1 w-full md:w-64 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>Seleccionar curso...</option>
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="mes-select" class="text-sm font-medium text-gray-700">Mes:</label>
                <select id="mes-select" class="mt-1 w-full md:w-auto bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <?php
                    $mes_actual = date('n');
                    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                    foreach ($meses as $i => $nombre_mes) {
                        $numero_mes = $i + 1;
                        $selected = ($numero_mes == $mes_actual) ? 'selected' : '';
                        echo "<option value='{$numero_mes}' {$selected}>{$nombre_mes}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="flex items-center gap-2 mt-4 md:mt-0">
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">select_all</span>
                Marcar Todos
            </button>
            <button class="bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">save</span>
                Guardar Asistencia
            </button>
        </div>
    </div>

    <!-- contenedor para la tabla de asistencia -->
    <div id="tabla-asistencia-container">
        <?php
        // Carga inicial de la tabla para el mes actual
        $mes = date('m');
        $anio = date('Y');
        // Usamos __DIR__ para asegurar que la ruta sea correcta
        include __DIR__ . '/ajax_asistencia_tabla.php';
        ?>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const programaSelect = document.getElementById('programa-select');
    const semestreSelect = document.getElementById('semestre-select');
    const cursoSelect = document.getElementById('curso-select');
    const mesSelect = document.getElementById('mes-select');
    const anioActual = new Date().getFullYear();

    // --- EVENTO PARA CARGAR SEMESTRES ---
    programaSelect.addEventListener('change', function() {
        const idPrograma = this.value;
        
        // limpiar menús dependientes
        semestreSelect.innerHTML = '<option value="">Cargando...</option>';
        cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';

        if (!idPrograma) {
            semestreSelect.innerHTML = '<option value="">Seleccionar semestre...</option>';
            return;
        }

        fetch(`views/docente/ajax_get_semestres.php?id_programa=${idPrograma}`)
            .then(response => response.json())
            .then(data => {
                semestreSelect.innerHTML = '<option value="">Seleccionar semestre...</option>';
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

    // --- EVENTO PARA CARGAR CURSOS ---
    semestreSelect.addEventListener('change', function() {
        const idPrograma = programaSelect.value;
        const semestre = this.value;

        cursoSelect.innerHTML = '<option value="">Cargando...</option>';

        if (!idPrograma || !semestre) {
            cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
            return;
        }

        fetch(`views/docente/ajax_get_cursos.php?id_programa=${idPrograma}&semestre=${semestre}`)
            .then(response => response.json())
            .then(data => {
                cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
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

    // --- EVENTO PARA ACTUALIZAR TABLA DE ASISTENCIA ---
    mesSelect.addEventListener('change', function() {
        const mesSeleccionado = this.value;
        const tablaContainer = document.getElementById('tabla-asistencia-container');

        // Mostrar un indicador de carga (opcional)
        tablaContainer.innerHTML = '<div class="text-center p-8">Cargando...</div>';

        // La URL debe ser relativa a la raíz del proyecto (donde está index.php)
        const url = `views/docente/ajax_asistencia_tabla.php?mes=${mesSeleccionado}&anio=${anioActual}`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La respuesta de la red no fue correcta');
                }
                return response.text();
            })
            .then(html => {
                tablaContainer.innerHTML = html;
            })
            .catch(error => {
                console.error('Error al cargar la tabla de asistencia:', error);
                tablaContainer.innerHTML = '<div class="text-center p-8 text-red-500">Error al cargar los datos. Intente de nuevo.</div>';
            });
    });
});
</script>
</div>
