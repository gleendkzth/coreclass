<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Exámenes</h1>
            <p class="text-red-200 mt-1">Consulta tus próximas evaluaciones y calificaciones.</p>
        </div>
    </div>

    <!-- Resumen de exámenes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Próximos -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">upcoming</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Exámenes Próximos</p>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>

        <!-- Completados -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">done_all</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Completados</p>
                    <p class="text-2xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>

        <!-- Promedio -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">grade</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Promedio General</p>
                    <p class="text-2xl font-bold text-gray-800">15.2<span class="text-base text-gray-500 font-normal">/20</span></p>
                </div>
            </div>
        </div>

        <!-- Esta Semana -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">event</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Esta Semana</p>
                    <p class="text-2xl font-bold text-gray-800">2</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Exámenes Próximos -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                        <span class="material-icons-round mr-2 text-red-800">quiz</span>
                        Exámenes Próximos
                    </h2>
                    <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todos</a>
                </div>
                <div class="space-y-4">
                    <!-- Examen 1 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-red-100 rounded-lg mr-4">
                            <span class="material-icons-round text-red-800">code</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Examen Parcial</p>
                            <p class="text-sm text-gray-500">Programación Web</p>
                        </div>
                        <div class="flex items-center space-x-4 ml-4">
                            <div class="text-right flex-shrink-0">
                                <p class="font-semibold text-red-800">En 5 días</p>
                                <p class="text-xs text-gray-500">10/10/2025</p>
                            </div>
                            <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                                Ver <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    <!-- Examen 2 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-yellow-100 rounded-lg mr-4">
                            <span class="material-icons-round text-yellow-800">groups</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Examen Final</p>
                            <p class="text-sm text-gray-500">Metodologías Ágiles</p>
                        </div>
                        <div class="flex items-center space-x-4 ml-4">
                            <div class="text-right flex-shrink-0">
                                <p class="font-semibold text-yellow-800">En 9 días</p>
                                <p class="text-xs text-gray-500">14/10/2025</p>
                            </div>
                            <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                                Ver <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                    <!-- Examen 3 -->
                    <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                        <div class="p-2 bg-blue-100 rounded-lg mr-4">
                            <span class="material-icons-round text-blue-800">storage</span>
                        </div>
                        <div class="flex-grow">
                            <p class="font-semibold text-gray-800">Examen Parcial</p>
                            <p class="text-sm text-gray-500">Base de Datos</p>
                        </div>
                        <div class="flex items-center space-x-4 ml-4">
                            <div class="text-right flex-shrink-0">
                                <p class="font-semibold text-blue-800">En 13 días</p>
                                <p class="text-xs text-gray-500">18/10/2025</p>
                            </div>
                            <a href="#" class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                                Ver <span class="material-icons-round text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Historial de Exámenes -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <span class="material-icons-round mr-2 text-red-800">history</span>
                Historial de Exámenes
            </h2>
            <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todos</a>
        </div>

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
                            <div class="text-sm font-medium text-gray-900">Programación Web</div>
                            <div class="text-xs text-gray-500">Ing. Jonatan</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">15/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold text-green-600">16<span class="text-sm text-gray-500 font-normal">/20</span></span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Aprobado</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Metodologías Ágiles</div>
                            <div class="text-xs text-gray-500">Ing. Jonatan</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">18/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold text-green-600">17<span class="text-sm text-gray-500 font-normal">/20</span></span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Aprobado</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Base de Datos</div>
                            <div class="text-xs text-gray-500">Ing. Mario</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">20/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold text-orange-500">14<span class="text-sm text-gray-500 font-normal">/20</span></span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Regular</span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Algoritmos y Programación</div>
                            <div class="text-xs text-gray-500">Ing. Mario</div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-900">Parcial 1</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm text-gray-600">22/09/2025</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold text-green-600">16<span class="text-sm text-gray-500 font-normal">/20</span></span>
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
