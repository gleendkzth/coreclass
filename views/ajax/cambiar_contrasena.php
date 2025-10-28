<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/PerfilController.php';

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['usuario_autenticado']) || !$_SESSION['usuario_autenticado']) {
    echo json_encode(['success' => false, 'message' => 'No autorizado']);
    exit;
}

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// Obtener datos del formulario
$password_actual = $_POST['password_actual'] ?? '';
$password_nueva = $_POST['password_nueva'] ?? '';
$password_confirmar = $_POST['password_confirmar'] ?? '';

// Validar que los campos no estén vacíos
if (empty($password_actual) || empty($password_nueva) || empty($password_confirmar)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
    exit;
}

// Validar que las contraseñas nuevas coincidan
if ($password_nueva !== $password_confirmar) {
    echo json_encode(['success' => false, 'message' => 'Las contraseñas nuevas no coinciden']);
    exit;
}

// Validar longitud mínima
if (strlen($password_nueva) < 6) {
    echo json_encode(['success' => false, 'message' => 'La contraseña debe tener al menos 6 caracteres']);
    exit;
}

// Procesar cambio de contraseña
try {
    $perfilController = new PerfilController($conn);
    $resultado = $perfilController->cambiarContrasena(
        $_SESSION['id_usuario'],
        $password_actual,
        $password_nueva
    );
    
    if ($resultado) {
        echo json_encode(['success' => true, 'message' => 'Contraseña cambiada correctamente']);
    } else {
        echo json_encode(['success' => false, 'message' => 'La contraseña actual es incorrecta']);
    }
} catch (Exception $e) {
    error_log("Error al cambiar contraseña: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error al procesar la solicitud']);
}
?>
