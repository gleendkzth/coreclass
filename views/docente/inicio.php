<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de docente
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    header('Location: ../auth/login.php');
    exit;
}
?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- sección de bienvenida -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">¡Hola, <?php echo $_SESSION['nombre']; ?>!</h1>
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
                    <p class="text-2xl font-bold text-gray-800">4</p>
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
                    <p class="text-2xl font-bold text-gray-800">128</p>
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
                    <p class="text-2xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- contenido principal de dos columnas -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- columna izquierda -->
        <div class="lg:col-span-2 space-y-6">
            <!-- próximas clases -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">calendar_today</span>
                        Próximas Clases
                    </h2>
                    <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver horario completo</a>
                </div>
                <div class="space-y-4">
                    <!-- clase 1 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-red-100 rounded-lg mr-4">
                            <span class="material-icons-round text-red-800">code</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Programación Web</p>
                            <p class="text-sm text-gray-500">Aula C-301 | 14:00 - 16:00</p>
                        </div>
                        <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                            Ver Curso <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                    <!-- clase 2 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-red-100 rounded-lg mr-4">
                            <span class="material-icons-round text-red-800">storage</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Bases de Datos</p>
                            <p class="text-sm text-gray-500">Aula A-102 | 16:00 - 18:00</p>
                        </div>
                        <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                            Ver Curso <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- columna derecha -->
        <div class="lg:col-span-1 space-y-6">
            <!-- anuncios recientes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">campaign</span>
                        Anuncios Recientes
                    </h2>
                </div>
                <div class="space-y-4">
                    <div class="p-4 rounded-lg bg-red-50 border border-red-200">
                        <p class="font-semibold text-red-800">Reunión de Docentes</p>
                        <p class="text-sm text-red-700 mt-1">Este viernes a las 10:00 AM en la sala de juntas.</p>
                        <p class="text-xs text-gray-500 mt-2">Coordinación Académica</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
