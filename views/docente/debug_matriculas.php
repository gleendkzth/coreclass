<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';

// verificar autenticacion
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    die("Acceso denegado");
}

echo "<h1>Depuración de Matrículas</h1>";
echo "<pre>";

// 1. Estudiantes en el programa Industrias Alimentarias, semestre V
echo "=== ESTUDIANTES EN INDUSTRIAS ALIMENTARIAS - SEMESTRE V ===\n";
$sql = "SELECT e.id_estudiante, 
               CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre,
               m.id_matricula,
               m.id_programa, 
               pe.nombre as programa, 
               m.semestre
        FROM estudiante e
        JOIN usuario u ON e.id_usuario = u.id_usuario
        JOIN matricula m ON e.id_estudiante = m.id_estudiante
        JOIN programa_estudio pe ON m.id_programa = pe.id_programa
        WHERE pe.nombre LIKE '%Industria%' AND m.semestre = 'V'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID Estudiante: {$row['id_estudiante']}, Nombre: {$row['nombre']}, ";
        echo "ID Matrícula: {$row['id_matricula']}, Programa: {$row['programa']}, Semestre: {$row['semestre']}\n";
        
        // Verificar si está en matricula_curso
        $id_matricula = $row['id_matricula'];
        $sql_mc = "SELECT mc.id_matricula_curso, mc.id_curso, c.nombre as curso
                   FROM matricula_curso mc
                   JOIN curso c ON mc.id_curso = c.id_curso
                   WHERE mc.id_matricula = ?";
        $stmt = $conn->prepare($sql_mc);
        $stmt->bind_param("i", $id_matricula);
        $stmt->execute();
        $result_mc = $stmt->get_result();
        
        if ($result_mc->num_rows > 0) {
            echo "  Cursos específicos matriculados:\n";
            while ($curso = $result_mc->fetch_assoc()) {
                echo "    - Curso ID: {$curso['id_curso']}, Nombre: {$curso['curso']}\n";
            }
        } else {
            echo "  ⚠️ NO tiene cursos en matricula_curso\n";
        }
        echo "\n";
    }
} else {
    echo "No hay estudiantes en Industrias Alimentarias - Semestre V\n";
}

// 2. Curso "arroz" y sus estudiantes
echo "\n=== CURSO 'ARROZ' (ID: 4) ===\n";
$sql = "SELECT * FROM curso WHERE id_curso = 4";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    echo "Curso: {$row['nombre']}, Programa: {$row['id_programa']}, Semestre: {$row['semestre']}, Docente: {$row['id_docente']}\n\n";
    
    // Estudiantes en matricula_curso
    echo "Estudiantes en MATRICULA_CURSO para este curso:\n";
    $sql_mc = "SELECT mc.id_matricula_curso, m.id_estudiante, 
                      CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre
               FROM matricula_curso mc
               JOIN matricula m ON mc.id_matricula = m.id_matricula
               JOIN estudiante e ON m.id_estudiante = e.id_estudiante
               JOIN usuario u ON e.id_usuario = u.id_usuario
               WHERE mc.id_curso = 4";
    $result_mc = $conn->query($sql_mc);
    if ($result_mc && $result_mc->num_rows > 0) {
        while ($est = $result_mc->fetch_assoc()) {
            echo "  - {$est['nombre']} (ID: {$est['id_estudiante']})\n";
        }
    } else {
        echo "  ⚠️ NO hay estudiantes en matricula_curso\n";
    }
    
    // Estudiantes que DEBERÍAN estar (por programa y semestre)
    echo "\nEstudiantes que DEBERÍAN estar (por programa/semestre):\n";
    $id_programa = $row['id_programa'];
    $semestre = $row['semestre'];
    $sql_deberian = "SELECT e.id_estudiante, 
                            CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre,
                            m.id_matricula
                     FROM estudiante e
                     JOIN usuario u ON e.id_usuario = u.id_usuario
                     JOIN matricula m ON e.id_estudiante = m.id_estudiante
                     WHERE m.id_programa = ? AND m.semestre = ?";
    $stmt = $conn->prepare($sql_deberian);
    $stmt->bind_param("is", $id_programa, $semestre);
    $stmt->execute();
    $result_deberian = $stmt->get_result();
    if ($result_deberian && $result_deberian->num_rows > 0) {
        while ($est = $result_deberian->fetch_assoc()) {
            echo "  - {$est['nombre']} (ID: {$est['id_estudiante']}, ID Matrícula: {$est['id_matricula']})\n";
        }
    } else {
        echo "  No hay estudiantes en este programa/semestre\n";
    }
}

echo "\n=== TODOS LOS REGISTROS DE MATRICULA ===\n";
$sql = "SELECT m.id_matricula, m.id_estudiante, m.id_programa, pe.nombre as programa, m.semestre,
               CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre
        FROM matricula m
        JOIN programa_estudio pe ON m.id_programa = pe.id_programa
        JOIN estudiante e ON m.id_estudiante = e.id_estudiante
        JOIN usuario u ON e.id_usuario = u.id_usuario
        ORDER BY pe.nombre, m.semestre";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "ID: {$row['id_matricula']}, Estudiante: {$row['nombre']} ({$row['id_estudiante']}), ";
    echo "Programa: {$row['programa']}, Semestre: {$row['semestre']}\n";
}

echo "\n=== TODOS LOS REGISTROS DE MATRICULA_CURSO ===\n";
$sql = "SELECT mc.id_matricula_curso, mc.id_matricula, mc.id_curso, c.nombre as curso,
               m.id_estudiante, CONCAT(u.primer_nombre, ' ', u.apellido_paterno) as nombre
        FROM matricula_curso mc
        JOIN curso c ON mc.id_curso = c.id_curso
        JOIN matricula m ON mc.id_matricula = m.id_matricula
        JOIN estudiante e ON m.id_estudiante = e.id_estudiante
        JOIN usuario u ON e.id_usuario = u.id_usuario
        ORDER BY mc.id_matricula_curso";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "MC_ID: {$row['id_matricula_curso']}, Matrícula: {$row['id_matricula']}, ";
        echo "Curso: {$row['curso']} ({$row['id_curso']}), Estudiante: {$row['nombre']} ({$row['id_estudiante']})\n";
    }
} else {
    echo "⚠️ NO HAY REGISTROS EN MATRICULA_CURSO\n";
}

echo "</pre>";
?>
