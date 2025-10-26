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

    public function obtenerProgramasDelDocente($id_usuario) {
        return $this->modelo->obtenerProgramasAsignadosPorUsuario($id_usuario);
    }

    public function obtenerSemestresParaDocente($id_usuario, $id_programa) {
        return $this->modelo->obtenerSemestresPorPrograma($id_usuario, $id_programa);
    }

    public function obtenerCursosParaDocente($id_usuario, $id_programa, $semestre) {
        return $this->modelo->obtenerCursosPorProgramaSemestre($id_usuario, $id_programa, $semestre);
    }
}
?>
