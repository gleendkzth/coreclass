<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Materiales de Estudio</h1>
                <p class="text-red-200 mt-1">Encuentra todos los recursos para tus cursos.</p>
            </div>
            <div class="p-3 bg-white/20 rounded-lg">
                <span class="material-icons-round text-white text-4xl">folder_shared</span>
            </div>
        </div>
    </div>

    <!-- Resumen de materiales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Archivos -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">folder</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Archivos</p>
                    <p class="text-2xl font-bold text-gray-800">142</p>
                </div>
            </div>
        </div>

        <!-- Documentos -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">description</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">PDFs</p>
                    <p class="text-2xl font-bold text-gray-800">68</p>
                </div>
            </div>
        </div>

        <!-- Videos -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">play_circle</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Videos</p>
                    <p class="text-2xl font-bold text-gray-800">34</p>
                </div>
            </div>
        </div>

        <!-- Códigos -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">code</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Códigos</p>
                    <p class="text-2xl font-bold text-gray-800">40</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
        <div class="flex flex-col md:flex-row gap-4 items-center">
            <div class="flex-1 w-full">
                <div class="relative">
                    <span class="material-icons-round absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                    <input type="text" placeholder="Buscar materiales por nombre..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-800 focus:border-transparent transition-colors">
                </div>
            </div>
            <div class="flex gap-2 flex-wrap">
                <button class="px-4 py-2 rounded-lg bg-red-800 text-white text-sm font-medium hover:bg-red-900 transition-colors flex items-center">
                    <span class="material-icons-round text-sm mr-1">apps</span> Todos
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-red-100 hover:text-red-800 transition-colors flex items-center">
                    <span class="material-icons-round text-sm mr-1">picture_as_pdf</span> PDF
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-red-100 hover:text-red-800 transition-colors flex items-center">
                    <span class="material-icons-round text-sm mr-1">videocam</span> Videos
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-red-100 hover:text-red-800 transition-colors flex items-center">
                    <span class="material-icons-round text-sm mr-1">integration_instructions</span> Código
                </button>
            </div>
        </div>
    </div>

    <!-- Materiales por Unidad Didáctica -->
    <div class="space-y-6">
        <!-- Programación Web -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-lg mr-4">
                        <span class="material-icons-round text-red-800">code</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Programación Web</h2>
                        <p class="text-sm text-gray-500">24 archivos disponibles</p>
                    </div>
                </div>
                <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todos</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Guía Completa HTML5 y CSS3</h3>
                            <p class="text-sm text-gray-500 mt-1">PDF • 5.2 MB • <span class="font-medium">Actualizado ayer</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">play_circle</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Introducción a JavaScript ES6</h3>
                            <p class="text-sm text-gray-500 mt-1">Video • 45 min • <span class="font-medium">Hace 2 días</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">play_arrow</span>Reproducir
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">bookmark_add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">folder_zip</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Proyecto Landing Page</h3>
                            <p class="text-sm text-gray-500 mt-1">ZIP • 2.8 MB • <span class="font-medium">Hace 1 semana</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Base de Datos -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-lg mr-4">
                        <span class="material-icons-round text-red-800">storage</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Base de Datos</h2>
                        <p class="text-sm text-gray-500">18 archivos disponibles</p>
                    </div>
                </div>
                <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todos</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Ejercicios Prácticos SQL</h3>
                            <p class="text-sm text-gray-500 mt-1">PDF • 3.1 MB • <span class="font-medium">Hace 3 días</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">integration_instructions</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Scripts de Base de Datos</h3>
                            <p class="text-sm text-gray-500 mt-1">SQL • 456 KB • <span class="font-medium">Hace 5 días</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">play_circle</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Normalización de Bases de Datos</h3>
                            <p class="text-sm text-gray-500 mt-1">Video • 32 min • <span class="font-medium">Hace 1 semana</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">play_arrow</span>Reproducir
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">bookmark_add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metodologías Ágiles -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-lg mr-4">
                        <span class="material-icons-round text-red-800">groups</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Metodologías Ágiles</h2>
                        <p class="text-sm text-gray-500">15 archivos disponibles</p>
                    </div>
                </div>
                <a href="#" class="text-sm text-red-800 hover:underline font-medium">Ver todos</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Guía de Scrum Framework</h3>
                            <p class="text-sm text-gray-500 mt-1">PDF • 4.8 MB • <span class="font-medium">Hace 2 días</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">slideshow</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Presentación Kanban</h3>
                            <p class="text-sm text-gray-500 mt-1">PPTX • 1.2 MB • <span class="font-medium">Hace 4 días</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 hover:shadow-md hover:bg-gray-100 transition-all duration-300">
                    <div class="flex items-start gap-4">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                            <span class="material-icons-round text-red-800">description</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-semibold text-gray-800 truncate">Casos de Estudio Ágiles</h3>
                            <p class="text-sm text-gray-500 mt-1">DOCX • 892 KB • <span class="font-medium">Hace 1 semana</span></p>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-2 bg-red-800 text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center justify-center">
                                    <span class="material-icons-round text-base mr-1">download</span>Descargar
                                </button>
                                <button class="p-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition-colors">
                                    <span class="material-icons-round text-base">visibility</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
