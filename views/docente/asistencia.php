<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Registro de Asistencia</h1>
        <p class="text-gray-500 mt-1">Selecciona un curso y la fecha para pasar lista.</p>
    </div>

    <!-- filtros y acciones -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
            <div class="w-full md:w-auto">
                <label for="curso-select" class="text-sm font-medium text-gray-700">Curso:</label>
                <select id="curso-select" class="mt-1 w-full md:w-64 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>Programación Web</option>
                    <option>Bases de Datos</option>
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="fecha-asistencia" class="text-sm font-medium text-gray-700">Fecha:</label>
                <input type="date" id="fecha-asistencia" value="<?php echo date('Y-m-d'); ?>" class="mt-1 w-full md:w-auto bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            </div>
        </div>
        <div class="flex items-center gap-2 mt-4 md:mt-0">
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">select_all</span>
                Marcar Todos
            </button>
            <button class="bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">save</span>
                Guardar Asistencia
            </button>
        </div>
    </div>

    <!-- tabla de asistencia -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">N°</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Estudiante</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- fila de estudiante 1 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover" src="https://via.placeholder.com/40" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Ana García</div>
                                <div class="text-sm text-gray-500">ana.garcia@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">Presente</button>
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200 opacity-50 hover:opacity-100">Ausente</button>
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 opacity-50 hover:opacity-100">Tarde</button>
                        </div>
                    </td>
                </tr>
                <!-- fila de estudiante 2 -->
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                                <img class="h-10 w-10 rounded-full object-cover" src="https://via.placeholder.com/40" alt="">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Carlos Torres</div>
                                <div class="text-sm text-gray-500">carlos.torres@example.com</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 border border-green-200 opacity-50 hover:opacity-100">Presente</button>
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Ausente</button>
                            <button class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 opacity-50 hover:opacity-100">Tarde</button>
                        </div>
                    </td>
                </tr>
                <!-- más filas dinámicas -->
            </tbody>
        </table>
    </div>
</div>
