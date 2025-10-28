<?php
class PerfilController {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    /**
     * Obtener información completa del perfil del usuario
     */
    public function obtenerPerfilCompleto($id_usuario, $rol) {
        // Obtener datos básicos del usuario
        $query = "SELECT 
                    u.id_usuario,
                    u.dni,
                    u.primer_nombre,
                    u.segundo_nombre,
                    u.apellido_paterno,
                    u.apellido_materno,
                    u.usuario,
                    u.correo,
                    u.telefono,
                    u.rol,
                    u.estado,
                    u.fecha_registro
                  FROM usuario u
                  WHERE u.id_usuario = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $perfil = $result->fetch_assoc();
        $stmt->close();
        
        if (!$perfil) {
            return null;
        }

        // Obtener datos específicos según el rol
        switch ($rol) {
            case 'administrador':
                $perfil['datos_especificos'] = $this->obtenerDatosAdministrador($id_usuario);
                $perfil['estadisticas'] = $this->obtenerEstadisticasAdministrador();
                break;
            
            case 'docente':
                $perfil['datos_especificos'] = $this->obtenerDatosDocente($id_usuario);
                $perfil['estadisticas'] = $this->obtenerEstadisticasDocente($id_usuario);
                break;
            
            case 'estudiante':
                $perfil['datos_especificos'] = $this->obtenerDatosEstudiante($id_usuario);
                $perfil['estadisticas'] = $this->obtenerEstadisticasEstudiante($id_usuario);
                break;
        }

        return $perfil;
    }

    /**
     * Obtener datos específicos de administrador
     */
    private function obtenerDatosAdministrador($id_usuario) {
        $query = "SELECT cargo, permisos FROM administrador WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = $result->fetch_assoc();
        $stmt->close();
        return $datos;
    }

    /**
     * Obtener datos específicos de docente
     */
    private function obtenerDatosDocente($id_usuario) {
        $query = "SELECT 
                    d.id_docente,
                    d.especialidad,
                    d.grado_academico
                  FROM docente d
                  WHERE d.id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = $result->fetch_assoc();
        $stmt->close();
        return $datos;
    }

    /**
     * Obtener datos específicos de estudiante
     */
    private function obtenerDatosEstudiante($id_usuario) {
        $query = "SELECT 
                    e.id_estudiante,
                    e.codigo_estudiante,
                    e.fecha_ingreso,
                    m.id_programa,
                    p.nombre as programa_nombre,
                    m.semestre,
                    m.estado as estado_matricula
                  FROM estudiante e
                  LEFT JOIN matricula m ON e.id_estudiante = m.id_estudiante
                  LEFT JOIN programa_estudio p ON m.id_programa = p.id_programa
                  WHERE e.id_usuario = ?
                  ORDER BY m.fecha_matricula DESC
                  LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = $result->fetch_assoc();
        $stmt->close();
        return $datos;
    }

    /**
     * Obtener estadísticas para administrador
     */
    private function obtenerEstadisticasAdministrador() {
        $stats = [];
        
        // Total de usuarios
        $result = $this->conn->query("SELECT COUNT(*) as total FROM usuario WHERE estado = 1");
        $stats['total_usuarios'] = $result->fetch_assoc()['total'];
        
        // Total de docentes
        $result = $this->conn->query("SELECT COUNT(*) as total FROM docente");
        $stats['total_docentes'] = $result->fetch_assoc()['total'];
        
        // Total de estudiantes
        $result = $this->conn->query("SELECT COUNT(*) as total FROM estudiante");
        $stats['total_estudiantes'] = $result->fetch_assoc()['total'];
        
        // Total de programas
        $result = $this->conn->query("SELECT COUNT(*) as total FROM programa_estudio");
        $stats['total_programas'] = $result->fetch_assoc()['total'];
        
        // Total de cursos
        $result = $this->conn->query("SELECT COUNT(*) as total FROM curso");
        $stats['total_cursos'] = $result->fetch_assoc()['total'];
        
        return $stats;
    }

    /**
     * Obtener estadísticas para docente
     */
    private function obtenerEstadisticasDocente($id_usuario) {
        $stats = [];
        
        // Obtener id_docente
        $query = "SELECT id_docente FROM docente WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $docente = $result->fetch_assoc();
        $stmt->close();
        
        if (!$docente) {
            return $stats;
        }
        
        $id_docente = $docente['id_docente'];
        
        // Total de cursos asignados
        $query = "SELECT COUNT(DISTINCT c.id_curso) as total 
                  FROM curso c 
                  WHERE c.id_docente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_docente);
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['cursos_asignados'] = $result->fetch_assoc()['total'];
        $stmt->close();
        
        // Total de estudiantes
        $query = "SELECT COUNT(DISTINCT mc.id_matricula) as total
                  FROM curso c
                  INNER JOIN matricula_curso mc ON c.id_curso = mc.id_curso
                  WHERE c.id_docente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_docente);
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['total_estudiantes'] = $result->fetch_assoc()['total'];
        $stmt->close();
        
        // Total de tareas publicadas
        $query = "SELECT COUNT(*) as total 
                  FROM tarea 
                  WHERE id_docente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_docente);
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['tareas_publicadas'] = $result->fetch_assoc()['total'];
        $stmt->close();
        
        return $stats;
    }

    /**
     * Obtener estadísticas para estudiante
     */
    private function obtenerEstadisticasEstudiante($id_usuario) {
        $stats = [];
        
        // Obtener id_estudiante
        $query = "SELECT id_estudiante FROM estudiante WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $estudiante = $result->fetch_assoc();
        $stmt->close();
        
        if (!$estudiante) {
            return $stats;
        }
        
        $id_estudiante = $estudiante['id_estudiante'];
        
        // Total de cursos matriculados
        $query = "SELECT COUNT(DISTINCT mc.id_curso) as total
                  FROM matricula m
                  INNER JOIN matricula_curso mc ON m.id_matricula = mc.id_matricula
                  WHERE m.id_estudiante = ? AND m.estado = 'Activo'";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_estudiante);
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['cursos_matriculados'] = $result->fetch_assoc()['total'];
        $stmt->close();
        
        // Total de tareas pendientes
        $query = "SELECT COUNT(*) as total
                  FROM tarea t
                  INNER JOIN matricula_curso mc ON t.id_curso = mc.id_curso
                  INNER JOIN matricula m ON mc.id_matricula = m.id_matricula
                  LEFT JOIN tarea_entrega te ON t.id_tarea = te.id_tarea AND te.id_estudiante = ?
                  WHERE m.id_estudiante = ? 
                  AND te.id_entrega IS NULL
                  AND t.fecha_limite >= NOW()";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $id_estudiante, $id_estudiante);
        $stmt->execute();
        $result = $stmt->get_result();
        $stats['tareas_pendientes'] = $result->fetch_assoc()['total'];
        $stmt->close();
        
        // Promedio general
        $query = "SELECT AVG(valor_nota) as promedio
                  FROM notas
                  WHERE id_estudiante = ? AND valor_nota IS NOT NULL";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_estudiante);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stats['promedio_general'] = $row['promedio'] ? round($row['promedio'], 2) : 0;
        $stmt->close();
        
        return $stats;
    }

    /**
     * Actualizar información del perfil
     */
    public function actualizarPerfil($id_usuario, $datos) {
        $query = "UPDATE usuario SET 
                    telefono = ?,
                    correo = ?
                  WHERE id_usuario = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssi', $datos['telefono'], $datos['correo'], $id_usuario);
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }

    /**
     * Cambiar contraseña
     */
    public function cambiarContrasena($id_usuario, $contrasena_actual, $contrasena_nueva) {
        // Verificar contraseña actual
        $query = "SELECT contrasena FROM usuario WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id_usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();
        $stmt->close();
        
        if (!$usuario || $usuario['contrasena'] !== $contrasena_actual) {
            return false;
        }
        
        // Actualizar contraseña
        $query = "UPDATE usuario SET contrasena = ? WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $contrasena_nueva, $id_usuario);
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }
}
?>
