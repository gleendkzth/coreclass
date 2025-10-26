<?php
session_start();
header('Content-Type: application/json');

// validación de seguridad y de datos
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente' || !isset($_GET['id_programa']) || !isset($_GET['semestre'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Acceso no autorizado o faltan datos.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$id_usuario = $_SESSION['id_usuario'];
$id_programa = filter_var($_GET['id_programa'], FILTER_VALIDATE_INT);
$semestre = $_GET['semestre']; // El semestre es un string, no necesita validación de INT

if ($id_programa === false) {
    http_response_code(400);
    echo json_encode(['error' => 'ID de programa inválido.']);
    exit;
}

$docenteController = new DocenteController($conn);
$cursos = $docenteController->obtenerCursosParaDocente($id_usuario, $id_programa, $semestre);

echo json_encode($cursos);
?>
