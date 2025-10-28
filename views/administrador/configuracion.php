<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Configuración del Sistema</h1>

        <div class="grid grid-cols-1 gap-8">
        <!-- Sección de Seguridad y Backups -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons-round mr-3 text-blue-500">security</span>
                Seguridad y Backups
            </h2>
            <div class="space-y-5 pt-4 border-t">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-700">Modo Mantenimiento</p>
                        <p class="text-sm text-gray-500">Desactiva el acceso a usuarios no administradores.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-700">Copias de Seguridad</p>
                        <p class="text-sm text-gray-500">Última copia: 2024-10-18</p>
                    </div>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                        <span class="material-icons-round mr-2">cloud_upload</span>
                        Crear Backup
                    </button>
                </div>
            </div>
        </div>

        <!-- Sección de Registro de Auditoría -->
        <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons-round mr-3 text-green-500">history</span>
                Registro de Auditoría
            </h2>
            <div class="space-y-4 pt-4 border-t">
                <div class="flex justify-between items-center">
                    <input type="text" placeholder="Filtrar por usuario o acción..." class="w-full md:w-1/2 border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    <input type="date" class="border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 ml-2">
                </div>
                <div class="overflow-y-auto h-64 border rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 sticky top-0">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">admin@coreclass.com</td>
                                <td class="px-6 py-4 whitespace-nowrap">Creó el curso 'Introducción a la IA'</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-10-18 14:30</td>
                            </tr>
                            <!-- Aquí se pueden añadir más filas dinámicamente -->
                        </tbody>
                    </table>
                </div>
                 <div class="flex justify-end pt-2">
                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                        <span class="material-icons-round mr-2">download</span>
                        Exportar Log
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
