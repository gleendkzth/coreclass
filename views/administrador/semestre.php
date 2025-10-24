<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/SemestreController.php';

$semestreController = new SemestreController($conn);
$programas = $semestreController->obtenerProgramas();

?>

<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Semestres</h1>
            <p class="text-gray-500 mt-1">Visualiza los semestres y la cantidad de estudiantes por programa de estudio.</p>
        </div>
    </div>

    <!-- lista de programas -->
    <div class="space-y-8">
        <?php if (!empty($programas)): ?>
            <?php foreach ($programas as $programa): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4"><?php echo htmlspecialchars($programa['nombre_programa']); ?></h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <?php foreach ($programa['semestres'] as $semestre): ?>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-semibold text-gray-700">Semestre <?php echo htmlspecialchars($semestre['semestre']); ?></h3>
                                    <p class="text-sm text-gray-500 mt-1"><?php echo htmlspecialchars($semestre['cantidad_estudiantes']); ?> estudiantes</p>
                                </div>
                                <a href="#" class="mt-4 w-full text-center bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center justify-center text-sm">
                                    Matricular Cursos
                                    <span class="material-icons-round text-lg ml-1">arrow_forward</span>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-lg text-center">
                <h3 class="font-semibold text-lg">No hay matrículas activas</h3>
                <p class="mt-1">No se encontraron estudiantes matriculados en ningún programa o semestre.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
