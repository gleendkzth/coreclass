<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/SemestreController.php';

$semestreController = new SemestreController($conn);
$programas = $semestreController->obtenerProgramas();

?>

<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Gestión de Semestres</h1>
            <p class="text-red-200 mt-1">Visualiza los semestres y la cantidad de estudiantes por programa de estudio.</p>
        </div>
    </div>

    <!-- Lista de programas -->
    <div class="space-y-6">
        <?php if (!empty($programas)): ?>
            <?php foreach ($programas as $programa): ?>
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                    <!-- Título del programa -->
                    <div class="flex items-center mb-5 pb-4 border-b border-gray-200">
                        <svg class="w-6 h-6 mr-3 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <h2 class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($programa['nombre_programa']); ?></h2>
                    </div>
                    
                    <!-- Grid de semestres -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                        <?php foreach ($programa['semestres'] as $semestre): ?>
                            <!-- Tarjeta de Semestre Mejorada -->
                            <div class="bg-gradient-to-br from-red-50 to-white rounded-xl p-5 border-2 border-red-100 hover:border-red-300 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="bg-red-800 text-white rounded-lg w-10 h-10 flex items-center justify-center font-bold text-lg mr-3">
                                            <?php echo htmlspecialchars($semestre['semestre']); ?>
                                        </div>
                                        <h3 class="font-bold text-gray-800 text-lg">Semestre</h3>
                                    </div>
                                </div>
                                
                                <div class="flex items-center mt-4 pt-4 border-t border-red-100">
                                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <div>
                                        <p class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($semestre['cantidad_estudiantes']); ?></p>
                                        <p class="text-xs text-gray-500">Estudiantes</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="bg-blue-50 border border-blue-200 text-blue-800 p-8 rounded-xl text-center shadow-sm">
                <svg class="w-16 h-16 mx-auto mb-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <h3 class="font-semibold text-xl">No hay matrículas activas</h3>
                <p class="mt-2 text-blue-600">No se encontraron estudiantes matriculados en ningún programa o semestre.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
