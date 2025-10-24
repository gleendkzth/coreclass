<?php
class Semestre {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerProgramasConSemestres() {
        // 1. obtener todos los programas de estudio
        $programas_sql = "SELECT id_programa, nombre FROM programa_estudio ORDER BY nombre";
        $programas_result = $this->conn->query($programas_sql);
        $todos_los_programas = $programas_result->fetch_all(MYSQLI_ASSOC);

        // 2. obtener los conteos de estudiantes por programa y semestre
        $conteo_sql = "SELECT id_programa, semestre, COUNT(id_estudiante) AS cantidad
                       FROM matricula
                       WHERE estado = 'Activo'
                       GROUP BY id_programa, semestre";
        $conteo_result = $this->conn->query($conteo_sql);
        $conteos_raw = $conteo_result->fetch_all(MYSQLI_ASSOC);

        // 3. organizar los conteos en un array para facil acceso
        $conteos = [];
        foreach ($conteos_raw as $conteo) {
            $conteos[$conteo['id_programa']][$conteo['semestre']] = $conteo['cantidad'];
        }

        // 4. construir la estructura de datos final
        $semestres_definidos = ['I', 'II', 'III', 'IV', 'V', 'VI'];
        $resultado_final = [];

        foreach ($todos_los_programas as $programa) {
            $id_programa = $programa['id_programa'];
            $semestres_data = [];

            foreach ($semestres_definidos as $semestre) {
                // buscar el conteo, si no existe, es 0
                $cantidad = isset($conteos[$id_programa][$semestre]) ? $conteos[$id_programa][$semestre] : 0;
                $semestres_data[] = [
                    'semestre' => $semestre,
                    'cantidad_estudiantes' => $cantidad
                ];
            }

            $resultado_final[] = [
                'id_programa' => $id_programa,
                'nombre_programa' => $programa['nombre'],
                'semestres' => $semestres_data
            ];
        }

        return $resultado_final;
    }
}
?>
