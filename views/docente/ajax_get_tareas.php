<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

// Obtener id_docente desde la sesión
$id_usuario = $_SESSION['id_usuario'];
$stmt_docente = $conn->prepare("SELECT id_docente FROM docente WHERE id_usuario = ?");
$stmt_docente->bind_param("i", $id_usuario);
$stmt_docente->execute();
$result_docente = $stmt_docente->get_result();
if (!($docente_row = $result_docente->fetch_assoc())) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'No se pudo identificar al docente.']);
    exit;
}
$id_docente = $docente_row['id_docente'];
$stmt_docente->close();

// Filtrado (opcional, pero bueno tenerlo)
$id_programa = filter_input(INPUT_GET, 'id_programa', FILTER_VALIDATE_INT);
$semestre = filter_input(INPUT_GET, 'semestre', FILTER_SANITIZE_STRING);
$id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_VALIDATE_INT);

$sql = "SELECT 
            t.id_tarea,
            t.titulo,
            t.fecha_publicacion as fecha_creacion, 
            c.nombre as curso,
            p.nombre as programa,
            t.semestre,
            (CASE WHEN t.fecha_limite >= CURDATE() THEN 'En curso' ELSE 'Finalizado' END) as estado
        FROM tarea t
        JOIN curso c ON t.id_curso = c.id_curso
        JOIN programa_estudio p ON t.id_programa = p.id_programa
        WHERE t.id_docente = ?";

$params = ['i', $id_docente];

if ($id_programa) {
    $sql .= " AND t.id_programa = ?";
    $params[0] .= 'i';
    $params[] = $id_programa;
}
if ($semestre) {
    $sql .= " AND t.semestre = ?";
    $params[0] .= 's';
    $params[] = $semestre;
}
if ($id_curso) {
    $sql .= " AND t.id_curso = ?";
    $params[0] .= 'i';
    $params[] = $id_curso;
}

$sql .= " ORDER BY t.fecha_publicacion DESC";

try {
    $stmt = $conn->prepare($sql);
    if (count($params) > 1) {
        $stmt->bind_param(...$params);
    }
    $stmt->execute();
    $resultado = $stmt->get_result();
    $tareas = $resultado->fetch_all(MYSQLI_ASSOC);

    echo json_encode(['success' => true, 'data' => $tareas]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
