<?php
class Docente {
    private $conn;
    private $tabla = 'docente';

    public function __construct($db) {
        $this->conn = $db;
    }

    // Buscar datos del docente por id_usuario
    public function buscarPorIdUsuario($id_usuario) {
        $sql = "SELECT d.id_docente, d.especialidad, d.grado_academico, u.primer_nombre, u.apellido_paterno
                FROM " . $this->tabla . " d
                JOIN usuario u ON d.id_usuario = u.id_usuario
                WHERE d.id_usuario = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        return $resultado->fetch_assoc();
    }

    // Buscar cursos asignados a un docente por su id_usuario
    public function buscarCursosPorIdUsuario($id_usuario) {
        // Primero, obtenemos el id_docente a partir del id_usuario
        $docente_data = $this->buscarPorIdUsuario($id_usuario);
        if (!$docente_data) {
            return []; // Si no se encuentra el docente, retorna un array vacío
        }
        $id_docente = $docente_data['id_docente'];

        // Ahora, buscamos los cursos asignados a ese id_docente y contamos los estudiantes
        $sql = "SELECT 
                    c.id_curso,
                    c.nombre AS nombre_curso,
                    c.semestre,
                    pe.nombre AS nombre_programa,
                    COUNT(DISTINCT mc.id_matricula_curso) AS cantidad_estudiantes
                FROM curso c
                JOIN programa_estudio pe ON c.id_programa = pe.id_programa
                LEFT JOIN matricula_curso mc ON c.id_curso = mc.id_curso
                WHERE c.id_docente = ?
                GROUP BY c.id_curso, c.nombre, c.semestre, pe.nombre
                ORDER BY pe.nombre, c.semestre, c.nombre";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_docente);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>