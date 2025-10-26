<?php
session_start();
header('Content-Type: application/json');

// validación de seguridad y de datos
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente' || !isset($_GET['id_programa'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso no autorizado o faltan datos.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$id_usuario = $_SESSION['id_usuario'];
$id_programa = filter_var($_GET['id_programa'], FILTER_VALIDATE_INT);

if ($id_programa === false) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de programa inválido.']);
    exit;
}

$docenteController = new DocenteController($conn);
$semestres = $docenteController->obtenerSemestresParaDocente($id_usuario, $id_programa);

echo json_encode($semestres);
?>
