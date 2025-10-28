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
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Mis Cursos</h1>
            <p class="text-red-200 mt-1">Administra y gestiona las unidades didácticas que tienes asignadas.</p>
        </div>
    </div>

    <!-- Grid de cursos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cursos)): ?>
            <?php foreach ($cursos as $curso): ?>
                <!-- Tarjeta de Curso Moderna -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 group flex flex-col border border-gray-100">
                    <!-- Cabecera con Imagen de Fondo -->
                    <div class="h-32 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?ixlib=rb-4.0.3&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&auto=format');">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-800/80 to-red-900/80 flex items-end p-4">
                            <h3 class="text-xl font-bold text-white leading-tight tracking-wide"><?php echo htmlspecialchars($curso['nombre_curso']); ?></h3>
                        </div>
                    </div>

                    <!-- Cuerpo de la tarjeta -->
                    <div class="p-5 flex-grow flex flex-col">
                        <!-- Programa académico -->
                        <div class="mb-4 pb-3 border-b border-gray-200">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($curso['nombre_programa']); ?></span>
                            </div>
                        </div>

                        <!-- Información del curso con iconos -->
                        <div class="flex-grow space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <span>Semestre: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($curso['semestre']); ?></span></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                <span>Estudiantes: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($curso['cantidad_estudiantes']); ?></span></span>
                            </div>
                        </div>

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

