<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../models/Estudiante.php';

session_start();

// verificar autenticación y rol de docente
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso denegado']);
    exit;
}

$id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_VALIDATE_INT);

if (!$id_curso) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de curso no válido']);
    exit;
}

$estudianteModel = new Estudiante($conn);
$estudiantes = $estudianteModel->obtenerEstudiantesPorCurso($id_curso);

header('Content-Type: application/json');

if ($estudiantes) {
    echo json_encode($estudiantes);
} else {
    // si no hay estudiantes, devolver un array vacío
    echo json_encode([]);
}
?>
