<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de estudiante
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'estudiante') {
    header('Location: ../auth/login.php');
    exit;
}
?>
<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Sección de bienvenida -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">¡Hola, <?php echo $_SESSION['nombre']; ?>!</h1>
            <p class="text-red-200 mt-1">Bienvenido a tu panel. Aquí tienes un resumen de lo más importante.</p>
        </div>
    </div>

    <!-- Widgets principales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Cursos Actuales -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">school</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cursos Actuales</p>
                    <p class="text-2xl font-bold text-gray-800">6</p>
                </div>
            </div>
        </div>

        <!-- Tareas Pendientes -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">assignment</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Tareas Pendientes</p>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>

        <!-- Promedio General -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">grade</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Promedio General</p>
                    <p class="text-2xl font-bold text-gray-800">14.5<span class="text-base text-gray-500 font-normal">/20</span></p>
                </div>
            </div>
        </div>

        <!-- Asistencia -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">event_available</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Asistencia</p>
                    <p class="text-2xl font-bold text-gray-800">85%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal de dos columnas -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Columna Izquierda -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Próximas Tareas y Exámenes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">calendar_today</span>
                        Próximas Tareas y Exámenes
                    </h2>
                    <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver calendario</a>
                </div>
                <div class="space-y-4">
                    <!-- Tarea 1 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-red-100 rounded-lg mr-4">
                            <span class="material-icons-round text-red-800">code</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Proyecto Final</p>
                            <p class="text-sm text-gray-500">Programación Web</p>
                        </div>
                        <div class="flex items-center space-x-4 ml-4">
                            <div class="text-right flex-shrink-0">
                                <p class="font-semibold text-red-800">En 4 días</p>
                                <p class="text-xs text-gray-500">12/10/2025</p>
                            </div>
                            <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                                Ver <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    <!-- Tarea 2 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-yellow-100 rounded-lg mr-4">
                            <span class="material-icons-round text-yellow-800">quiz</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Examen Parcial</p>
                            <p class="text-sm text-gray-500">Desarrollo de Aplicaciones Móviles</p>
                        </div>
                        <div class="flex items-center space-x-4 ml-4">
                            <div class="text-right flex-shrink-0">
                                <p class="font-semibold text-yellow-800">En 7 días</p>
                                <p class="text-xs text-gray-500">15/10/2025</p>
                            </div>
                            <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                                Ver <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Últimas Calificaciones -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">history_edu</span>
                        Últimas Calificaciones
                    </h2>
                    <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todas</a>
                </div>
                <div class="space-y-3">
                    <!-- Calificación 1 -->
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div>
                            <p class="font-semibold text-gray-700">Práctica Calificada 1</p>
                            <p class="text-sm text-gray-500">Comercio Electrónico</p>
                        </div>
                        <div class="text-lg font-bold text-green-600">18<span class="text-sm text-gray-500 font-normal">/20</span></div>
                    </div>
                    <!-- Calificación 2 -->
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div>
                            <p class="font-semibold text-gray-700">Avance de Proyecto</p>
                            <p class="text-sm text-gray-500">Programación Web</p>
                        </div>
                        <div class="text-lg font-bold text-orange-500">14<span class="text-sm text-gray-500 font-normal">/20</span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna Derecha -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Anuncios y Notificaciones -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">campaign</span>
                        Anuncios y Notificaciones
                    </h2>
                </div>
                <div class="space-y-4">
                    <!-- Anuncio 1 -->
                    <div class="p-4 rounded-lg bg-red-50 border border-red-200">
                        <p class="font-semibold text-red-800">Cambio de Aula</p>
                        <p class="text-sm text-red-700 mt-1">La clase de Arquitectura de la Información ha sido movida al aula B-102.</p>
                        <p class="text-xs text-gray-500 mt-2">Docente: Ing. Mario</p>
                    </div>
                    <!-- Anuncio 2 -->
                    <div class="p-4 rounded-lg bg-gray-50 border border-gray-200">
                        <p class="font-semibold text-gray-800">Conferencia de IA</p>
                        <p class="text-sm text-gray-600 mt-1">Este viernes se realizará una conferencia sobre Inteligencia Artificial en el auditorio principal.</p>
                        <p class="text-xs text-gray-500 mt-2">Institución</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

