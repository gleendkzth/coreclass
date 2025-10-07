<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, revisa tu asistencia</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Mantén el control de tu asistencia académica</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La puntualidad es la cortesía de los reyes"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de asistencia -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Asistencia General -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">event_available</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Asistencia General</p>
                    <div class="flex items-baseline mt-1">
                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">85%</p>
                        <span class="text-sm text-gray-400 ml-1">Regular</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Presente Hoy -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">check_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Presente Hoy</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">Sí</p>
                </div>
            </div>
        </div>

        <!-- Faltas Este Mes -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">warning</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Faltas Este Mes</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">3</p>
                </div>
            </div>
        </div>

        <!-- Tardanzas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">schedule</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Tardanzas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Registro de Asistencia por Unidad Didáctica -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-indigo-600">event_note</span>
            Registro de Asistencia por Unidad Didáctica
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad Didáctica</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Clases Totales</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Asistencias</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Faltas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tardanzas</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Porcentaje</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Programación Web -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-blue-600 text-sm">code</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Programación Web</div>
                                    <div class="text-xs text-gray-500">Ing. Jonatan</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">12</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">11</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">92%</span>
                        </td>
                    </tr>

                    <!-- Metodologías Ágiles -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-orange-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-orange-600 text-sm">groups</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Metodologías Ágiles</div>
                                    <div class="text-xs text-gray-500">Ing. Jonatan</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">100%</span>
                        </td>
                    </tr>

                    <!-- Base de Datos -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-purple-600 text-sm">storage</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Base de Datos</div>
                                    <div class="text-xs text-gray-500">Ing. Mario</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">10</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">2</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">80%</span>
                        </td>
                    </tr>

                    <!-- Algoritmos -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-amber-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-amber-600 text-sm">psychology</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Algoritmos y Programación</div>
                                    <div class="text-xs text-gray-500">Ing. Mario</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">9</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">89%</span>
                        </td>
                    </tr>

                    <!-- Inglés Técnico -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-pink-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-pink-600 text-sm">translate</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Comprensión y Redacción de Inglés</div>
                                    <div class="text-xs text-gray-500">Ing. Julieta</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">6</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">6</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">100%</span>
                        </td>
                    </tr>

                    <!-- Front End -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-cyan-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-cyan-600 text-sm">palette</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Desarrollo Front End</div>
                                    <div class="text-xs text-gray-500">Ing. Jonatan</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-gray-900">8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-green-800">7</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800">1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800">1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">88%</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Últimas Clases -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-purple-600">schedule</span>
            Últimas 10 Clases
        </h2>

        <div class="space-y-3">
            <!-- Clase 1 - Hoy -->
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <span class="material-icons-round text-green-600 text-sm">check_circle</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Programación Web - Laboratorio</p>
                        <p class="text-sm text-gray-600">Hoy, 8:00 AM - 11:00 AM</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Presente</span>
            </div>

            <!-- Clase 2 - Ayer -->
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <span class="material-icons-round text-blue-600 text-sm">check_circle</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Metodologías Ágiles - Teórica</p>
                        <p class="text-sm text-gray-600">Ayer, 9:40 AM - 11:10 AM</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Presente</span>
            </div>

            <!-- Clase 3 - Falta -->
            <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border-l-4 border-red-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-600 text-sm">cancel</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Base de Datos - Laboratorio</p>
                        <p class="text-sm text-gray-600">25/09/2025, 10:25 AM - 11:55 AM</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Falta</span>
            </div>

            <!-- Clase 4 - Tardanza -->
            <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-amber-100 rounded-lg">
                        <span class="material-icons-round text-amber-600 text-sm">schedule</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Algoritmos y Programación - Teórica</p>
                        <p class="text-sm text-gray-600">22/09/2025, 8:00 AM - 9:30 AM</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">Tardanza</span>
            </div>

            <!-- Más clases -->
            <div class="text-center mt-4">
                <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                    Ver historial completo <span class="material-icons-round align-middle">expand_more</span>
                </button>
            </div>
        </div>
    </div>
</div>
