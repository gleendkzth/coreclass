<?php
require_once __DIR__ . '/../models/Estudiante.php';

class EstudianteController {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new Estudiante($conexion);
    }

    public function obtenerMisCursos($id_usuario) {
        return $this->modelo->obtenerCursosPorIdUsuario($id_usuario);
    }
}
?>
