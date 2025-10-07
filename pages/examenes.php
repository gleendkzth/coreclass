<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, aquí están tus exámenes</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Prepárate para tus evaluaciones próximas</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La preparación es la clave del éxito"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de exámenes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Próximos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">upcoming</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Próximos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">3</p>
                </div>
            </div>
        </div>

        <!-- Completados -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">done_all</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Completados</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">12</p>
                </div>
            </div>
        </div>

        <!-- Promedio -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">analytics</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Promedio Exámenes</p>
                    <div class="flex items-baseline mt-1">
                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">15.2</p>
                        <span class="text-sm text-gray-400 ml-1">/20</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Esta Semana -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">event</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Esta Semana</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Exámenes Próximos -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-indigo-600">quiz</span>
            Exámenes Próximos
        </h2>

        <div class="space-y-4">
            <!-- Examen 1 - Esta Semana -->
            <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-xl p-6 border-l-4 border-red-500 hover:shadow-md transition-all duration-300">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-3 bg-red-100 rounded-xl">
                                <span class="material-icons-round text-red-600">quiz</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Examen Parcial - Programación Web</h3>
                                <p class="text-sm text-gray-600">Ing. Jonatan</p>
                            </div>
                        </div>
                        <div class="ml-16 space-y-2">
                            <p class="text-sm text-gray-700"><strong>Temas:</strong> HTML5, CSS3, JavaScript, DOM Manipulation, Responsive Design</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-red-600 font-bold">
                                    <span class="material-icons-round text-sm mr-1">schedule</span>
                                    Jueves 10/10/2025 - 10:00 AM
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">timer</span>
                                    Duración: 90 minutos
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">location_on</span>
                                    Laboratorio 3
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 lg:ml-4">
                        <span class="px-4 py-2 bg-red-100 text-red-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                            En 5 días
                        </span>
                    </div>
                </div>
            </div>

            <!-- Examen 2 - Próxima Semana -->
            <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl p-6 border-l-4 border-yellow-500 hover:shadow-md transition-all duration-300">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-3 bg-yellow-100 rounded-xl">
                                <span class="material-icons-round text-yellow-600">quiz</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Examen Final - Metodologías Ágiles</h3>
                                <p class="text-sm text-gray-600">Ing. Jonatan</p>
                            </div>
                        </div>
                        <div class="ml-16 space-y-2">
                            <p class="text-sm text-gray-700"><strong>Temas:</strong> Scrum, Kanban, XP, Historias de Usuario, Sprint Planning</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-yellow-700 font-bold">
                                    <span class="material-icons-round text-sm mr-1">schedule</span>
                                    Lunes 14/10/2025 - 11:30 AM
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">timer</span>
                                    Duración: 120 minutos
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">location_on</span>
                                    Aula 201
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 lg:ml-4">
                        <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                            En 9 días
                        </span>
                    </div>
                </div>
            </div>

            <!-- Examen 3 -->
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="p-3 bg-blue-100 rounded-xl">
                                <span class="material-icons-round text-blue-600">quiz</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Examen Parcial - Base de Datos</h3>
                                <p class="text-sm text-gray-600">Ing. Mario</p>
                            </div>
                        </div>
                        <div class="ml-16 space-y-2">
                            <p class="text-sm text-gray-700"><strong>Temas:</strong> SQL Avanzado, Joins, Subconsultas, Funciones Agregadas, Normalización</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-blue-700 font-bold">
                                    <span class="material-icons-round text-sm mr-1">schedule</span>
                                    Viernes 18/10/2025 - 8:00 AM
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">timer</span>
                                    Duración: 90 minutos
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">location_on</span>
                                    Laboratorio 2
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 lg:mt-0 lg:ml-4">
                        <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                            En 13 días
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Exámenes -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-purple-600">history</span>
            Historial de Exámenes
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Unidad Didáctica</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
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
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">15/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">16/20</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Aprobado</span>
                        </td>
                    </tr>
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
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">18/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">17/20</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Aprobado</span>
                        </td>
                    </tr>
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
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">20/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">14/20</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Regular</span>
                        </td>
                    </tr>
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
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">22/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-orange-600">16/20</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Aprobado</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
