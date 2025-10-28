<?php
session_start();
header('Content-Type: application/json');

// verificar autenticacion y rol
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
    exit;
}

// verificar que sea una solicitud post
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

// validar datos de entrada
if (!isset($data['id_curso']) || !isset($data['asistencias']) || !is_array($data['asistencias'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Datos incompletos o en formato incorrecto.']);
    exit;
}

$id_curso = filter_var($data['id_curso'], FILTER_VALIDATE_INT);
$asistencias = $data['asistencias'];

// validacion critica para id_docente en la sesion
if (!isset($_SESSION['id_docente'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'No se encontró el ID del docente en la sesión. Por favor, cierre sesión y vuelva a iniciarla.']);
    exit;
}
$id_docente_session = $_SESSION['id_docente'];

if (!$id_curso) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'ID de curso no válido.']);
    exit;
}

// log temporal para depuración
error_log("[ASISTENCIA GUARDAR] Iniciando guardado - id_curso: $id_curso, id_docente: $id_docente_session, total_asistencias: " . count($asistencias));

$conn->begin_transaction();

try {
    // preparar las consultas una sola vez
    $stmt_get_matricula = $conn->prepare("SELECT mc.id_matricula_curso FROM matricula_curso mc JOIN matricula m ON mc.id_matricula = m.id_matricula WHERE mc.id_curso = ? AND m.id_estudiante = ?");
    
    $stmt_get_asistencia = $conn->prepare("SELECT id_asistencia FROM asistencia WHERE id_matricula_curso = ? AND fecha = ?");

    $stmt_insert_asistencia = $conn->prepare("INSERT INTO asistencia (id_matricula_curso, fecha, id_docente) VALUES (?, ?, ?)");
    
    $stmt_get_detalle = $conn->prepare("SELECT id_detalle FROM detalle_asistencia WHERE id_asistencia = ? AND id_estudiante = ?");

    $stmt_update_detalle = $conn->prepare("UPDATE detalle_asistencia SET estado = ?, hora_marcada = CURRENT_TIME WHERE id_detalle = ?");

    $stmt_insert_detalle = $conn->prepare("INSERT INTO detalle_asistencia (id_asistencia, id_estudiante, estado) VALUES (?, ?, ?)");

    foreach ($asistencias as $asistencia) {
        $id_estudiante = filter_var($asistencia['id_estudiante'], FILTER_VALIDATE_INT);
        $fecha = $asistencia['fecha'];
        $estado = $asistencia['estado'];

        if (!$id_estudiante || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $fecha) || !in_array($estado, ['P', 'F', 'T', 'J'])) {
            throw new Exception("Datos de asistencia inválidos para el estudiante ID: {$id_estudiante}");
        }

        // 1. obtener id_matricula_curso
        $stmt_get_matricula->bind_param("ii", $id_curso, $id_estudiante);
        $stmt_get_matricula->execute();
        $result_matricula = $stmt_get_matricula->get_result();
        $matricula_data = $result_matricula->fetch_assoc();

        if (!$matricula_data) {
            error_log("[ASISTENCIA GUARDAR] Estudiante $id_estudiante NO matriculado en curso $id_curso");
            continue; // el estudiante no esta matriculado en ese curso
        }
        $id_matricula_curso = $matricula_data['id_matricula_curso'];
        error_log("[ASISTENCIA GUARDAR] Estudiante: $id_estudiante, Fecha: $fecha, Estado: $estado, id_matricula_curso: $id_matricula_curso");

        // 2. buscar o crear el registro de asistencia
        $stmt_get_asistencia->bind_param("is", $id_matricula_curso, $fecha);
        $stmt_get_asistencia->execute();
        $result_asistencia = $stmt_get_asistencia->get_result();
        $asistencia_data = $result_asistencia->fetch_assoc();

        $id_asistencia = null;
        if ($asistencia_data) {
            $id_asistencia = $asistencia_data['id_asistencia'];
        } else {
            $stmt_insert_asistencia->bind_param("isi", $id_matricula_curso, $fecha, $id_docente_session);
            $stmt_insert_asistencia->execute();
            $id_asistencia = $stmt_insert_asistencia->insert_id;
        }

        if (!$id_asistencia) {
            throw new Exception("No se pudo crear o encontrar el registro de asistencia.");
        }

        // 3. buscar o crear el detalle de la asistencia
        $stmt_get_detalle->bind_param("ii", $id_asistencia, $id_estudiante);
        $stmt_get_detalle->execute();
        $result_detalle = $stmt_get_detalle->get_result();
        $detalle_data = $result_detalle->fetch_assoc();

        if ($detalle_data) { // si existe, actualizar
            $id_detalle = $detalle_data['id_detalle'];
            $stmt_update_detalle->bind_param("si", $estado, $id_detalle);
            $stmt_update_detalle->execute();
            error_log("[ASISTENCIA GUARDAR] ACTUALIZADO - id_detalle: $id_detalle, id_asistencia: $id_asistencia, estudiante: $id_estudiante, estado: $estado");
        } else { // si no existe, insertar
            $stmt_insert_detalle->bind_param("iis", $id_asistencia, $id_estudiante, $estado);
            $stmt_insert_detalle->execute();
            $id_detalle_nuevo = $stmt_insert_detalle->insert_id;
            error_log("[ASISTENCIA GUARDAR] INSERTADO - id_detalle: $id_detalle_nuevo, id_asistencia: $id_asistencia, estudiante: $id_estudiante, estado: $estado");
        }
    }

    $conn->commit();
    echo json_encode(['success' => true, 'message' => 'Asistencia guardada correctamente.']);

} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error en el servidor: ' . $e->getMessage()]);
} finally {
    // cerrar todos los statements
    $stmt_get_matricula->close();
    $stmt_get_asistencia->close();
    $stmt_insert_asistencia->close();
    $stmt_get_detalle->close();
    $stmt_update_detalle->close();
    $stmt_insert_detalle->close();
    $conn->close();
}
