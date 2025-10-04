<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hora-fila {
            height: 56px;
        }
        .bloque-horario {
            transition: all 0.3s ease;
            padding: 0.5rem !important;
            font-size: 0.9em;
            line-height: 1.2;

        }
        .bloque-horario:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
        <!-- Encabezado de la página -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">

        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
            <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
            
            <div class="relative z-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, este es tu horario semanal</h1>
                        <p class="text-blue-100/90 mt-2 text-lg">Organiza tu semana y aprovecha cada clase.</p>
                    </div>
                    <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                        <p class="text-sm font-medium flex items-center">
                            <span class="material-icons-round mr-2 text-yellow-300">task_alt</span>
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La disciplina es el puente entre metas y logros."</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="w-28 px-3 py-1.5 text-left text-xs font-medium uppercase tracking-wider">Hora</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Lunes</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Martes</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Miércoles</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Jueves</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-medium uppercase tracking-wider">Viernes</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Hora 1: 8:00 - 8:45 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">8:00 - 8:45</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-blue-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-laptop-code text-blue-600 mr-2"></i>
                                <span class="font-semibold text-blue-800">Administración Web</span>
                            </div>
                            <p class="text-xs text-blue-600">Ing. Ydelfonso</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-purple-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-shopping-cart text-purple-600 mr-2"></i>
                                <span class="font-semibold text-purple-800">Comercio Electrónico</span>
                            </div>
                            <p class="text-xs text-purple-600">Ing. Clemente</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-yellow-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-server text-yellow-600 mr-2"></i>
                                <span class="font-semibold text-yellow-800">Arquitectura de la Información</span>
                            </div>
                            <p class="text-xs text-yellow-600">Ing. Mario</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                    </tr>

                    <!-- Hora 2: 8:45 - 9:30 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">8:45 - 9:30</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-blue-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-laptop-code text-blue-600 mr-2"></i>
                                <span class="font-semibold text-blue-800">Administración Web</span>
                            </div>
                            <p class="text-xs text-blue-600">Ing. Ydelfonso</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-purple-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-shopping-cart text-purple-600 mr-2"></i>
                                <span class="font-semibold text-purple-800">Comercio Electrónico</span>
                            </div>
                            <p class="text-xs text-purple-600">Ing. Clemente</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-yellow-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-server text-yellow-600 mr-2"></i>
                                <span class="font-semibold text-yellow-800">Arquitectura de la Información</span>
                            </div>
                            <p class="text-xs text-yellow-600">Ing. Mario</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                    </tr>

                    <!-- Receso corto 9:30 - 9:40 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">9:30 - 9:40</td>
                        <td colspan="5" class="px-6 py-4 bg-gray-100 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-medium text-amber-700">Receso</span>
                            </div>
                        </td>
                    </tr>

                    <!-- Hora 3: 9:40 - 10:25 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">9:40 - 10:25</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-blue-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-laptop-code text-blue-600 mr-2"></i>
                                <span class="font-semibold text-blue-800">Administración Web</span>
                            </div>
                            <p class="text-xs text-blue-600">Ing. Ydelfonso</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-purple-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-shopping-cart text-purple-600 mr-2"></i>
                                <span class="font-semibold text-purple-800">Comercio Electrónico</span>
                            </div>
                            <p class="text-xs text-purple-600">Ing. Clemente</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-yellow-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-server text-yellow-600 mr-2"></i>
                                <span class="font-semibold text-yellow-800">Arquitectura de la Información</span>
                            </div>
                            <p class="text-xs text-yellow-600">Ing. Mario</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                    </tr>

                    <!-- Hora 4: 10:25 - 11:10 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">10:25 - 11:10</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-orange-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-tasks text-orange-600 mr-2"></i>
                                <span class="font-semibold text-orange-800">Metodologías Ágiles</span>
                            </div>
                            <p class="text-xs text-orange-600">Ing. Jonatan</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-pink-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-language text-pink-600 mr-2"></i>
                                <span class="font-semibold text-pink-800">Comprensión y Redacción de Inglés</span>
                            </div>
                            <p class="text-xs text-pink-600">Ing. Julieta</p>
                        </td>
                    </tr>

                    <!-- Receso largo 11:10 - 11:30 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">11:10 - 11:30</td>
                        <td colspan="5" class="px-6 py-4 bg-amber-50 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-medium text-amber-700">Receso</span>
                            </div>
                        </td>
                    </tr>

                    <!-- Hora 5: 11:30 - 12:15 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">11:30 - 12:15</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-orange-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-tasks text-orange-600 mr-2"></i>
                                <span class="font-semibold text-orange-800">Metodologías Ágiles</span>
                            </div>
                            <p class="text-xs text-orange-600">Ing. Jonatan</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-pink-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-language text-pink-600 mr-2"></i>
                                <span class="font-semibold text-pink-800">Comprensión y Redacción de Inglés</span>
                            </div>
                            <p class="text-xs text-pink-600">Ing. Julieta</p>
                        </td>
                    </tr>

                    <!-- Hora 6: 12:15 - 13:00 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-900 text-center border-r">12:15 - 13:00</td>
                        <!-- Lunes -->
                        <td class="whitespace-normal border-r bloque-horario bg-orange-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-tasks text-orange-600 mr-2"></i>
                                <span class="font-semibold text-orange-800">Metodologías Ágiles</span>
                            </div>
                            <p class="text-xs text-orange-600">Ing. Jonatan</p>
                        </td>
                        <!-- Martes -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Miércoles -->
                        <td class="whitespace-normal border-r bloque-horario bg-green-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-code text-green-600 mr-2"></i>
                                <span class="font-semibold text-green-800">Programación Web</span>
                            </div>
                            <p class="text-xs text-green-600">Ing. Jonatan</p>
                        </td>
                        <!-- Jueves -->
                        <td class="whitespace-normal border-r bloque-horario bg-indigo-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i>
                                <span class="font-semibold text-indigo-800">Desarrollo de Aplicaciones Móviles</span>
                            </div>
                            <p class="text-xs text-indigo-600">Ing. Alcides</p>
                        </td>
                        <!-- Viernes -->
                        <td class="whitespace-normal bloque-horario bg-pink-100 rounded-lg">
                            <div class="flex items-center mb-0">
                                <i class="fas fa-language text-pink-600 mr-2"></i>
                                <span class="font-semibold text-pink-800">Comprensión y Redacción de Inglés</span>
                            </div>
                            <p class="text-xs text-pink-600">Ing. Julieta</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>