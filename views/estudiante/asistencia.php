<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Asistencia</h1>
            <p class="text-red-200 mt-1">Aquí tienes un resumen detallado de tu asistencia.</p>
        </div>
    </div>

    <!-- Widgets de resumen -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Asistencia General -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">event_available</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Asistencia General</p>
                    <p class="text-2xl font-bold text-gray-800">85%</p>
                </div>
            </div>
        </div>

        <!-- Presente Hoy -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">check_circle</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Presente Hoy</p>
                    <p class="text-2xl font-bold text-gray-800">Sí</p>
                </div>
            </div>
        </div>

        <!-- Faltas (Mes) -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">event_busy</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Faltas (Mes)</p>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>

        <!-- Tardanzas -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">schedule</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Tardanzas</p>
                    <p class="text-2xl font-bold text-gray-800">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Registro de Asistencia por Unidad Didáctica -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-red-800">event_note</span>
            Registro de Asistencia
        </h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad Didáctica</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Asistencias</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Faltas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tardanzas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Porcentaje</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Fila de ejemplo 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">Programación Web</p>
                            <p class="text-xs text-gray-500">Ing. Jonatan</p>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">11 / 12</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">1</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">0</td>
                        <td class="px-6 py-4 text-center text-lg font-bold text-green-600">92%</td>
                    </tr>
                    <!-- Fila de ejemplo 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">Metodologías Ágiles</p>
                            <p class="text-xs text-gray-500">Ing. Jonatan</p>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">8 / 8</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">0</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">0</td>
                        <td class="px-6 py-4 text-center text-lg font-bold text-green-600">100%</td>
                    </tr>
                    <!-- Fila de ejemplo 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">Base de Datos</p>
                            <p class="text-xs text-gray-500">Ing. Mario</p>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">8 / 10</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">2</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">1</td>
                        <td class="px-6 py-4 text-center text-lg font-bold text-orange-500">80%</td>
                    </tr>
                    <!-- Fila de ejemplo 4 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">Algoritmos y Programación</p>
                            <p class="text-xs text-gray-500">Ing. Mario</p>
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">8 / 9</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">1</td>
                        <td class="px-6 py-4 text-center text-sm text-gray-700">0</td>
                        <td class="px-6 py-4 text-center text-lg font-bold text-green-600">89%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Últimas Clases -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-red-800">history</span>
            Historial de Clases Recientes
        </h2>
        <div class="space-y-3">
            <!-- Clase 1 -->
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                <div>
                    <p class="font-semibold text-gray-700">Programación Web</p>
                    <p class="text-sm text-gray-500">Hoy, 8:00 AM - 11:00 AM</p>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Presente</span>
            </div>
            <!-- Clase 2 -->
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                <div>
                    <p class="font-semibold text-gray-700">Metodologías Ágiles</p>
                    <p class="text-sm text-gray-500">Ayer, 9:40 AM - 11:10 AM</p>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Presente</span>
            </div>
            <!-- Clase 3 -->
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                <div>
                    <p class="font-semibold text-gray-700">Base de Datos</p>
                    <p class="text-sm text-gray-500">25/09/2025, 10:25 AM</p>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Falta</span>
            </div>
            <!-- Clase 4 -->
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                <div>
                    <p class="font-semibold text-gray-700">Algoritmos y Programación</p>
                    <p class="text-sm text-gray-500">22/09/2025, 8:00 AM</p>
                </div>
                <span class="px-3 py-1 text-xs font-semibold text-orange-800 bg-orange-100 rounded-full">Tardanza</span>
            </div>
             <div class="text-center pt-2">
                <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver historial completo</a>
            </div>
        </div>
    </div>
</div>
