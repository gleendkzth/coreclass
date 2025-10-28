<?php
session_start();
header('Content-Type: application/json');

// Verificar autenticación y rol
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

// Obtener datos JSON del cuerpo de la solicitud
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['id_tarea']) || !isset($data['calificaciones'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
    exit;
}

$id_tarea = filter_var($data['id_tarea'], FILTER_VALIDATE_INT);
$calificaciones = $data['calificaciones'];

if (!$id_tarea || !is_array($calificaciones)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

try {
    // Verificar que el docente tenga acceso a esta tarea
    $stmt = $conn->prepare("
        SELECT id_tarea 
        FROM tarea 
        WHERE id_tarea = ? AND id_docente = (SELECT id_docente FROM docente WHERE id_usuario = ?)
    ");
    $stmt->bind_param("ii", $id_tarea, $id_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows === 0) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'No tienes permiso para calificar esta tarea.']);
        exit;
    }
    $stmt->close();

    // Iniciar transacción
    $conn->begin_transaction();

    $stmt = $conn->prepare("
        UPDATE tarea_entrega 
        SET calificacion = ?, observacion = ?
        WHERE id_entrega = ? AND id_tarea = ?
    ");

    $actualizados = 0;
    foreach ($calificaciones as $cal) {
        $id_entrega = filter_var($cal['id_entrega'], FILTER_VALIDATE_INT);
        $calificacion = isset($cal['calificacion']) && $cal['calificacion'] !== '' ? filter_var($cal['calificacion'], FILTER_VALIDATE_FLOAT) : null;
        $observacion = isset($cal['observacion']) && $cal['observacion'] !== '' ? trim($cal['observacion']) : null;

        if (!$id_entrega) continue;

        $stmt->bind_param("dsii", $calificacion, $observacion, $id_entrega, $id_tarea);
        
        if ($stmt->execute()) {
            $actualizados++;
        }
    }

    $stmt->close();
    $conn->commit();

    echo json_encode([
        'success' => true, 
        'message' => "Se actualizaron $actualizados calificaciones correctamente."
    ]);

} catch (Exception $e) {
    if (isset($conn)) {
        $conn->rollback();
    }
    error_log("Error en ajax_guardar_calificaciones.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al guardar: ' . $e->getMessage()]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
