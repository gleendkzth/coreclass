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

// Validar parámetros de entrada
$id_tarea = filter_input(INPUT_GET, 'id_tarea', FILTER_VALIDATE_INT);
$id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_VALIDATE_INT);

if (!$id_tarea || !$id_curso) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Parámetros inválidos.']);
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

try {
    // Verificar que el docente tenga acceso a esta tarea
    $stmt_verify = $conn->prepare("
        SELECT id_tarea 
        FROM tarea 
        WHERE id_tarea = ? AND id_docente = (SELECT id_docente FROM docente WHERE id_usuario = ?)
    ");
    $stmt_verify->bind_param("ii", $id_tarea, $id_usuario);
    $stmt_verify->execute();
    $resultado = $stmt_verify->get_result();
    
    if ($resultado->num_rows === 0) {
        $stmt_verify->close();
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'No tienes permiso para ver esta tarea.']);
        exit;
    }
    $stmt_verify->close();

    // Obtener estudiantes del curso con sus entregas (si existen)
    // Filtra comparando programa y semestre de matrícula con programa y semestre del curso
    $sql = "SELECT DISTINCT
                e.id_estudiante,
                u.primer_nombre,
                u.segundo_nombre,
                u.apellido_paterno,
                u.apellido_materno,
                te.id_entrega,
                te.fecha_entrega,
                te.archivo,
                te.calificacion,
                te.observacion,
                CASE WHEN te.id_entrega IS NOT NULL THEN 1 ELSE 0 END as entrego
            FROM 
                estudiante e
            JOIN
                usuario u ON e.id_usuario = u.id_usuario
            JOIN 
                matricula m ON e.id_estudiante = m.id_estudiante
            JOIN 
                matricula_curso mc ON m.id_matricula = mc.id_matricula
            JOIN
                curso c ON mc.id_curso = c.id_curso
            LEFT JOIN
                tarea_entrega te ON te.id_estudiante = e.id_estudiante AND te.id_tarea = ?
            WHERE 
                mc.id_curso = ?
                AND m.semestre = c.semestre
                AND m.id_programa = c.id_programa
                AND m.estado = 'Activo'
            ORDER BY 
                u.apellido_paterno ASC, u.apellido_materno ASC, u.primer_nombre ASC";

    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Error al preparar consulta: " . $conn->error);
    }
    
    $stmt->bind_param("ii", $id_tarea, $id_curso);
    
    if (!$stmt->execute()) {
        throw new Exception("Error al ejecutar consulta: " . $stmt->error);
    }
    
    $resultado = $stmt->get_result();

    $estudiantes = [];
    while ($row = $resultado->fetch_assoc()) {
        $estudiantes[] = $row;
    }

    $stmt->close();
    
    // Log de depuración
    error_log("ajax_get_entregas.php - Estudiantes encontrados: " . count($estudiantes));

    echo json_encode(['success' => true, 'data' => $estudiantes]);

} catch (Exception $e) {
    error_log("Error en ajax_get_entregas.php: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error en el servidor: ' . $e->getMessage()]);
} finally {
    if (isset($conn) && $conn) {
        $conn->close();
    }
}
