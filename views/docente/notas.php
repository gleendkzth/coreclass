<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado y filtros -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Calificaciones</h1>
            <p class="text-gray-500 mt-1">Selecciona un curso y evaluación para registrar las notas.</p>
        </div>
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
                <label for="evaluacion-select" class="text-sm font-medium text-gray-700">Evaluación:</label>
                <select id="evaluacion-select" class="mt-1 w-full md:w-64 bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>Práctica Calificada 1</option>
                    <option>Examen Parcial</option>
                    <option>Proyecto Final</option>
                </select>
            </div>
        </div>
        <div class="flex items-center gap-2 mt-4 md:mt-0">
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">download</span>
                Exportar
            </button>
            <button class="bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">save</span>
                Guardar Cambios
            </button>
        </div>
    </div>

    <!-- tabla de calificaciones -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">N°</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Estudiante</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Nota (0-20)</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Promedio Curso</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- fila de estudiante 1 -->
                <tr>
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
                        <input type="number" min="0" max="20" class="w-24 text-center border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-sm" value="16">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800">15.5</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Aprobado</span>
                    </td>
                </tr>
                <!-- fila de estudiante 2 -->
                <tr>
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
                        <input type="number" min="0" max="20" class="w-24 text-center border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-sm" value="09">
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-800">10.1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-center">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Reprobado</span>
                    </td>
                </tr>
                <!-- más filas dinámicas -->
            </tbody>
        </table>
    </div>
</div>
