<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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

<div class="container mx-auto p-4 sm:p-6 lg:p-8">
    <!-- Encabezado -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Calificaciones</h1>
        <p class="text-gray-500 mt-1">Selecciona un curso y evaluación para registrar las notas.</p>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
            <div class="flex flex-wrap gap-4">
                <!-- menu programa de estudios -->
                <div class="w-full sm:w-auto">
                    <label for="programa-estudios-select" class="block text-sm font-medium text-gray-700">Programa de Estudios:</label>
                    <select id="programa-estudios-select" name="programa-estudios-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar programa...</option>
                        <?php foreach ($programas as $programa) : ?>
                            <option value="<?php echo $programa['id_programa']; ?>"><?php echo htmlspecialchars($programa['nombre']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- menu semestre -->
                <div class="w-full sm:w-auto">
                    <label for="semestre-select" class="block text-sm font-medium text-gray-700">Semestre:</label>
                    <select id="semestre-select" name="semestre-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar semestre...</option>
                    </select>
                </div>

                <!-- menu curso -->
                <div class="w-full sm:w-auto">
                    <label for="curso-select" class="block text-sm font-medium text-gray-700">Curso:</label>
                    <select id="curso-select" name="curso-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option value="">Seleccionar curso...</option>
                    </select>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row gap-2 mt-4 sm:mt-0 sm:self-end">
                <button id="guardar-notas-btn" class="inline-flex items-center justify-center px-4 py-2 bg-red-800 text-white font-semibold rounded-lg hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 shadow-md hover:shadow-lg">
                    <span class="material-icons-round text-lg mr-2">save</span>
                    Guardar Notas
                </button>
            </div>
        </div>

        <!-- contenedor para la tabla de notas -->
        <div id="notas-container" class="mt-6">
            <!-- la tabla de notas se generara con js -->
        </div>
    </div>
</div>

<script>
    // se encapsula en una funcion autoejecutable (iife) para evitar conflictos de scope
    (() => {
        const programaSelect = document.getElementById('programa-estudios-select');
        const semestreSelect = document.getElementById('semestre-select');
        const cursoSelect = document.getElementById('curso-select');
        const notasContainer = document.getElementById('notas-container');
        const guardarBtn = document.getElementById('guardar-notas-btn');

        // si los elementos no existen, no continuamos para evitar errores
        if (!programaSelect || !semestreSelect || !cursoSelect || !notasContainer || !guardarBtn) {
            console.warn('Algunos elementos del DOM no fueron encontrados, el script de notas no se ejecutará.');
            return;
        }

        // --- Cargar Semestres al cambiar Programa ---
        programaSelect.addEventListener('change', function() {
            const idPrograma = this.value;
            semestreSelect.innerHTML = '<option value="">Cargando...</option>';
            cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
            notasContainer.innerHTML = ''; // limpiar tabla

            if (!idPrograma) {
                semestreSelect.innerHTML = '<option value="">Seleccionar semestre...</option>';
                return;
            }

            fetch(`ajax_get_semestres.php?id_programa=${idPrograma}`)
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

        // --- Cargar Cursos al cambiar Semestre ---
        semestreSelect.addEventListener('change', function() {
            const idPrograma = programaSelect.value;
            const semestre = this.value;
            cursoSelect.innerHTML = '<option value="">Cargando...</option>';
            notasContainer.innerHTML = ''; // limpiar tabla

            if (!idPrograma || !semestre) {
                cursoSelect.innerHTML = '<option value="">Seleccionar curso...</option>';
                return;
            }

            fetch(`ajax_get_cursos.php?id_programa=${idPrograma}&semestre=${semestre}`)
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

        // --- Mostrar Tabla de Notas al cambiar Curso ---
        cursoSelect.addEventListener('change', function() {
            const idCurso = this.value;
            
            if (!idCurso) {
                notasContainer.innerHTML = '<div class="text-center p-8 text-gray-500">Por favor, seleccione un curso para ver las calificaciones.</div>';
                return;
            }
            
            mostrarTablaNotas(idCurso);
        });

        // --- Lógica para la Tabla de Notas ---
        async function mostrarTablaNotas(idCurso) {
            notasContainer.innerHTML = '<div class="text-center p-8">Cargando estudiantes...</div>';

            try {
                const [estudiantesResponse, notasResponse] = await Promise.all([
                    fetch(`ajax_get_estudiantes.php?id_curso=${idCurso}`),
                    fetch(`ajax_get_notas.php?id_curso=${idCurso}`)
                ]);

                if (!estudiantesResponse.ok) throw new Error('Error al cargar los estudiantes.');
                if (!notasResponse.ok) throw new Error('Error al cargar las notas guardadas.');

                const estudiantes = await estudiantesResponse.json();
                const notasGuardadas = await notasResponse.json(); // { id_estudiante: { il1_n1: 15, ... } }

                if (estudiantes.length === 0) {
                    notasContainer.innerHTML = '<div class="text-center p-8 text-gray-500">No hay estudiantes matriculados en este curso.</div>';
                    return;
                }

                let tablaHtml = `
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th rowspan="2" class="px-2 py-3 bg-gray-50 border-r text-center align-middle">N°</th>
                                    <th rowspan="2" class="px-6 py-3 bg-gray-50 border-r align-middle">Estudiante</th>
                                    <th colspan="4" class="px-6 py-3 text-center border-r">Indicador de Logro 1</th>
                                    <th colspan="4" class="px-6 py-3 text-center border-r">Indicador de Logro 2</th>
                                    <th colspan="4" class="px-6 py-3 text-center border-r">Indicador de Logro 3</th>
                                    <th rowspan="2" class="px-2 py-3 text-center border-r align-middle">Actitudinal</th>
                                    <th rowspan="2" class="px-4 py-3 text-center align-middle">Promedio Final</th>
                                </tr>
                                <tr>
                                    <th class="px-2 py-2 text-center border-t">N1</th><th class="px-2 py-2 text-center border-t">N2</th><th class="px-2 py-2 text-center border-t">N3</th><th class="px-2 py-2 text-center border-t bg-gray-100">P1</th>
                                    <th class="px-2 py-2 text-center border-t">N1</th><th class="px-2 py-2 text-center border-t">N2</th><th class="px-2 py-2 text-center border-t">N3</th><th class="px-2 py-2 text-center border-t bg-gray-100">P2</th>
                                    <th class="px-2 py-2 text-center border-t">N1</th><th class="px-2 py-2 text-center border-t">N2</th><th class="px-2 py-2 text-center border-t">N3</th><th class="px-2 py-2 text-center border-t bg-gray-100">P3</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                `;

                estudiantes.forEach((estudiante, index) => {
                    const notas = notasGuardadas[estudiante.id_estudiante] || {};
                    const nombreCompleto = `${estudiante.apellido_paterno} ${estudiante.apellido_materno || ''}, ${estudiante.primer_nombre} ${estudiante.segundo_nombre || ''}`.replace(/\s+/g, ' ').trim();
                    
                    tablaHtml += `
                        <tr class="border-b" data-id-estudiante="${estudiante.id_estudiante}">
                            <td class="px-2 py-2 font-medium text-gray-900 bg-white border-r text-center">${index + 1}</td>
                            <td class="px-6 py-2 font-medium text-gray-900 bg-white border-r whitespace-nowrap">${nombreCompleto}</td>
                            
                            ${generarCeldasIndicador('il1', notas)}
                            ${generarCeldasIndicador('il2', notas)}
                            ${generarCeldasIndicador('il3', notas)}

                            <td class="p-0 text-center border-l"><input type="number" min="0" max="20" class="w-full h-full text-center border-0 focus:ring-1 focus:ring-red-500 nota-actitudinal" value="${notas.actitudinal || ''}"></td>
                            <td class="px-4 py-2 text-center font-bold bg-gray-100 promedio-final"></td>
                        </tr>
                    `;
                });

                tablaHtml += `</tbody></table></div>`;
                notasContainer.innerHTML = tablaHtml;
                
                // Añadir listeners para calcular promedios
                notasContainer.querySelectorAll('input[type="number"]').forEach(input => {
                    input.addEventListener('input', () => calcularPromediosFila(input.closest('tr')));
                });

                // Calcular promedios iniciales
                notasContainer.querySelectorAll('tbody tr').forEach(calcularPromediosFila);

            } catch (error) {
                console.error('Error al mostrar la tabla de notas:', error);
                notasContainer.innerHTML = '<div class="text-center p-8 text-red-500">Error al cargar los datos. Verifique que los servicios (ajax_get_estudiantes, ajax_get_notas) estén implementados correctamente.</div>';
            }
        }

        function generarCeldasIndicador(indicador, notas) {
            let celdas = '';
            for (let i = 1; i <= 3; i++) {
                const notaName = `${indicador}_n${i}`;
                celdas += `<td class="p-0 text-center border-l"><input type="number" min="0" max="20" class="w-full h-full text-center border-0 focus:ring-1 focus:ring-red-500 nota-${indicador}" data-nota-name="${notaName}" value="${notas[notaName] || ''}"></td>`;
            }
            celdas += `<td class="px-2 py-2 text-center font-semibold bg-gray-100 promedio-${indicador}"></td>`;
            return celdas;
        }

        function calcularPromediosFila(fila) {
            const idEstudiante = fila.dataset.idEstudiante;
            if (!idEstudiante) return;

            const promediosIndicadores = [];

            // Calcular promedio para cada indicador
            ['il1', 'il2', 'il3'].forEach(indicador => {
                const notasInputs = fila.querySelectorAll(`.nota-${indicador}`);
                const notasValidas = Array.from(notasInputs).map(i => parseFloat(i.value)).filter(n => !isNaN(n) && n >= 0 && n <= 20);
                const promedio = notasValidas.length > 0 ? (notasValidas.reduce((a, b) => a + b, 0) / notasValidas.length) : 0;
                fila.querySelector(`.promedio-${indicador}`).textContent = promedio.toFixed(2);
                if (promedio > 0) promediosIndicadores.push(promedio);
            });

            // Calcular promedio final
            const notaActitudinalInput = fila.querySelector('.nota-actitudinal');
            const notaActitudinal = parseFloat(notaActitudinalInput.value);
            const notasParaPromedioFinal = [...promediosIndicadores];
            if (!isNaN(notaActitudinal) && notaActitudinal >= 0 && notaActitudinal <= 20) {
                notasParaPromedioFinal.push(notaActitudinal);
            }

            const promedioFinal = notasParaPromedioFinal.length > 0 ? (notasParaPromedioFinal.reduce((a, b) => a + b, 0) / notasParaPromedioFinal.length) : 0;
            fila.querySelector('.promedio-final').textContent = promedioFinal.toFixed(2);
        }

        // --- Lógica para Guardar Notas ---
        guardarBtn.addEventListener('click', async () => {
            const idCurso = cursoSelect.value;
            if (!idCurso) {
                alert('Por favor, seleccione un curso primero.');
                return;
            }

            const filas = notasContainer.querySelectorAll('tbody tr');
            const datosNotas = [];

            filas.forEach(fila => {
                const idEstudiante = fila.getAttribute('data-id-estudiante');
                const inputs = fila.querySelectorAll('input[type="number"]');
                const notasEstudiante = { id_estudiante: idEstudiante };
                let tieneNota = false;

                inputs.forEach(input => {
                    const notaName = input.dataset.notaName || (input.classList.contains('nota-actitudinal') ? 'actitudinal' : null);
                    if (notaName && input.value !== '') {
                        notasEstudiante[notaName] = input.value;
                        tieneNota = true;
                    }
                });

                if (tieneNota) {
                    datosNotas.push(notasEstudiante);
                }
            });

            if (datosNotas.length === 0) {
                alert('No hay notas para guardar.');
                return;
            }

            guardarBtn.disabled = true;
            guardarBtn.textContent = 'Guardando...';

            try {
                const response = await fetch('ajax_guardar_notas.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_curso: idCurso,
                        notas: datosNotas
                    })
                });

                const resultado = await response.json();

                if (resultado.success) {
                    alert('Notas guardadas correctamente.');
                    mostrarTablaNotas(idCurso); // Recargar tabla
                } else {
                    throw new Error(resultado.message || 'Error desconocido al guardar.');
                }

            } catch (error) {
                console.error('Error al guardar las notas:', error);
                alert(`Error al guardar: ${error.message}`);
            } finally {
                guardarBtn.disabled = false;
                guardarBtn.innerHTML = `<span class="material-icons-round text-lg mr-2">save</span>Guardar Notas`;
            }
        });

    })();
</script>


