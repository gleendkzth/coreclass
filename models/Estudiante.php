<?php

class Estudiante {
    private $conn;
    private $table_name = "estudiante";

    // propiedades del objeto
    public $id_estudiante;
    public $id_usuario;
    public $nombre;
    public $apellido;

    public function __construct($db) {
        $this->conn = $db;
    }

    /**
     * Obtener todos los estudiantes matriculados en un curso específico.
     *
     * @param int $id_curso El ID del curso.
     * @return PDOStatement|false El statement con el resultado o false si hay un error.
     */
    public function obtenerEstudiantesPorCurso($id_curso) {
        $query = "SELECT
                    u.primer_nombre,
                    u.segundo_nombre,
                    u.apellido_paterno,
                    u.apellido_materno,
                    e.id_estudiante
                FROM
                    " . $this->table_name . " e
                JOIN
                    usuario u ON e.id_usuario = u.id_usuario
                JOIN
                    matricula m ON e.id_estudiante = m.id_estudiante
                JOIN
                    curso c ON m.id_programa = c.id_programa AND m.semestre = c.semestre
                WHERE
                    c.id_curso = ?
                ORDER BY
                    u.apellido_paterno, u.apellido_materno, u.primer_nombre, u.segundo_nombre";

        $stmt = $this->conn->prepare($query);

        if ($stmt === false) {
            // opcional: registrar el error
            // error_log('Error al preparar la consulta: ' . $this->conn->error);
            return false;
        }

        // sanitizar y enlazar
        $id_curso = htmlspecialchars(strip_tags($id_curso));
        $stmt->bind_param("i", $id_curso);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            // opcional: registrar el error
            // error_log('Error al ejecutar la consulta: ' . $stmt->error);
            return false;
        }
    }

    // Obtener los cursos en los que un estudiante está matriculado por su id_usuario
    public function obtenerCursosPorIdUsuario($id_usuario) {
        $sql = "SELECT 
                    c.id_curso,
                    c.nombre AS nombre_curso,
                    c.semestre,
                    CONCAT(u_docente.primer_nombre, ' ', u_docente.apellido_paterno) AS nombre_docente
                FROM matricula m
                JOIN estudiante e ON m.id_estudiante = e.id_estudiante
                JOIN curso c ON m.id_programa = c.id_programa AND m.semestre = c.semestre
                LEFT JOIN docente d ON c.id_docente = d.id_docente
                LEFT JOIN usuario u_docente ON d.id_usuario = u_docente.id_usuario
                WHERE e.id_usuario = ?
                ORDER BY c.semestre, c.nombre";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>