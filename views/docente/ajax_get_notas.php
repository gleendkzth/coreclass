<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

header('Content-Type: application/json');

$docenteController = new DocenteController($conn);

$idCurso = isset($_GET['id_curso']) ? intval($_GET['id_curso']) : 0;

if ($idCurso > 0) {
    // Se necesita un nuevo método en el controlador para obtener las notas por curso
    $notas = $docenteController->obtenerNotasPorCurso($idCurso);
    echo json_encode($notas);
} else {
    echo json_encode([]);
}
