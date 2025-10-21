<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Mis Calificaciones</h1>
            <p class="text-red-200 mt-1">Aquí tienes un resumen de tu rendimiento en cada curso.</p>
        </div>
    </div>

    <!-- Widgets de resumen -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Promedio General -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">grade</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Promedio General</p>
                    <p class="text-2xl font-bold text-gray-800">15.2</p>
                </div>
            </div>
        </div>

        <!-- Cursos Aprobados -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <span class="material-icons-round text-green-800">check_circle</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cursos Aprobados</p>
                    <p class="text-2xl font-bold text-gray-800">5</p>
                </div>
            </div>
        </div>

        <!-- Cursos en Riesgo -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">warning</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Cursos en Riesgo</p>
                    <p class="text-2xl font-bold text-gray-800">1</p>
                </div>
            </div>
        </div>

        <!-- Mejor Nota -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200">
            <div class="flex items-center">
                <div class="p-3 bg-amber-100 rounded-lg">
                    <span class="material-icons-round text-amber-800">emoji_events</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Mejor Nota</p>
                    <p class="text-2xl font-bold text-gray-800">18.0</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Título de la sección de calificaciones -->
    <h2 class="text-2xl font-bold text-gray-800 mt-6">Calificaciones por Curso</h2>

    <!-- Grid de cursos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Tarjeta de Curso: Programación Web -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">code</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Programación Web</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Jonatan</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">16</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">18</span></div>
                                        <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">17</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">18</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">17.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Metodologías Ágiles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">groups</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Metodologías Ágiles</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Jonatan</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">15</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">14</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">16</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">17</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">15.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Aplicaciones Móviles -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">phone_iphone</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Aplicaciones Móviles</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Alcides</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">12</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">10</span></div>
                                        <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">09</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">11</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-red-600">10.3</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Reprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Administración Web -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">laptop_chromebook</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Administración Web</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Ydelfonso</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">14</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">16</span></div>
                                        <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">15</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">16</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">15.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Comercio Electrónico -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">shopping_cart</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Comercio Electrónico</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Clemente</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">13</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">15</span></div>
                                        <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">14</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">15</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">14.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Arquitectura de la Información -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">source</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Arquitectura de la Información</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Mario</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">17</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">16</span></div>
                                        <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">18</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">18</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">17.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Comprensión de Inglés -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-red-100 rounded-lg">
                        <span class="material-icons-round text-red-800">translate</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Comprensión de Inglés</h3>
                        <p class="text-sm text-gray-500">Docente: Ing. Julieta</p>
                    </div>
                </div>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between"><span class="text-gray-600">Nota 1:</span><span class="font-medium text-gray-800">15</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 2:</span><span class="font-medium text-gray-800">17</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Nota 3:</span><span class="font-medium text-gray-800">16</span></div>
                    <div class="flex justify-between"><span class="text-gray-600">Proyecto Final:</span><span class="font-medium text-gray-800">16</span></div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-green-600">16.0</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aprobado</span>
                </div>
            </div>
        </div>

        <!-- Tarjeta de Curso: Apps de Escritorio -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
            <div class="p-5">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-gray-100 rounded-lg">
                        <span class="material-icons-round text-gray-500">desktop_windows</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Apps de Escritorio</h3>
                        <p class="text-sm text-gray-500">Próximamente</p>
                    </div>
                </div>
                <div class="text-center py-4">
                    <p class="text-sm text-gray-500">Este curso aún no ha comenzado.</p>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center border-t border-gray-200">
                <span class="text-sm font-semibold text-gray-600">Promedio Final:</span>
                <div class="text-right">
                    <p class="text-xl font-bold text-gray-500">-</p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">No iniciado</span>
                </div>
            </div>
        </div>

    </div>
</div>
