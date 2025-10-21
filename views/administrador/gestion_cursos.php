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

// Obtener listas para los selects del formulario
$programas = $conn->query("SELECT id_programa, nombre FROM ProgramaEstudio ORDER BY nombre")->fetch_all(MYSQLI_ASSOC);
$docentes = $conn->query("SELECT d.id_docente, u.nombre, u.apellido FROM Docente d JOIN Usuario u ON d.id_usuario = u.id_usuario ORDER BY u.apellido")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_programa = $_POST['id_programa'] ?? null;
    $id_docente = $_POST['id_docente'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $creditos = $_POST['creditos'] ?? 0;
    $semestre = $_POST['semestre'] ?? '';

    switch ($accion) {
        case 'crear':
            if (!empty($nombre) && !empty($id_programa) && !empty($semestre)) {
                $stmt = $conn->prepare("INSERT INTO Curso (id_programa, id_docente, nombre, creditos, semestre) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param('iisss', $id_programa, $id_docente, $nombre, $creditos, $semestre);
                if ($stmt->execute()) $success = 'Curso creado exitosamente.';
                else $error = 'Error al crear el curso.';
            } else {
                $error = 'Nombre, programa y semestre son obligatorios.';
            }
            break;
        case 'editar':
            if (!empty($id_curso) && !empty($nombre)) {
                $stmt = $conn->prepare("UPDATE Curso SET id_programa = ?, id_docente = ?, nombre = ?, creditos = ?, semestre = ? WHERE id_curso = ?");
                $stmt->bind_param('iisssi', $id_programa, $id_docente, $nombre, $creditos, $semestre, $id_curso);
                if ($stmt->execute()) $success = 'Curso actualizado exitosamente.';
                else $error = 'Error al actualizar el curso.';
            } else {
                $error = 'Faltan datos para actualizar.';
            }
            break;
        case 'eliminar':
            if (!empty($id_curso)) {
                $stmt = $conn->prepare("DELETE FROM Curso WHERE id_curso = ?");
                $stmt->bind_param('i', $id_curso);
                if ($stmt->execute()) $success = 'Curso eliminado exitosamente.';
                else $error = 'Error al eliminar el curso.';
            }
            break;
    }
}

// Obtener datos de un curso para editar
$curso_a_editar = null;
if ($accion === 'mostrar_editar' && $id_curso) {
    $stmt = $conn->prepare("SELECT * FROM Curso WHERE id_curso = ?");
    $stmt->bind_param('i', $id_curso);
    $stmt->execute();
    $curso_a_editar = $stmt->get_result()->fetch_assoc();
}

// Obtener lista de cursos
$cursos = $conn->query("
    SELECT c.*, p.nombre as nombre_programa, CONCAT(u.nombre, ' ', u.apellido) as nombre_docente
    FROM Curso c
    JOIN ProgramaEstudio p ON c.id_programa = p.id_programa
    LEFT JOIN Docente d ON c.id_docente = d.id_docente
    LEFT JOIN Usuario u ON d.id_usuario = u.id_usuario
    ORDER BY c.nombre
")->fetch_all(MYSQLI_ASSOC);
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestión de Cursos</h1>

    <?php if ($error) echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4'>$error</div>"; ?>
    <?php if ($success) echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>$success</div>"; ?>

    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4"><?= $curso_a_editar ? 'Editar' : 'Añadir Nuevo'; ?> Curso</h2>
        <form action="gestion_cursos.php" method="POST">
            <input type="hidden" name="accion" value="<?= $curso_a_editar ? 'editar' : 'crear'; ?>">
            <?php if ($curso_a_editar) echo "<input type='hidden' name='id_curso' value='{$curso_a_editar['id_curso']}'>"; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <input type="text" name="nombre" placeholder="Nombre del Curso" class="w-full p-2 border rounded" required value="<?= htmlspecialchars($curso_a_editar['nombre'] ?? ''); ?>">
                <input type="number" name="creditos" placeholder="Créditos" class="w-full p-2 border rounded" value="<?= htmlspecialchars($curso_a_editar['creditos'] ?? ''); ?>">
                <select name="semestre" class="w-full p-2 border rounded" required>
                    <option value="">Seleccionar Semestre</option>
                    <?php foreach (['I', 'II', 'III', 'IV', 'V', 'VI'] as $sem): ?>
                        <option value="<?= $sem; ?>" <?= (isset($curso_a_editar) && $curso_a_editar['semestre'] == $sem) ? 'selected' : ''; ?>><?= $sem; ?> Semestre</option>
                    <?php endforeach; ?>
                </select>
                <select name="id_programa" class="w-full p-2 border rounded" required>
                    <option value="">Seleccionar Programa</option>
                    <?php foreach ($programas as $p) echo "<option value='{$p['id_programa']}' ".((isset($curso_a_editar) && $curso_a_editar['id_programa'] == $p['id_programa']) ? 'selected' : '').">{$p['nombre']}</option>"; ?>
                </select>
                <select name="id_docente" class="w-full p-2 border rounded">
                    <option value="">Asignar Docente (Opcional)</option>
                    <?php foreach ($docentes as $d) echo "<option value='{$d['id_docente']}' ".((isset($curso_a_editar) && $curso_a_editar['id_docente'] == $d['id_docente']) ? 'selected' : '').">{$d['apellido']}, {$d['nombre']}</option>"; ?>
                </select>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-800"><?= $curso_a_editar ? 'Actualizar' : 'Guardar'; ?></button>
                <?php if ($curso_a_editar) echo '<a href="gestion_cursos.php" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-300 ml-2">Cancelar</a>'; ?>
            </div>
        </form>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Cursos Registrados</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">Curso</th>
                        <th class="px-4 py-2 text-left">Programa</th>
                        <th class="px-4 py-2 text-left">Docente</th>
                        <th class="px-4 py-2 text-left">Semestre</th>
                        <th class="px-4 py-2 text-left">Créditos</th>
                        <th class="px-4 py-2 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    <?php if (empty($cursos)): ?>
                        <tr><td colspan="6" class="p-4 text-center text-gray-500">No hay cursos registrados.</td></tr>
                    <?php else: foreach ($cursos as $curso): ?>
                        <tr>
                            <td class="p-2"><?= htmlspecialchars($curso['nombre']); ?></td>
                            <td class="p-2"><?= htmlspecialchars($curso['nombre_programa']); ?></td>
                            <td class="p-2"><?= htmlspecialchars($curso['nombre_docente'] ?? 'No asignado'); ?></td>
                            <td class="p-2"><?= htmlspecialchars($curso['semestre']); ?></td>
                            <td class="p-2"><?= htmlspecialchars($curso['creditos']); ?></td>
                            <td class="p-2 text-right">
                                <a href="gestion_cursos.php?accion=mostrar_editar&id_curso=<?= $curso['id_curso']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-2">Editar</a>
                                <form action="gestion_cursos.php" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este curso?');">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="id_curso" value="<?= $curso['id_curso']; ?>">
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
