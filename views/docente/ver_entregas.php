<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Acceso denegado.</div>";
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

$id_tarea = filter_input(INPUT_GET, 'id_tarea', FILTER_VALIDATE_INT);
if (!$id_tarea) {
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Tarea no válida.</div>";
    exit;
}

// Obtener información de la tarea
$id_usuario = $_SESSION['id_usuario'];
$stmt = $conn->prepare("
    SELECT t.id_tarea, t.titulo, t.instrucciones, t.fecha_limite, t.puntaje_maximo,
           p.nombre as programa, c.nombre as curso, t.semestre, t.id_curso, t.id_programa
    FROM tarea t
    JOIN programa_estudio p ON t.id_programa = p.id_programa
    JOIN curso c ON t.id_curso = c.id_curso
    WHERE t.id_tarea = ? AND t.id_docente = (SELECT id_docente FROM docente WHERE id_usuario = ?)
");
$stmt->bind_param("ii", $id_tarea, $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Tarea no encontrada o no tienes permiso.</div>";
    exit;
}

$tarea = $resultado->fetch_assoc();
$stmt->close();
?>

<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <a href="#" id="volver-a-tareas" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-2">
                <span class="material-icons-round text-base mr-1">arrow_back_ios</span>
                Volver a Tareas
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Entregas de Tarea
            </h2>
        </div>
    </div>

    <!-- resumen de la tarea -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 space-y-4">
        <div>
            <h3 class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars($tarea['titulo']); ?></h3>
            <p class="mt-1 text-sm text-gray-600">
                <?php echo htmlspecialchars($tarea['instrucciones']); ?>
            </p>
        </div>
        <div class="flex items-center space-x-6 text-sm text-gray-500">
            <div class="flex items-center">
                <span class="material-icons-round text-lg mr-1.5">school</span>
                <span><?php echo htmlspecialchars($tarea['programa']); ?> - <?php echo htmlspecialchars($tarea['semestre']); ?></span>
            </div>
            <div class="flex items-center">
                <span class="material-icons-round text-lg mr-1.5">book</span>
                <span><?php echo htmlspecialchars($tarea['curso']); ?></span>
            </div>
            <div class="flex items-center">
                <span class="material-icons-round text-lg mr-1.5">calendar_today</span>
                <span>Fecha Límite: <span class="font-medium text-gray-700"><?php echo date('d/m/Y', strtotime($tarea['fecha_limite'])); ?></span></span>
            </div>
            <div class="flex items-center">
                <span class="material-icons-round text-lg mr-1.5">grade</span>
                <span>Puntaje Máximo: <span class="font-medium text-gray-700"><?php echo $tarea['puntaje_maximo']; ?></span></span>
            </div>
        </div>
    </div>

    <!-- Botón para guardar cambios -->
    <div class="flex justify-end mb-4">
        <button id="guardar-calificaciones" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
            <span class="material-icons-round text-base mr-2">save</span>
            Guardar Calificaciones
        </button>
    </div>

    <!-- tabla de entregas -->
    <div id="entregas-container">
        <div class="text-center p-8 text-gray-500">Cargando estudiantes y entregas...</div>
    </div>
</div>

<script>
(() => {
    const idTarea = <?php echo $id_tarea; ?>;
    const idCurso = <?php echo $tarea['id_curso']; ?>;
    const idPrograma = <?php echo $tarea['id_programa']; ?>;
    const semestre = "<?php echo $tarea['semestre']; ?>";
    const puntajeMaximo = <?php echo $tarea['puntaje_maximo']; ?>;
    const entregasContainer = document.getElementById('entregas-container');
    const guardarBtn = document.getElementById('guardar-calificaciones');

    // Función para volver a tareas
    const volverBtn = document.getElementById('volver-a-tareas');
    if (volverBtn) {
        volverBtn.addEventListener('click', (e) => {
            e.preventDefault();
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
                })
                .catch(error => {
                    mainContent.innerHTML = `<div class="text-center text-red-500 p-8"><strong>Error:</strong> ${error.message}</div>`;
                });
        });
    }

    // Función para cargar entregas
    async function cargarEntregas() {
        try {
            const response = await fetch(`ajax_get_entregas.php?id_tarea=${idTarea}&id_curso=${idCurso}&id_programa=${idPrograma}&semestre=${encodeURIComponent(semestre)}`);
            const result = await response.json();

            if (!result.success) {
                throw new Error(result.message);
            }

            const estudiantes = result.data;

            if (estudiantes.length === 0) {
                entregasContainer.innerHTML = '<div class="text-center p-8 text-gray-500">No hay estudiantes matriculados en este curso.</div>';
                return;
            }

            // Construir tabla
            let tableHtml = `
                <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estudiante</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Entrega</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación (/${puntajeMaximo})</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observación</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">`;

            estudiantes.forEach((est, index) => {
                const nombreCompleto = `${est.apellido_paterno} ${est.apellido_materno || ''}, ${est.primer_nombre} ${est.segundo_nombre || ''}`.replace(/\s+/g, ' ').trim();
                const entrego = est.entrego === '1' || est.entrego === 1;
                const fechaEntrega = entrego && est.fecha_entrega ? new Date(est.fecha_entrega).toLocaleString('es-ES') : '-';
                const estadoClass = entrego ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                const estadoTexto = entrego ? 'Entregado' : 'No Entregó';

                tableHtml += `
                    <tr data-id-estudiante="${est.id_estudiante}" data-id-entrega="${est.id_entrega || ''}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${index + 1}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${nombreCompleto}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${fechaEntrega}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            ${entrego && est.archivo ? `<a href="${est.archivo}" target="_blank" class="text-red-700 hover:text-red-900 inline-flex items-center"><span class="material-icons-round text-base mr-1">description</span>Ver Archivo</a>` : '-'}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${estadoClass}">${estadoTexto}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            ${entrego ? `<input type="number" class="calificacion-input w-20 border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" min="0" max="${puntajeMaximo}" value="${est.calificacion || ''}" placeholder="-">` : '-'}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            ${entrego ? `<input type="text" class="observacion-input w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" value="${est.observacion || ''}" placeholder="Añadir comentario...">` : '-'}
                        </td>
                    </tr>`;
            });

            tableHtml += `
                            </tbody>
                        </table>
                    </div>
                </div>`;

            entregasContainer.innerHTML = tableHtml;

        } catch (error) {
            console.error('Error al cargar entregas:', error);
            entregasContainer.innerHTML = `<div class="text-center p-8 text-red-500">Error al cargar entregas: ${error.message}</div>`;
        }
    }

    // Función para guardar calificaciones
    guardarBtn.addEventListener('click', async () => {
        const filas = entregasContainer.querySelectorAll('tbody tr');
        const calificaciones = [];

        filas.forEach(fila => {
            const idEstudiante = fila.dataset.idEstudiante;
            const idEntrega = fila.dataset.idEntrega;
            
            if (idEntrega) { // Solo procesar si hay entrega
                const calificacionInput = fila.querySelector('.calificacion-input');
                const observacionInput = fila.querySelector('.observacion-input');
                
                if (calificacionInput) {
                    calificaciones.push({
                        id_entrega: idEntrega,
                        id_estudiante: idEstudiante,
                        calificacion: calificacionInput.value || null,
                        observacion: observacionInput.value || null
                    });
                }
            }
        });

        if (calificaciones.length === 0) {
            alert('No hay entregas para calificar.');
            return;
        }

        guardarBtn.disabled = true;
        guardarBtn.innerHTML = '<span class="material-icons-round text-base mr-2">hourglass_empty</span>Guardando...';

        try {
            const response = await fetch('ajax_guardar_calificaciones.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_tarea: idTarea,
                    calificaciones: calificaciones
                })
            });

            const result = await response.json();

            if (result.success) {
                alert('Calificaciones guardadas correctamente.');
                cargarEntregas(); // Recargar para mostrar cambios
            } else {
                throw new Error(result.message || 'Error desconocido');
            }

        } catch (error) {
            console.error('Error al guardar calificaciones:', error);
            alert(`Error al guardar: ${error.message}`);
        } finally {
            guardarBtn.disabled = false;
            guardarBtn.innerHTML = '<span class="material-icons-round text-base mr-2">save</span>Guardar Calificaciones';
        }
    });

    // Cargar entregas al iniciar
    cargarEntregas();
})();
</script>
