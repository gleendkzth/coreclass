<?php
require_once __DIR__ . '/../models/Semestre.php';

class SemestreController {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new Semestre($conexion);
    }

    public function obtenerProgramas() {
        return $this->modelo->obtenerProgramasConSemestres();
    }
}
?>
