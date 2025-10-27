<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Acceso denegado.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';

$id_curso = filter_input(INPUT_POST, 'id_curso', FILTER_VALIDATE_INT);
$id_programa = filter_input(INPUT_POST, 'id_programa', FILTER_VALIDATE_INT);
$semestre = filter_input(INPUT_POST, 'semestre', FILTER_SANITIZE_STRING);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$instrucciones = filter_input(INPUT_POST, 'instrucciones', FILTER_SANITIZE_STRING);
$fecha_limite = filter_input(INPUT_POST, 'fecha_limite', FILTER_SANITIZE_STRING);
$puntaje_maximo = filter_input(INPUT_POST, 'puntaje-tarea', FILTER_VALIDATE_INT);

// Validación básica
if (empty($id_curso) || empty($id_programa) || empty($semestre) || empty($titulo) || empty($instrucciones) || empty($fecha_limite) || empty($puntaje_maximo)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit;
}
$id_usuario = $_SESSION['id_usuario'];
$stmt_docente = $conn->prepare("SELECT id_docente FROM docente WHERE id_usuario = ?");
$stmt_docente->bind_param("i", $id_usuario);
$stmt_docente->execute();
$result_docente = $stmt_docente->get_result();
if (!($docente_row = $result_docente->fetch_assoc())) {
    echo json_encode(['success' => false, 'message' => 'No se pudo identificar al docente.']);
    exit;
}
$id_docente = $docente_row['id_docente'];
$stmt_docente->close();

// Manejo de archivo (si se envía)
$archivo_apoyo_ruta = null;
if (isset($_FILES['archivo_apoyo']) && $_FILES['archivo_apoyo']['error'] == 0) {
    $upload_dir = __DIR__ . '/../../public/uploads/tareas/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $nombre_archivo = time() . '_' . basename($_FILES['archivo_apoyo']['name']);
    $archivo_apoyo_ruta = 'public/uploads/tareas/' . $nombre_archivo;
    if (!move_uploaded_file($_FILES['archivo_apoyo']['tmp_name'], $upload_dir . $nombre_archivo)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error al subir el archivo.']);
        exit;
    }
}

// Decidir si es una inserción o una actualización
try {
    $id_tarea = filter_input(INPUT_POST, 'id_tarea', FILTER_VALIDATE_INT);

    if ($id_tarea) {
        // Es una actualización
        $sql = "UPDATE tarea SET id_curso = ?, id_programa = ?, semestre = ?, titulo = ?, instrucciones = ?, fecha_limite = ?, puntaje_maximo = ?";
        $params = ["iissssi", $id_curso, $id_programa, $semestre, $titulo, $instrucciones, $fecha_limite, $puntaje_maximo];

        if ($archivo_apoyo_ruta) {
            $sql .= ", archivo_apoyo = ?";
            $params[0] .= 's';
            $params[] = $archivo_apoyo_ruta;
        }

        $sql .= " WHERE id_tarea = ? AND id_docente = ?";
        $params[0] .= 'ii';
        $params[] = $id_tarea;
        $params[] = $id_docente;

        $stmt = $conn->prepare($sql);
        call_user_func_array([$stmt, 'bind_param'], $params);
        $message = 'Tarea actualizada correctamente.';

    } else {
        // Es una inserción
        $sql = "INSERT INTO tarea (id_curso, id_docente, id_programa, semestre, titulo, instrucciones, archivo_apoyo, fecha_limite, puntaje_maximo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiisssssi", $id_curso, $id_docente, $id_programa, $semestre, $titulo, $instrucciones, $archivo_apoyo_ruta, $fecha_limite, $puntaje_maximo);
        $message = 'Tarea creada y publicada correctamente.';
    }
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => $message]);
    } else {
        throw new Exception('Error al procesar la solicitud en la base de datos.');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
