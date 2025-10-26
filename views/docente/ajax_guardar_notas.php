<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$idCurso = $data['id_curso'] ?? 0;
$notas = $data['notas'] ?? [];

if ($idCurso > 0 && !empty($notas)) {
    $docenteController = new DocenteController($conn);
    // Se necesita un nuevo método en el controlador para guardar esta estructura de notas
    $resultado = $docenteController->guardarNotasCurso($idCurso, $notas);

    if ($resultado) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No se pudieron guardar las notas.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
}
