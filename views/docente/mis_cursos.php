<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    http_response_code(403);
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Acceso denegado. No tienes permiso para ver esta página.</div>";
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$docenteController = new DocenteController($conn);
$id_usuario = $_SESSION['id_usuario'];
$cursos = $docenteController->obtenerCursosAsignados($id_usuario);

?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Mis Cursos</h1>
            <p class="text-gray-500 mt-1">Aquí se listan todos los cursos que tienes asignados actualmente.</p>
        </div>
    </div>

    <!-- grid de cursos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cursos)): ?>
            <?php foreach ($cursos as $curso): ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300 flex flex-col">
                    <div class="p-5 flex-grow">
                        <div class="flex items-start justify-between">
                            <div class="flex items-center">
                                <div class="p-3 bg-red-100 rounded-lg">
                                    <span class="material-icons-round text-red-800">school</span>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($curso['nombre_curso']); ?></h3>
                                    <p class="text-sm text-gray-500"><?php echo htmlspecialchars($curso['nombre_programa']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="material-icons-round text-base mr-2">bookmark</span>
                                <span>Semestre: <span class="font-bold"><?php echo htmlspecialchars($curso['semestre']); ?></span></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="material-icons-round text-base mr-2">group</span>
                                <span>Estudiantes: <span class="font-bold"><?php echo htmlspecialchars($curso['cantidad_estudiantes']); ?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3 border-t">
                        <a href="#" class="w-full text-center bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center justify-center">
                            Gestionar Curso <span class="material-icons-round text-lg ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="lg:col-span-3 md:col-span-2 col-span-1">
                <div class="bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-lg text-center">
                    <h3 class="font-semibold text-lg">No tienes cursos asignados</h3>
                    <p class="mt-1">Cuando se te asigne un curso, aparecerá aquí.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

