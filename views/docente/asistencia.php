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

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Registro de Asistencia</h1>
            <p class="text-gray-500 mt-1">Registrar la asistencia de los estudiantes.</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div class="flex flex-wrap gap-4">
                    <!-- menu programa de estudios -->
                    <div class="w-full sm:w-auto">
                        <label for="programa-estudios-select" class="block text-sm font-medium text-gray-700">Programa de Estudios:</label>
                        <select id="programa-estudios-select" name="programa-estudios-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Seleccionar programa...</option>
                            <?php foreach ($programas as $programa): ?>
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

                    <!-- menu mes -->
                    <div class="w-full sm:w-auto">
                        <label for="mes-select" class="block text-sm font-medium text-gray-700">Seleccionar Mes:</label>
                        <select id="mes-select" name="mes-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <!-- opciones de meses se generaran con js -->
                        </select>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 mt-4 sm:mt-0 sm:self-end">
                    <button id="guardar-asistencia-btn" class="inline-flex items-center justify-center px-4 py-2 bg-red-800 text-white font-semibold rounded-lg hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300 shadow-md hover:shadow-lg">
                        <span class="material-icons-round text-lg mr-2">save</span>
                        Guardar Asistencia
                    </button>
                </div>
            </div>

            <!-- contenedor para la tabla de asistencia -->
            <div id="asistencia-container" class="mt-6">
                <!-- la tabla de asistencia se generara con js -->
            </div>
        </div>
    </div>

    <script>
        // se encapsula en una funcion autoejecutable (iife) para evitar conflictos de scope
        (() => {
            // el script es ejecutado por panel_docente.php, no necesita esperar al domcontentloaded
            const programaSelect = document.getElementById('programa-estudios-select');
            const semestreSelect = document.getElementById('semestre-select');
            const cursoSelect = document.getElementById('curso-select');
            const mesSelect = document.getElementById('mes-select');
            const asistenciaContainer = document.getElementById('asistencia-container');

            // si los elementos no existen, no continuamos para evitar errores en otras paginas
            if (!programaSelect || !semestreSelect || !cursoSelect || !mesSelect || !asistenciaContainer) {
                console.warn('Algunos elementos del DOM no fueron encontrados, el script de asistencia no se ejecutará completamente.');
                return;
            }

            // --- Cargar Semestres al cambiar Programa ---
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


            const meses = [
                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
            ];

            // --- inicio del bloque de código nuevo ---

            // --- Lógica para la Tabla de Asistencia ---
            const anioActual = new Date().getFullYear();

            async function mostrarTablaAsistencia(idCurso, mes, anio) {
                if (!idCurso) {
                    asistenciaContainer.innerHTML = '<div class="text-center p-8 text-gray-500">Por favor, seleccione un curso para ver la lista de asistencia.</div>';
                    return;
                }

                asistenciaContainer.innerHTML = '<div class="text-center p-8">Cargando estudiantes...</div>';

                try {
                    // obtener estudiantes y asistencias en paralelo
                    const [estudiantesResponse, asistenciaResponse] = await Promise.all([
                        fetch(`ajax_get_estudiantes.php?id_curso=${idCurso}`),
                        fetch(`ajax_get_asistencia.php?id_curso=${idCurso}&mes=${mes}&anio=${anio}`)
                    ]);

                    if (!estudiantesResponse.ok) throw new Error('Error al cargar los estudiantes.');
                    if (!asistenciaResponse.ok) throw new Error('Error al cargar la asistencia guardada.');

                    const estudiantes = await estudiantesResponse.json();
                    const asistenciaResult = await asistenciaResponse.json();
                    const asistenciasGuardadas = asistenciaResult.data || {};

                    if (estudiantes.length === 0) {
                        asistenciaContainer.innerHTML = '<div class="text-center p-8 text-gray-500">No hay estudiantes matriculados en este curso.</div>';
                        return;
                    }

                    const diasEnMes = new Date(anio, mes + 1, 0).getDate();
                    const diasSemana = { 'Mon': 'L', 'Tue': 'M', 'Wed': 'M', 'Thu': 'J', 'Fri': 'V' };

                    let tablaHtml = '<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-x-auto"><table class="min-w-full text-sm text-left text-gray-500">';
                    tablaHtml += '<thead class="text-xs text-gray-700 uppercase bg-gray-50"><tr>';
                    tablaHtml += '<th scope="col" class="w-12 px-2 py-3 bg-gray-50 border-r text-center">N°</th>';
                    tablaHtml += '<th scope="col" class="px-6 py-3 bg-gray-50 border-r">Estudiante</th>';

                    for (let dia = 1; dia <= diasEnMes; dia++) {
                        const fecha = new Date(anio, mes, dia);
                        const nombreDiaEn = fecha.toString().split(' ')[0];
                        if (diasSemana[nombreDiaEn]) {
                            const inicialDia = diasSemana[nombreDiaEn];
                            const claseLunes = inicialDia === 'L' ? 'bg-blue-50' : '';
                            tablaHtml += `<th scope='col' class='w-10 px-2 py-3 text-center border-l cursor-pointer ${claseLunes}' data-col='${dia}'>${inicialDia}<br>${String(dia).padStart(2, '0')}</th>`;
                        }
                    }
                    tablaHtml += '</tr></thead>';

                    tablaHtml += '<tbody>';
                    estudiantes.forEach((estudiante, index) => {
                        tablaHtml += `<tr class="bg-white border-b" data-row-id="${estudiante.id_estudiante}"><td class="w-12 px-2 py-1 font-medium text-gray-900 bg-white border-r text-center" data-cell-type="info-numero">${index + 1}</td>`;
                        const nombreCompleto = `${estudiante.apellido_paterno} ${estudiante.apellido_materno || ''}, ${estudiante.primer_nombre} ${estudiante.segundo_nombre || ''}`.replace(/\s+/g, ' ').trim();
                        tablaHtml += `<td class="px-6 py-1 font-medium text-gray-900 bg-white border-r whitespace-nowrap" data-cell-type="info-nombre">${nombreCompleto}</td>`;
                        
                        for (let dia = 1; dia <= diasEnMes; dia++) {
                            const fecha = new Date(anio, mes, dia);
                            const nombreDiaEn = fecha.toString().split(' ')[0];
                            if (diasSemana[nombreDiaEn]) {
                                const inicialDia = diasSemana[nombreDiaEn];
                                const claseLunes = inicialDia === 'L' ? 'bg-blue-50' : '';

                                const fechaStr = `${anio}-${String(mes + 1).padStart(2, '0')}-${String(dia).padStart(2, '0')}`;
                                const asistenciaKey = `${estudiante.id_estudiante}-${fechaStr}`;
                                const estadoGuardado = asistenciasGuardadas[asistenciaKey] || '';
                                
                                const opciones = ['P', 'F', 'T', 'J'];
                                let selectHtml = `<td class="w-10 p-0 text-center border-l ${claseLunes}" data-cell-type="asistencia" data-col='${dia}'><select class="w-full h-full border-0 text-center focus:ring-0 cursor-pointer bg-transparent appearance-none">`;
                                selectHtml += `<option value="" ${estadoGuardado === '' ? 'selected' : ''}></option>`;
                                opciones.forEach(op => {
                                    selectHtml += `<option value="${op}" ${estadoGuardado === op ? 'selected' : ''}>${op}</option>`;
                                });
                                selectHtml += '</select></td>';
                                tablaHtml += selectHtml;
                            }
                        }
                        tablaHtml += '</tr>';
                    });
                    tablaHtml += '</tbody></table></div>';
                                        asistenciaContainer.innerHTML = tablaHtml;

                    // --- Lógica de resaltado con JavaScript ---
                    const filas = asistenciaContainer.querySelectorAll('tr[data-row-id]');
                    filas.forEach(fila => {
                        const celdaNumero = fila.querySelector('[data-cell-type="info-numero"]');
                        const celdaNombre = fila.querySelector('[data-cell-type="info-nombre"]');
                        const celdasAsistencia = fila.querySelectorAll('[data-cell-type="asistencia"]');

                        const celdasInfo = [celdaNumero, celdaNombre];

                        celdasInfo.forEach(celda => {
                            if (!celda) return;
                            celda.addEventListener('mouseover', () => {
                                celdaNumero.classList.add('bg-gray-200');
                                celdaNombre.classList.add('bg-gray-200');
                            });
                            celda.addEventListener('mouseout', () => {
                                celdaNumero.classList.remove('bg-gray-200');
                                celdaNombre.classList.remove('bg-gray-200');
                            });
                        });

                        celdasAsistencia.forEach(celda => {
                            celda.addEventListener('mouseover', () => {
                                celda.classList.add('bg-gray-300');
                                celdaNumero.classList.add('bg-gray-200');
                                celdaNombre.classList.add('bg-gray-200');
                            });
                            celda.addEventListener('mouseout', () => {
                                celda.classList.remove('bg-gray-300');
                                celdaNumero.classList.remove('bg-gray-200');
                                celdaNombre.classList.remove('bg-gray-200');
                            });
                        });
                    });

                    // --- Lógica de resaltado de columnas ---
                    const headers = asistenciaContainer.querySelectorAll('th[data-col]');
                    headers.forEach(header => {
                        const col = header.getAttribute('data-col');
                        const celdasDeColumna = asistenciaContainer.querySelectorAll(`[data-col='${col}']`);

                        celdasDeColumna.forEach(celda => {
                            celda.addEventListener('mouseover', () => {
                                header.classList.add('bg-gray-200');
                            });
                            celda.addEventListener('mouseout', () => {
                                header.classList.remove('bg-gray-200');
                            });
                        });
                    });

                } catch (error) {
                    console.error('Error al mostrar la tabla de asistencia:', error);
                    asistenciaContainer.innerHTML = '<div class="text-center p-8 text-red-500">Error al cargar los datos. Intente de nuevo.</div>';
                }
            }

            // --- Event Listeners ---
            const actualizarTabla = () => {
                const idCurso = cursoSelect.value;
                const mesSeleccionado = parseInt(mesSelect.value);
                mostrarTablaAsistencia(idCurso, mesSeleccionado, anioActual);
            };

            cursoSelect.addEventListener('change', actualizarTabla);
            mesSelect.addEventListener('change', actualizarTabla);

            // --- Inicialización ---
            // Limpiar y poblar selector de mes
            mesSelect.innerHTML = '';
            meses.forEach((mes, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = mes;
                mesSelect.appendChild(option);
            });

            // Establecer mes actual y cargar tabla inicial (vacía)
            const mesActual = new Date().getMonth();
            mesSelect.value = mesActual;
            actualizarTabla(); // Llama a la función para mostrar el estado inicial

            // --- Lógica para Guardar Asistencia ---
            const guardarBtn = document.getElementById('guardar-asistencia-btn');
            guardarBtn.addEventListener('click', async () => {
                const idCurso = cursoSelect.value;
                if (!idCurso) {
                    alert('Por favor, seleccione un curso primero.');
                    return;
                }

                const filas = asistenciaContainer.querySelectorAll('tbody tr');
                const datosAsistencia = [];

                const mesSeleccionado = parseInt(mesSelect.value);
                const anioSeleccionado = anioActual;

                filas.forEach(fila => {
                    const idEstudiante = fila.getAttribute('data-row-id');
                    const selects = fila.querySelectorAll('select');

                    selects.forEach(select => {
                        const estado = select.value;
                        if (estado) { // solo enviar si se ha seleccionado algo
                            const dia = select.parentElement.getAttribute('data-col');
                            const fecha = `${anioSeleccionado}-${String(mesSeleccionado + 1).padStart(2, '0')}-${String(dia).padStart(2, '0')}`;
                            
                            datosAsistencia.push({
                                id_estudiante: idEstudiante,
                                fecha: fecha,
                                estado: estado
                            });
                        }
                    });
                });

                if (datosAsistencia.length === 0) {
                    alert('No hay datos de asistencia para guardar.');
                    return;
                }

                guardarBtn.disabled = true;
                guardarBtn.textContent = 'Guardando...';

                // log de depuración
                console.log('Guardando asistencia:', {
                    id_curso: idCurso,
                    mes: mesSeleccionado,
                    anio: anioSeleccionado,
                    cantidad_registros: datosAsistencia.length,
                    datos: datosAsistencia
                });

                try {
                    const response = await fetch('ajax_guardar_asistencia.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ 
                            id_curso: idCurso,
                            asistencias: datosAsistencia
                        })
                    });

                    const resultado = await response.json();
                    console.log('Resultado del guardado:', resultado);

                    if (resultado.success) {
                        alert('Asistencia guardada correctamente.');
                        // recargar la tabla para mostrar los datos guardados
                        mostrarTablaAsistencia(idCurso, mesSeleccionado, anioActual);
                    } else {
                        throw new Error(resultado.message || 'Error desconocido al guardar.');
                    }

                } catch (error) {
                    console.error('Error al guardar asistencia:', error);
                    alert(`Error al guardar: ${error.message}`);
                } finally {
                    guardarBtn.disabled = false;
                    guardarBtn.innerHTML = `<span class="material-icons-round text-lg mr-2">save</span>Guardar Asistencia`;
                }
            });

        })();
    </script>
