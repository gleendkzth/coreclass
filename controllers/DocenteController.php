<?php
require_once __DIR__ . '/../models/Docente.php';

class DocenteController {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new Docente($conexion);
    }

    public function obtenerCursosAsignados($id_usuario) {
        return $this->modelo->buscarCursosPorIdUsuario($id_usuario);
    }

    public function obtenerDatosDocente($id_usuario) {
        return $this->modelo->buscarPorIdUsuario($id_usuario);
    }
}
?>
