<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, explora tus materiales de estudio</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Accede a todos los recursos académicos de tus unidades didácticas</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"El conocimiento es poder"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de materiales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Total Archivos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">folder</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Total Archivos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">142</p>
                </div>
            </div>
        </div>

        <!-- Documentos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">description</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">PDFs</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">68</p>
                </div>
            </div>
        </div>

        <!-- Videos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-500">play_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Videos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">34</p>
                </div>
            </div>
        </div>

        <!-- Códigos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">code</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Códigos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">40</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros y búsqueda -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <span class="material-icons-round absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                    <input type="text" placeholder="Buscar materiales..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
            </div>
            <div class="flex gap-2 flex-wrap">
                <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition-colors">
                    Todos
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                    PDF
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                    Videos
                </button>
                <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                    Código
                </button>
            </div>
        </div>
    </div>

    <!-- Materiales por Unidad Didáctica -->
    <div class="space-y-6">
        <!-- Programación Web -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-xl mr-3">
                        <span class="material-icons-round text-blue-600">code</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Programación Web</h2>
                        <p class="text-sm text-gray-500">24 archivos disponibles</p>
                    </div>
                </div>
                <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Ver todos</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-blue-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-red-600">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Guía Completa HTML5 y CSS3</h3>
                            <p class="text-xs text-gray-500 mt-1">PDF • 5.2 MB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Actualizado ayer</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-blue-600 text-white rounded text-xs font-medium hover:bg-blue-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">remove_red_eye</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-blue-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-purple-600">play_circle</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Introducción a JavaScript ES6</h3>
                            <p class="text-xs text-gray-500 mt-1">Video • 45 min</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 2 días</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-blue-600 text-white rounded text-xs font-medium hover:bg-blue-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">play_arrow</span>Reproducir
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">bookmark_border</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-blue-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-green-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-green-600">code</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Proyecto Landing Page</h3>
                            <p class="text-xs text-gray-500 mt-1">ZIP • 2.8 MB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 1 semana</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-blue-600 text-white rounded text-xs font-medium hover:bg-blue-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Base de Datos -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-xl mr-3">
                        <span class="material-icons-round text-purple-600">storage</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Base de Datos</h2>
                        <p class="text-sm text-gray-500">18 archivos disponibles</p>
                    </div>
                </div>
                <button class="text-purple-600 hover:text-purple-700 text-sm font-medium">Ver todos</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-purple-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-red-600">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Ejercicios Prácticos SQL</h3>
                            <p class="text-xs text-gray-500 mt-1">PDF • 3.1 MB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 3 días</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-purple-600 text-white rounded text-xs font-medium hover:bg-purple-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">remove_red_eye</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-purple-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-green-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-green-600">code</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Scripts de Base de Datos</h3>
                            <p class="text-xs text-gray-500 mt-1">SQL • 456 KB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 5 días</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-purple-600 text-white rounded text-xs font-medium hover:bg-purple-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-purple-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-purple-600">play_circle</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Normalización de Bases de Datos</h3>
                            <p class="text-xs text-gray-500 mt-1">Video • 32 min</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 1 semana</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-purple-600 text-white rounded text-xs font-medium hover:bg-purple-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">play_arrow</span>Reproducir
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">bookmark_border</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metodologías Ágiles -->
        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-orange-100 rounded-xl mr-3">
                        <span class="material-icons-round text-orange-600">groups</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Metodologías Ágiles</h2>
                        <p class="text-sm text-gray-500">15 archivos disponibles</p>
                    </div>
                </div>
                <button class="text-orange-600 hover:text-orange-700 text-sm font-medium">Ver todos</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Material 1 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-orange-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-red-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-red-600">picture_as_pdf</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Guía de Scrum Framework</h3>
                            <p class="text-xs text-gray-500 mt-1">PDF • 4.8 MB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 2 días</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-orange-600 text-white rounded text-xs font-medium hover:bg-orange-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">remove_red_eye</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 2 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-orange-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-yellow-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-yellow-600">slideshow</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Presentación Kanban</h3>
                            <p class="text-xs text-gray-500 mt-1">PPTX • 1.2 MB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 4 días</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-orange-600 text-white rounded text-xs font-medium hover:bg-orange-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">info</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Material 3 -->
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all duration-300 hover:border-orange-300">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg flex-shrink-0">
                            <span class="material-icons-round text-blue-600">description</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-semibold text-gray-900 truncate">Casos de Estudio Ágiles</h3>
                            <p class="text-xs text-gray-500 mt-1">DOCX • 892 KB</p>
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-xs text-gray-500">Hace 1 semana</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <button class="flex-1 px-3 py-1.5 bg-orange-600 text-white rounded text-xs font-medium hover:bg-orange-700">
                                    <span class="material-icons-round text-xs align-middle mr-1">download</span>Descargar
                                </button>
                                <button class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded text-xs hover:bg-gray-200">
                                    <span class="material-icons-round text-xs">remove_red_eye</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
