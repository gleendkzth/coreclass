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
        <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
            <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold">Mi Horario Semanal</h1>
                <p class="text-red-200 mt-1">Organiza tu semana y aprovecha cada clase.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                <thead class="bg-red-800 text-white">
                    <tr>
                        <th class="w-28 px-3 py-2 text-center text-xs font-semibold uppercase tracking-wider">Hora</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-semibold uppercase tracking-wider">Lunes</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-semibold uppercase tracking-wider">Martes</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-semibold uppercase tracking-wider">Miércoles</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-semibold uppercase tracking-wider">Jueves</th>
                        <th class="w-1/5 px-4 py-2 text-center text-xs font-semibold uppercase tracking-wider">Viernes</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Hora 1: 8:00 - 8:45 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">8:00 - 8:45</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">laptop_chromebook</span><span class="font-semibold text-red-800 text-sm">Administración Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Ydelfonso</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">shopping_cart</span><span class="font-semibold text-red-800 text-sm">Comercio Electrónico</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Clemente</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">source</span><span class="font-semibold text-red-800 text-sm">Arquitectura de la Información</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Mario</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                    </tr>

                    <!-- Hora 2: 8:45 - 9:30 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">8:45 - 9:30</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">laptop_chromebook</span><span class="font-semibold text-red-800 text-sm">Administración Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Ydelfonso</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">shopping_cart</span><span class="font-semibold text-red-800 text-sm">Comercio Electrónico</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Clemente</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">source</span><span class="font-semibold text-red-800 text-sm">Arquitectura de la Información</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Mario</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                    </tr>

                    <!-- Receso -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">9:30 - 9:40</td>
                        <td colspan="5" class="text-center"><div class="text-sm font-medium text-gray-500">Receso</div></td>
                    </tr>

                    <!-- Hora 3: 9:40 - 10:25 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">9:40 - 10:25</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">laptop_chromebook</span><span class="font-semibold text-red-800 text-sm">Administración Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Ydelfonso</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">shopping_cart</span><span class="font-semibold text-red-800 text-sm">Comercio Electrónico</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Clemente</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">source</span><span class="font-semibold text-red-800 text-sm">Arquitectura de la Información</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Mario</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                    </tr>

                    <!-- Hora 4: 10:25 - 11:10 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">10:25 - 11:10</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">groups</span><span class="font-semibold text-red-800 text-sm">Metodologías Ágiles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">translate</span><span class="font-semibold text-red-800 text-sm">Comprensión de Inglés</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Julieta</p></div></td>
                    </tr>

                    <!-- Receso -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">11:10 - 11:30</td>
                        <td colspan="5" class="text-center"><div class="text-sm font-medium text-gray-500">Receso</div></td>
                    </tr>

                    <!-- Hora 5: 11:30 - 12:15 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">11:30 - 12:15</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">groups</span><span class="font-semibold text-red-800 text-sm">Metodologías Ágiles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">translate</span><span class="font-semibold text-red-800 text-sm">Comprensión de Inglés</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Julieta</p></div></td>
                    </tr>

                    <!-- Hora 6: 12:15 - 13:00 -->
                    <tr class="hora-fila">
                        <td class="px-3 py-1.5 whitespace-nowrap text-xs font-medium text-gray-600 text-center border-r">12:15 - 13:00</td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">groups</span><span class="font-semibold text-red-800 text-sm">Metodologías Ágiles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">code</span><span class="font-semibold text-red-800 text-sm">Programación Web</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Jonatan</p></div></td>
                        <td class="whitespace-normal border-r p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">phone_iphone</span><span class="font-semibold text-red-800 text-sm">Aplicaciones Móviles</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Alcides</p></div></td>
                        <td class="whitespace-normal p-1"><div class="bloque-horario bg-red-50 border border-red-200 rounded-lg p-2 h-full flex flex-col justify-center"><div class="flex items-center"><span class="material-icons-round text-red-700 mr-2 text-base">translate</span><span class="font-semibold text-red-800 text-sm">Comprensión de Inglés</span></div><p class="text-xs text-red-600 mt-1 ml-6">Ing. Julieta</p></div></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>