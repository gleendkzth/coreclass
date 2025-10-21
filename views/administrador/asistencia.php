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
$id_asistencia = $_POST['id_asistencia'] ?? $_GET['id_asistencia'] ?? null;

$error = null;
$success = null;

// Manejar edición
if ($accion === 'editar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $estado = $_POST['estado'] ?? '';
    $observacion = $_POST['observacion'] ?? '';
    if ($id_asistencia && $estado) {
        $stmt = $conn->prepare("UPDATE Asistencia SET estado = ?, observacion = ? WHERE id_asistencia = ?");
        $stmt->bind_param('ssi', $estado, $observacion, $id_asistencia);
        if ($stmt->execute()) $success = 'Asistencia actualizada.';
        else $error = 'Error al actualizar.';
    }
}

// Obtener datos para filtros
$cursos = $conn->query("SELECT id_curso, nombre FROM Curso ORDER BY nombre")->fetch_all(MYSQLI_ASSOC);

// Construir consulta con filtros
$sql = "
    SELECT a.id_asistencia, a.fecha, a.estado, a.observacion, 
           CONCAT(u.apellido, ', ', u.nombre) as nombre_estudiante, c.nombre as nombre_curso
    FROM Asistencia a
    JOIN MatriculaCurso mc ON a.id_matricula_curso = mc.id_matricula_curso
    JOIN Matricula m ON mc.id_matricula = m.id_matricula
    JOIN Estudiante e ON m.id_estudiante = e.id_estudiante
    JOIN Usuario u ON e.id_usuario = u.id_usuario
    JOIN Curso c ON mc.id_curso = c.id_curso
    WHERE 1=1
";

if (!empty($_GET['q'])) {
    $q = $conn->real_escape_string($_GET['q']);
    $sql .= " AND (u.nombre LIKE '%$q%' OR u.apellido LIKE '%$q%')";
}
if (!empty($_GET['curso'])) {
    $id_c = (int)$_GET['curso'];
    $sql .= " AND c.id_curso = $id_c";
}
if (!empty($_GET['fecha'])) {
    $fecha = $conn->real_escape_string($_GET['fecha']);
    $sql .= " AND a.fecha = '$fecha'";
}

$sql .= " ORDER BY a.fecha DESC, nombre_estudiante ASC LIMIT 50";
$asistencias = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

// Obtener datos para editar
$asistencia_a_editar = null;
if ($accion === 'mostrar_editar' && $id_asistencia) {
    $stmt = $conn->prepare("SELECT * FROM Asistencia WHERE id_asistencia = ?");
    $stmt->bind_param('i', $id_asistencia);
    $stmt->execute();
    $asistencia_a_editar = $stmt->get_result()->fetch_assoc();
}

?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Asistencia Institucional</h1>

    <?php if ($error) echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4'>$error</div>"; ?>
    <?php if ($success) echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>$success</div>"; ?>

    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="asistencia.php" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <input type="text" name="q" placeholder="Buscar estudiante..." class="border-gray-300 rounded-lg" value="<?= htmlspecialchars($_GET['q'] ?? ''); ?>">
                <select name="curso" class="border-gray-300 rounded-lg">
                    <option value="">Todos los Cursos</option>
                    <?php foreach ($cursos as $c) echo "<option value='{$c['id_curso']}' ".((isset($_GET['curso']) && $_GET['curso'] == $c['id_curso']) ? 'selected' : '').">{$c['nombre']}</option>"; ?>
                </select>
                <input type="date" name="fecha" class="border-gray-300 rounded-lg" value="<?= htmlspecialchars($_GET['fecha'] ?? ''); ?>">
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded-lg">Filtrar</button>
            </div>
        </form>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 border-b-2 text-left">Estudiante</th>
                    <th class="px-5 py-3 border-b-2 text-left">Curso</th>
                    <th class="px-5 py-3 border-b-2 text-left">Fecha</th>
                    <th class="px-5 py-3 border-b-2 text-left">Estado</th>
                    <th class="px-5 py-3 border-b-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if (empty($asistencias)): ?>
                    <tr><td colspan="5" class="p-4 text-center text-gray-500">No hay registros de asistencia.</td></tr>
                <?php else: foreach ($asistencias as $a): ?>
                    <tr>
                        <td class="p-3"><?= htmlspecialchars($a['nombre_estudiante']); ?></td>
                        <td class="p-3"><?= htmlspecialchars($a['nombre_curso']); ?></td>
                        <td class="p-3"><?= htmlspecialchars($a['fecha']); ?></td>
                        <td class="p-3"><span class="px-2 py-1 font-semibold text-xs rounded-full bg-<?= strtolower($a['estado']) === 'presente' ? 'green' : (strtolower($a['estado']) === 'tarde' ? 'yellow' : 'red'); ?>-100 text-<?= strtolower($a['estado']) === 'presente' ? 'green' : (strtolower($a['estado']) === 'tarde' ? 'yellow' : 'red'); ?>-800"><?= htmlspecialchars($a['estado']); ?></span></td>
                        <td class="p-3 text-center"><a href="asistencia.php?accion=mostrar_editar&id_asistencia=<?= $a['id_asistencia']; ?>" class="text-indigo-600">Editar</a></td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($accion === 'mostrar_editar' && $asistencia_a_editar): ?>
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Corregir Asistencia</h3>
        <form action="asistencia.php" method="POST">
            <input type="hidden" name="accion" value="editar">
            <input type="hidden" name="id_asistencia" value="<?= $asistencia_a_editar['id_asistencia']; ?>">
            <div class="mb-4">
                <label class="block text-sm">Estado</label>
                <select name="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <?php foreach (['Presente', 'Tarde', 'Ausente'] as $e): ?>
                        <option value="<?= $e; ?>" <?= ($asistencia_a_editar['estado'] == $e) ? 'selected' : ''; ?>><?= $e; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm">Observación</label>
                <textarea name="observacion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><?= htmlspecialchars($asistencia_a_editar['observacion'] ?? ''); ?></textarea>
            </div>
            <div class="flex justify-end pt-4 border-t mt-5">
                <a href="asistencia.php" class="bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg mr-2">Cancelar</a>
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded-lg">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>
