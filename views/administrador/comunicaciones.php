<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}
?>
<div class="container mx-auto px-4 py-8 h-full">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Comunicaciones</h1>

    <div class="flex h-[calc(100vh-200px)] bg-white shadow-lg rounded-lg">
        <!-- Lista de Canales -->
        <div class="w-1/4 border-r border-gray-200">
            <div class="p-4 border-b">
                <h2 class="text-lg font-semibold">Canales</h2>
            </div>
            <nav class="p-2 space-y-1">
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg bg-gray-200 text-gray-900">
                    <span class="material-icons-round mr-3">campaign</span> Anuncios Globales
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                    <span class="material-icons-round mr-3">group</span> Docentes
                </a>
                <a href="#" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-600 hover:bg-gray-100">
                    <span class="material-icons-round mr-3">school</span> Estudiantes
                </a>
            </nav>
        </div>

        <!-- Área de Chat -->
        <div class="w-3/4 flex flex-col">
            <!-- Cabecera del Chat -->
            <div class="p-4 border-b flex items-center">
                <h2 class="text-lg font-semibold text-gray-800"># Anuncios Globales</h2>
            </div>

            <!-- Historial de Mensajes -->
            <div class="flex-1 p-6 overflow-y-auto space-y-6">
                <!-- Mensaje de ejemplo -->
                <div class="flex items-start gap-3">
                    <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/lego/1.jpg" alt="Admin">
                    <div>
                        <p class="font-semibold">Administrador <span class="text-xs text-gray-500 font-normal ml-2">10:30 AM</span></p>
                        <div class="bg-gray-100 p-3 rounded-lg mt-1">
                            <p>Recordatorio: La próxima semana inician las inscripciones para el semestre 2025-I.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Editor y Envío -->
            <div class="p-4 bg-gray-50 border-t">
                <div class="relative">
                    <textarea rows="3" class="w-full p-2 pr-20 border-gray-300 rounded-lg shadow-sm" placeholder="Escribe un mensaje en #Anuncios Globales..."></textarea>
                    <div class="absolute top-0 right-0 p-2 flex items-center">
                        <button class="text-gray-500 hover:text-gray-700 p-2"><span class="material-icons-round">attach_file</span></button>
                        <button class="bg-blue-500 text-white rounded-full p-2 ml-2 hover:bg-blue-600"><span class="material-icons-round">send</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
