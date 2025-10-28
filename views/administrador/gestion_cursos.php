<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}

require_once '../../config/conexion.php';

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
$id_curso = $_POST['id_curso'] ?? $_GET['id_curso'] ?? null;

$error = null;
$success = null;

// obtener listas para los selects del formulario
$programas = $conn->query("SELECT id_programa, nombre FROM programa_estudio ORDER BY nombre")->fetch_all(MYSQLI_ASSOC);
$docentes = $conn->query("SELECT d.id_docente, u.primer_nombre, u.apellido_paterno FROM docente d JOIN usuario u ON d.id_usuario = u.id_usuario ORDER BY u.apellido_paterno")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_programa = $_POST['id_programa'] ?? null;
    // asegurar que el id_docente sea null si está vacío, para evitar problemas con la clave foránea
    $id_docente = !empty($_POST['id_docente']) ? $_POST['id_docente'] : null;
    $nombre = $_POST['nombre'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $creditos = $_POST['creditos'] ?? 0;
    $semestre = $_POST['semestre'] ?? '';
    $fecha_inicio = !empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
    $fecha_fin = !empty($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

    switch ($accion) {
        case 'crear':
            if (!empty($nombre) && !empty($id_programa) && !empty($semestre)) {
                $stmt = $conn->prepare("INSERT INTO curso (id_programa, id_docente, nombre, descripcion, creditos, semestre, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param('iississs', $id_programa, $id_docente, $nombre, $descripcion, $creditos, $semestre, $fecha_inicio, $fecha_fin);
                if ($stmt->execute()) {
                    $success = 'Curso creado exitosamente.';
                } else {
                    $error = 'Error al crear el curso: ' . $stmt->error;
                }
            } else {
                $error = 'Nombre, programa y semestre son obligatorios.';
            }
            break;
        case 'editar':
            if (!empty($id_curso) && !empty($nombre)) {
                $stmt = $conn->prepare("UPDATE curso SET id_programa = ?, id_docente = ?, nombre = ?, descripcion = ?, creditos = ?, semestre = ?, fecha_inicio = ?, fecha_fin = ? WHERE id_curso = ?");
                $stmt->bind_param('iississsi', $id_programa, $id_docente, $nombre, $descripcion, $creditos, $semestre, $fecha_inicio, $fecha_fin, $id_curso);
                if ($stmt->execute()) {
                    $success = 'Curso actualizado exitosamente.';
                } else {
                    $error = 'Error al actualizar el curso: ' . $stmt->error;
                }
            } else {
                $error = 'Faltan datos para actualizar.';
            }
            break;
        case 'eliminar':
            if (!empty($id_curso)) {
                $stmt = $conn->prepare("DELETE FROM curso WHERE id_curso = ?");
                $stmt->bind_param('i', $id_curso);
                if ($stmt->execute()) {
                    $success = 'Curso eliminado exitosamente.';
                } else {
                    $error = 'Error al eliminar el curso: ' . $stmt->error;
                }
            }
            break;
    }
}

// obtener datos de un curso para editar
$curso_a_editar = null;
if ($accion === 'mostrar_editar' && $id_curso) {
    $stmt = $conn->prepare("SELECT * FROM curso WHERE id_curso = ?");
    $stmt->bind_param('i', $id_curso);
    $stmt->execute();
    $curso_a_editar = $stmt->get_result()->fetch_assoc();
}

// obtener lista de cursos
$cursos = $conn->query("
    SELECT c.*, p.nombre as nombre_programa, CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre_docente
    FROM curso c
    JOIN programa_estudio p ON c.id_programa = p.id_programa
    LEFT JOIN docente d ON c.id_docente = d.id_docente
    LEFT JOIN usuario u ON d.id_usuario = u.id_usuario
    ORDER BY c.nombre
")->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestión de Cursos</h1>

    <?php if ($error) echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4'>$error</div>"; ?>
    <?php if ($success) echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>$success</div>"; ?>

    <!-- Botón para mostrar/ocultar formulario -->
    <div class="flex justify-end mb-4">
        <button id="toggleFormBtnCursos" 
                class="px-6 py-3 bg-gradient-to-r from-red-700 to-red-800 text-white font-semibold rounded-lg hover:from-red-800 hover:to-red-900 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span id="btnTextCursos">Registrar Nuevo Curso</span>
        </button>
    </div>

    <div id="formContainerCursos" class="bg-white p-8 rounded-xl shadow-lg mb-8 border border-gray-100 <?= $curso_a_editar ? '' : 'hidden'; ?>">
        <div class="flex items-center mb-6">
            <div class="w-1 h-8 bg-gradient-to-b from-red-700 to-red-900 rounded-full mr-3"></div>
            <h2 class="text-2xl font-bold text-gray-800"><?= $curso_a_editar ? 'Editar' : 'Añadir Nuevo'; ?> Curso</h2>
        </div>
        
        <form action="gestion_cursos.php" method="POST" class="space-y-6">
            <input type="hidden" name="accion" value="<?= $curso_a_editar ? 'editar' : 'crear'; ?>">
            <?php if ($curso_a_editar) echo "<input type='hidden' name='id_curso' value='{$curso_a_editar['id_curso']}'>"; ?>

            <!-- Información Básica del Curso -->
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Información Básica
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nombre del Curso <span class="text-red-600">*</span>
                        </label>
                        <input type="text" id="nombre" name="nombre" 
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                               placeholder="Ej: Matemáticas Avanzadas" 
                               required 
                               value="<?= htmlspecialchars($curso_a_editar['nombre'] ?? ''); ?>">
                    </div>

                    <div>
                        <label for="id_programa" class="block text-sm font-semibold text-gray-700 mb-2">
                            Programa de Estudio <span class="text-red-600">*</span>
                        </label>
                        <select id="id_programa" name="id_programa" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                                required>
                            <option value="">Seleccionar Programa</option>
                            <?php foreach ($programas as $p) echo "<option value='{$p['id_programa']}' ".((isset($curso_a_editar) && $curso_a_editar['id_programa'] == $p['id_programa']) ? 'selected' : '').">{$p['nombre']}</option>"; ?>
                        </select>
                    </div>

                    <div>
                        <label for="semestre" class="block text-sm font-semibold text-gray-700 mb-2">
                            Semestre <span class="text-red-600">*</span>
                        </label>
                        <select id="semestre" name="semestre" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                                required>
                            <option value="">Seleccionar Semestre</option>
                            <?php foreach (['I', 'II', 'III', 'IV', 'V', 'VI'] as $sem): ?>
                                <option value="<?= $sem; ?>" <?= (isset($curso_a_editar) && $curso_a_editar['semestre'] == $sem) ? 'selected' : ''; ?>><?= $sem; ?> Semestre</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="creditos" class="block text-sm font-semibold text-gray-700 mb-2">
                            Créditos
                        </label>
                        <input type="number" id="creditos" name="creditos" 
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                               placeholder="Ej: 4" 
                               min="0" 
                               value="<?= htmlspecialchars($curso_a_editar['creditos'] ?? ''); ?>">
                    </div>

                    <div class="md:col-span-2">
                        <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-2">
                            Descripción del Curso
                        </label>
                        <textarea id="descripcion" name="descripcion" 
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                                  rows="3" 
                                  placeholder="Describe brevemente el contenido y objetivos del curso..."><?= htmlspecialchars($curso_a_editar['descripcion'] ?? ''); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Asignación de Docente -->
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Asignación de Docente
                </h3>
                <div>
                    <label for="id_docente" class="block text-sm font-semibold text-gray-700 mb-2">
                        Docente Asignado <span class="text-gray-500 text-xs">(Opcional)</span>
                    </label>
                    <select id="id_docente" name="id_docente" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                        <option value="">Sin asignar</option>
                        <?php foreach ($docentes as $d) echo "<option value='{$d['id_docente']}' ".((isset($curso_a_editar) && $curso_a_editar['id_docente'] == $d['id_docente']) ? 'selected' : '').">{$d['apellido_paterno']}, {$d['primer_nombre']}</option>"; ?>
                    </select>
                </div>
            </div>

            <!-- Fechas del Curso -->
            <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Período del Curso
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="fecha_inicio" class="block text-sm font-semibold text-gray-700 mb-2">
                            Fecha de Inicio
                        </label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" 
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                               value="<?= htmlspecialchars($curso_a_editar['fecha_inicio'] ?? ''); ?>">
                    </div>

                    <div>
                        <label for="fecha_fin" class="block text-sm font-semibold text-gray-700 mb-2">
                            Fecha de Finalización
                        </label>
                        <input type="date" id="fecha_fin" name="fecha_fin" 
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200" 
                               value="<?= htmlspecialchars($curso_a_editar['fecha_fin'] ?? ''); ?>">
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="flex justify-end items-center space-x-3 pt-4 border-t border-gray-200">
                <?php if ($curso_a_editar): ?>
                    <a href="gestion_cursos.php" 
                       class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-all duration-200 border border-gray-300">
                        Cancelar
                    </a>
                <?php endif; ?>
                <button type="submit" 
                        class="px-6 py-2.5 bg-gradient-to-r from-red-700 to-red-800 text-white font-semibold rounded-lg hover:from-red-800 hover:to-red-900 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                    <?= $curso_a_editar ? '✓ Actualizar Curso' : '+ Guardar Curso'; ?>
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Cursos Registrados</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-red-800 to-red-900 text-white">
                        <th class="px-4 py-3 text-left text-sm font-semibold">Curso</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Programa</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Docente</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Semestre</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Créditos</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">F. Inicio</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">F. Fin</th>
                        <th class="px-4 py-3 text-right text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($cursos)): ?>
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center">
                                <div class="bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-lg">
                                    <h3 class="font-semibold text-lg">No hay cursos registrados</h3>
                                    <p class="mt-1">Cuando agregues un curso, aparecerá aquí.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($cursos as $curso): ?>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-4 py-3">
                                    <div class="text-sm font-semibold text-gray-900"><?= htmlspecialchars($curso['nombre']); ?></div>
                                    <div class="text-xs text-gray-600 mt-0.5"><?= htmlspecialchars(substr($curso['descripcion'], 0, 70)); ?>...</div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <?= htmlspecialchars($curso['nombre_programa']); ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-xs text-gray-700"><?= htmlspecialchars($curso['nombre_docente'] ?? 'No asignado'); ?></span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                        <?= htmlspecialchars($curso['semestre']); ?>
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-xs font-semibold text-gray-700"><?= htmlspecialchars($curso['creditos']); ?></span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-xs text-gray-600"><?= htmlspecialchars($curso['fecha_inicio']); ?></span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-xs text-gray-600"><?= htmlspecialchars($curso['fecha_fin']); ?></span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex justify-end items-center space-x-2">
                                        <a href="gestion_cursos.php?accion=mostrar_editar&id_curso=<?= $curso['id_curso']; ?>" class="text-xs font-medium text-blue-600 hover:text-blue-800 transition-colors">
                                            Editar
                                        </a>
                                        <form action="gestion_cursos.php" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este curso?');">
                                            <input type="hidden" name="accion" value="eliminar">
                                            <input type="hidden" name="id_curso" value="<?= $curso['id_curso']; ?>">
                                            <button type="submit" class="text-xs font-medium text-red-600 hover:text-red-800 transition-colors">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
// Script para mostrar/ocultar el formulario de registro de cursos
const toggleBtnCursos = document.getElementById('toggleFormBtnCursos');
const formContainerCursos = document.getElementById('formContainerCursos');
const btnTextCursos = document.getElementById('btnTextCursos');

// Inicializar el estado del botón al cargar la página
if (formContainerCursos && !formContainerCursos.classList.contains('hidden')) {
    btnTextCursos.textContent = 'Ocultar Registro';
    toggleBtnCursos.querySelector('svg path').setAttribute('d', 'M20 12H4');
}

if (toggleBtnCursos) {
    toggleBtnCursos.addEventListener('click', function() {
        if (formContainerCursos.classList.contains('hidden')) {
            // Mostrar formulario
            formContainerCursos.classList.remove('hidden');
            btnTextCursos.textContent = 'Ocultar Registro';
            // Cambiar icono a minus
            this.querySelector('svg path').setAttribute('d', 'M20 12H4');
        } else {
            // Ocultar formulario
            formContainerCursos.classList.add('hidden');
            btnTextCursos.textContent = 'Registrar Nuevo Curso';
            // Cambiar icono a plus
            this.querySelector('svg path').setAttribute('d', 'M12 4v16m8-8H4');
        }
    });
}
</script>
