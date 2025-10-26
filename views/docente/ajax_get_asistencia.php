<?php
session_start();
header('Content-Type: application/json');

// verificar autenticacion y rol
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

// validar parametros de entrada
$id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_VALIDATE_INT);
$mes = filter_input(INPUT_GET, 'mes', FILTER_VALIDATE_INT); // 0-11
$anio = filter_input(INPUT_GET, 'anio', FILTER_VALIDATE_INT);

if (!$id_curso || $mes === false || !$anio) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Parámetros inválidos.']);
    exit;
}

// el mes en js es 0-11, en mysql es 1-12
$mes_mysql = $mes + 1;

try {
    $sql = "SELECT 
                da.id_estudiante,
                a.fecha,
                da.estado
            FROM 
                detalle_asistencia da
            JOIN 
                asistencia a ON da.id_asistencia = a.id_asistencia
            JOIN 
                matricula_curso mc ON a.id_matricula_curso = mc.id_matricula_curso
            WHERE 
                mc.id_curso = ? 
                AND MONTH(a.fecha) = ? 
                AND YEAR(a.fecha) = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_curso, $mes_mysql, $anio);
    $stmt->execute();
    $resultado = $stmt->get_result();

    $asistencias = [];
    while ($row = $resultado->fetch_assoc()) {
        // crear una clave unica para facil acceso en javascript
        $key = $row['id_estudiante'] . '-' . $row['fecha'];
        $asistencias[$key] = $row['estado'];
    }

    echo json_encode(['success' => true, 'data' => $asistencias]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error en el servidor: ' . $e->getMessage()]);
} finally {
    if (isset($stmt)) {
        $stmt->close();
    }
    $conn->close();
}
