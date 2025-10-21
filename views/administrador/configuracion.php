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
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Configuración del Sistema</h1>

    <div x-data="{ tab: 'general' }">
        <!-- Pestañas de Navegación -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="tab = 'general'" :class="{ 'border-blue-500 text-blue-600': tab === 'general', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'general' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    General
                </button>
                <button @click="tab = 'seguridad'" :class="{ 'border-blue-500 text-blue-600': tab === 'seguridad', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'seguridad' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Seguridad y Backups
                </button>
                <button @click="tab = 'roles'" :class="{ 'border-blue-500 text-blue-600': tab === 'roles', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'roles' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Roles y Permisos
                </button>
                <button @click="tab = 'auditoria'" :class="{ 'border-blue-500 text-blue-600': tab === 'auditoria', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'auditoria' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Auditoría
                </button>
            </nav>
        </div>

        <!-- Contenido de las Pestañas -->
        <div class="bg-white p-6 rounded-lg shadow-lg min-h-[400px]">
            <!-- Pestaña General -->
            <div x-show="tab === 'general'" class="space-y-6" x-cloak>
                <h2 class="text-xl font-semibold text-gray-700">Ajustes Generales</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre de la Institución</label>
                        <input type="text" value="CoreClass Institute" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo Oficial</label>
                        <input type="email" value="contacto@coreclass.com" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Logo de la Institución</label>
                        <input type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Color Principal (Tema)</label>
                        <input type="color" value="#ef4444" class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
                <div class="flex justify-end pt-4 border-t">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Guardar Cambios</button>
                </div>
            </div>

            <!-- Pestaña Seguridad -->
            <div x-show="tab === 'seguridad'" class="space-y-6" x-cloak>
                <h2 class="text-xl font-semibold text-gray-700">Seguridad y Backups</h2>
                <div class="pt-4 border-t space-y-4">
                    <div class="flex items-center justify-between p-4 border rounded-lg">
                        <div>
                            <p class="font-medium">Modo Mantenimiento</p>
                            <p class="text-sm text-gray-500">Desactiva el acceso a usuarios no administradores.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <div class="flex items-center justify-between p-4 border rounded-lg">
                        <div>
                            <p class="font-medium">Copias de Seguridad</p>
                            <p class="text-sm text-gray-500">Última copia: 2024-10-18</p>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Crear Backup</button>
                    </div>
                </div>
            </div>

            <!-- Pestaña Roles -->
            <div x-show="tab === 'roles'" class="space-y-6" x-cloak>
                <h2 class="text-xl font-semibold text-gray-700">Roles y Permisos</h2>
                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permisos Clave</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 font-medium">Administrador</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Acceso total a todas las funciones.</td>
                                <td class="px-6 py-4 text-center"><button class="text-gray-400 cursor-not-allowed"><span class="material-icons-round">edit</span></button></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium">Docente</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Gestionar cursos, subir materiales, calificar.</td>
                                <td class="px-6 py-4 text-center"><button class="text-gray-500 hover:text-yellow-600"><span class="material-icons-round">edit</span></button></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-medium">Estudiante</td>
                                <td class="px-6 py-4 text-sm text-gray-500">Ver cursos, entregar tareas, ver calificaciones.</td>
                                <td class="px-6 py-4 text-center"><button class="text-gray-500 hover:text-yellow-600"><span class="material-icons-round">edit</span></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pestaña Auditoría -->
            <div x-show="tab === 'auditoria'" class="space-y-6" x-cloak>
                <h2 class="text-xl font-semibold text-gray-700">Registro de Auditoría</h2>
                <div class="flex justify-between items-center">
                    <input type="text" placeholder="Filtrar por usuario..." class="border-gray-300 rounded-lg shadow-sm">
                    <input type="date" class="border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acción</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4">admin@coreclass.com</td>
                                <td class="px-6 py-4">Creó el curso 'Introducción a la IA'</td>
                                <td class="px-6 py-4">2024-10-18 14:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js para la funcionalidad de pestañas -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
