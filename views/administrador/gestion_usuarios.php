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
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Gestión de Usuarios</h1>

    <!-- Filtros y Acciones -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div class="flex-grow w-full md:w-auto">
                <input type="text" placeholder="Buscar por nombre o correo..." class="w-full border-gray-300 rounded-lg shadow-sm">
            </div>
            <div class="flex items-center space-x-4 w-full md:w-auto">
                <select class="border-gray-300 rounded-lg shadow-sm w-full md:w-auto">
                    <option>Rol: Todos</option>
                    <option>Administrador</option>
                    <option>Docente</option>
                    <option>Estudiante</option>
                </select>
                <button onclick="openModal('userModal')" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg flex items-center whitespace-nowrap">
                    <span class="material-icons-round mr-2">add</span>
                    Nuevo Usuario
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Usuario</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rol</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estado</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Ultimo Acceso</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Fila de ejemplo 1 -->
                <tr>
                    <td class="px-5 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Juan Pérez</div>
                                <div class="text-sm text-gray-500">juan.perez@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500">Estudiante</td>
                    <td class="px-5 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Activo</span>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500">2024-10-18 15:30</td>
                    <td class="px-5 py-4 text-center">
                        <div class="flex item-center justify-center space-x-3">
                            <button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button>
                            <button class="text-gray-500 hover:text-yellow-600"><span class="material-icons-round">edit</span></button>
                            <button class="text-gray-500 hover:text-red-600"><span class="material-icons-round">delete</span></button>
                        </div>
                    </td>
                </tr>
                <!-- Fila de ejemplo 2 -->
                <tr>
                    <td class="px-5 py-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/2.jpg" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Maria López</div>
                                <div class="text-sm text-gray-500">maria.lopez@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500">Docente</td>
                    <td class="px-5 py-4">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactivo</span>
                    </td>
                    <td class="px-5 py-4 text-sm text-gray-500">2024-09-01 10:00</td>
                    <td class="px-5 py-4 text-center">
                        <div class="flex item-center justify-center space-x-3">
                            <button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button>
                            <button class="text-gray-500 hover:text-yellow-600"><span class="material-icons-round">edit</span></button>
                            <button class="text-gray-500 hover:text-red-600"><span class="material-icons-round">delete</span></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Paginación -->
        <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
            <span class="text-xs xs:text-sm text-gray-900">Mostrando 1 a 2 de 50 Entradas</span>
            <div class="inline-flex mt-2 xs:mt-0">
                <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">Ant</button>
                <button class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">Sig</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Crear/Editar Usuario -->
<div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center border-b pb-3">
            <h3 class="text-lg font-medium text-gray-900">Nuevo Usuario</h3>
            <button onclick="closeModal('userModal')" class="text-gray-400 hover:text-gray-600">
                <span class="material-icons-round">close</span>
            </button>
        </div>
        <div class="mt-5">
            <form>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Correo</label>
                    <input type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Rol</label>
                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option>Estudiante</option>
                        <option>Docente</option>
                        <option>Administrador</option>
                    </select>
                </div>
                <div class="flex justify-end pt-4 border-t mt-5">
                    <button type="button" onclick="closeModal('userModal')" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
</script>
