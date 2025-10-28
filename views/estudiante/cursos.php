<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'estudiante') {
    http_response_code(403);
    echo "<div class='p-6 text-red-700 bg-red-100 border border-red-300 rounded-lg'>Acceso denegado. No tienes permiso para ver esta página.</div>";
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/EstudianteController.php';

$estudianteController = new EstudianteController($conn);
$id_usuario = $_SESSION['id_usuario'];
$cursos = $estudianteController->obtenerMisCursos($id_usuario);

?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Mis Cursos</h1>
            <p class="text-red-200 mt-1">Explora y gestiona el contenido de tus unidades didácticas.</p>
        </div>
    </div>

    <!-- Grid de cursos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if (!empty($cursos)): ?>
            <?php foreach ($cursos as $curso): ?>
                <!-- Tarjeta de Curso Moderna v2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 group flex flex-col border border-gray-100">
                    <!-- Cabecera con Imagen de Fondo -->
                    <div class="h-32 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-4.0.3&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&auto=format');">
                        <div class="absolute inset-0 bg-black/50 flex items-end p-4">
                            <h3 class="text-xl font-bold text-white leading-tight tracking-wide"><?php echo htmlspecialchars($curso['nombre_curso']); ?></h3>
                        </div>
                    </div>

                    <!-- Cuerpo de la tarjeta -->
                    <div class="p-5 flex-grow flex flex-col">
                        <!-- Información del curso con iconos -->
                        <div class="flex-grow space-y-3">
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>Semestre: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($curso['semestre']); ?></span></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <span>Docente: <span class="font-semibold text-gray-800"><?php echo htmlspecialchars($curso['nombre_docente'] ?? 'No asignado'); ?></span></span>
                            </div>
                        </div>

                        <!-- Sección de Tareas -->
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <h4 class="text-sm font-semibold text-gray-800 mb-2">Actividades Pendientes</h4>
                            <div class="bg-red-50/50 border border-red-200/60 rounded-lg p-4 text-center">
                                <svg class="mx-auto h-8 w-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <p class="mt-2 text-sm font-medium text-red-800">¡Estás al día!</p>
                                <p class="text-xs text-red-700/80">No hay actividades nuevas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="lg:col-span-3 md:col-span-2 col-span-1">
                <div class="bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-lg text-center">
                    <h3 class="font-semibold text-lg">No estás matriculado en ningún curso</h3>
                    <p class="mt-1">Cuando te matricules en un curso, aparecerá aquí.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
