<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

// verificar autenticacion
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    die("Acceso denegado");
}

echo "<h1>Depuración de Asistencia</h1>";
echo "<pre>";

// 1. verificar datos de sesión
echo "=== DATOS DE SESIÓN ===\n";
echo "ID Usuario: " . ($_SESSION['id_usuario'] ?? 'NO EXISTE') . "\n";
echo "ID Docente: " . ($_SESSION['id_docente'] ?? 'NO EXISTE') . "\n";
echo "Rol: " . ($_SESSION['rol'] ?? 'NO EXISTE') . "\n\n";

// 2. verificar cursos del docente
if (isset($_SESSION['id_docente'])) {
    $id_docente = $_SESSION['id_docente'];
    
    echo "=== CURSOS DEL DOCENTE (id_docente: $id_docente) ===\n";
    $sql = "SELECT c.id_curso, c.nombre, c.semestre, pe.nombre as programa 
            FROM curso c 
            JOIN programa_estudio pe ON c.id_programa = pe.id_programa
            WHERE c.id_docente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_docente);
    $stmt->execute();
    $cursos = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    
    foreach ($cursos as $curso) {
        echo "Curso ID: {$curso['id_curso']} - {$curso['nombre']} ({$curso['programa']} - {$curso['semestre']})\n";
        
        // estudiantes matriculados
        $sql_est = "SELECT DISTINCT e.id_estudiante, u.primer_nombre, u.apellido_paterno
                    FROM estudiante e
                    JOIN usuario u ON e.id_usuario = u.id_usuario
                    JOIN matricula m ON e.id_estudiante = m.id_estudiante
                    JOIN matricula_curso mc ON m.id_matricula = mc.id_matricula
                    WHERE mc.id_curso = ?";
        $stmt_est = $conn->prepare($sql_est);
        $stmt_est->bind_param("i", $curso['id_curso']);
        $stmt_est->execute();
        $estudiantes = $stmt_est->get_result()->fetch_all(MYSQLI_ASSOC);
        
        echo "  Estudiantes matriculados: " . count($estudiantes) . "\n";
        foreach ($estudiantes as $est) {
            echo "    - ID: {$est['id_estudiante']} - {$est['primer_nombre']} {$est['apellido_paterno']}\n";
            
            // verificar asistencias de este estudiante en este curso
            $sql_asis = "SELECT a.fecha, da.estado
                         FROM detalle_asistencia da
                         JOIN asistencia a ON da.id_asistencia = a.id_asistencia
                         JOIN matricula_curso mc ON a.id_matricula_curso = mc.id_matricula_curso
                         WHERE mc.id_curso = ? AND da.id_estudiante = ?
                         ORDER BY a.fecha DESC
                         LIMIT 5";
            $stmt_asis = $conn->prepare($sql_asis);
            $stmt_asis->bind_param("ii", $curso['id_curso'], $est['id_estudiante']);
            $stmt_asis->execute();
            $asistencias = $stmt_asis->get_result()->fetch_all(MYSQLI_ASSOC);
            
            if (count($asistencias) > 0) {
                echo "      Últimas asistencias:\n";
                foreach ($asistencias as $asis) {
                    echo "        {$asis['fecha']}: {$asis['estado']}\n";
                }
            } else {
                echo "      Sin registros de asistencia\n";
            }
        }
        echo "\n";
    }
}

// 3. verificar estructura de matricula_curso
echo "\n=== VERIFICAR MATRICULA_CURSO ===\n";
$sql = "SELECT mc.id_matricula_curso, mc.id_curso, c.nombre as curso, 
               m.id_estudiante, u.primer_nombre, u.apellido_paterno
        FROM matricula_curso mc
        JOIN curso c ON mc.id_curso = c.id_curso
        JOIN matricula m ON mc.id_matricula = m.id_matricula
        JOIN estudiante e ON m.id_estudiante = e.id_estudiante
        JOIN usuario u ON e.id_usuario = u.id_usuario
        LIMIT 10";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "MC_ID: {$row['id_matricula_curso']}, Curso: {$row['id_curso']} ({$row['curso']}), Estudiante: {$row['id_estudiante']} ({$row['primer_nombre']} {$row['apellido_paterno']})\n";
}

// 4. verificar últimas asistencias registradas
echo "\n=== ÚLTIMAS 10 ASISTENCIAS REGISTRADAS ===\n";
$sql = "SELECT a.id_asistencia, a.fecha, a.id_docente, mc.id_curso, c.nombre as curso,
               da.id_estudiante, da.estado, u.primer_nombre, u.apellido_paterno
        FROM asistencia a
        JOIN matricula_curso mc ON a.id_matricula_curso = mc.id_matricula_curso
        JOIN curso c ON mc.id_curso = c.id_curso
        LEFT JOIN detalle_asistencia da ON a.id_asistencia = da.id_asistencia
        LEFT JOIN estudiante e ON da.id_estudiante = e.id_estudiante
        LEFT JOIN usuario u ON e.id_usuario = u.id_usuario
        ORDER BY a.id_asistencia DESC
        LIMIT 10";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "Asist_ID: {$row['id_asistencia']}, Fecha: {$row['fecha']}, Curso: {$row['id_curso']} ({$row['curso']}), ";
    echo "Estudiante: " . ($row['id_estudiante'] ?? 'NULL') . " (" . ($row['primer_nombre'] ?? '') . " " . ($row['apellido_paterno'] ?? '') . "), ";
    echo "Estado: " . ($row['estado'] ?? 'NULL') . "\n";
}

echo "</pre>";
?>
