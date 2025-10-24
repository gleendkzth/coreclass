<?php
session_start();

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    header('Location: ../auth/login.php');
    exit;
}

require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/DocenteController.php';

$docenteController = new DocenteController($conn);
$id_usuario = $_SESSION['id_usuario'];

// Obtener el número de cursos asignados
$cursos = $docenteController->obtenerCursosAsignados($id_usuario);
$num_cursos = count($cursos);

// Aquí irían las consultas para obtener el número de estudiantes y tareas (actualmente estático)
$num_estudiantes = 128; // Dato estático por ahora
$num_tareas = 12; // Dato estático por ahora

?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- sección de bienvenida -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">¡Hola, <?php echo htmlspecialchars($_SESSION['primer_nombre']); ?>!</h1>
            <p class="text-red-200 mt-1">Bienvenido a tu panel de docente. Aquí tienes un resumen de tu actividad.</p>
        </div>
    </div>

    <!-- widgets principales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- cursos a cargo -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">school</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cursos a Cargo</p>
                    <p class="text-2xl font-bold text-gray-800"><?php echo $num_cursos; ?></p>
                </div>
            </div>
        </div>

        <!-- estudiantes totales -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">groups</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Estudiantes Totales</p>
                    <p class="text-2xl font-bold text-gray-800"><?php echo $num_estudiantes; ?></p>
                </div>
            </div>
        </div>

        <!-- tareas por calificar -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">rule</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Tareas por Calificar</p>
                    <p class="text-2xl font-bold text-gray-800"><?php echo $num_tareas; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Próximas Clases y Anuncios (contenido estático por ahora) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-4">
                    <span class="material-icons-round mr-2 text-red-800">calendar_today</span>
                    Próximas Clases
                </h2>
                <div class="text-center text-gray-500 py-4">
                    <p>La funcionalidad de horario aún no está implementada.</p>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-4">
                    <span class="material-icons-round mr-2 text-red-800">campaign</span>
                    Anuncios Recientes
                </h2>
                <div class="text-center text-gray-500 py-4">
                    <p>No hay anuncios recientes.</p>
                </div>
            </div>
        </div>
    </div>
</div>

