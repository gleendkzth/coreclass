<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, gestiona tus tareas y entregas</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Mantén el control de tus actividades pendientes</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La constancia es la clave del logro"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de tareas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Pendientes -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">pending_actions</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Pendientes</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">8</p>
                </div>
            </div>
        </div>

        <!-- Entregadas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">check_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Entregadas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">15</p>
                </div>
            </div>
        </div>

        <!-- Por Vencer -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">schedule</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Por Vencer</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">3</p>
                </div>
            </div>
        </div>

        <!-- Calificadas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">grading</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Calificadas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
        <div class="flex flex-wrap gap-2">
            <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition-colors">
                Todas
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                Pendientes
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                Entregadas
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                Vencidas
            </button>
        </div>
    </div>

    <!-- Lista de tareas -->
    <div class="space-y-4">
        <!-- Tarea 1 - Urgente -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-red-500 p-6 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-red-100 rounded-xl">
                            <span class="material-icons-round text-red-600">assignment</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Proyecto Final - Sistema de Gestión</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-800">Urgente</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Desarrollar un sistema completo de gestión de tareas con autenticación, CRUD y reportes.</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-blue-600 text-sm mr-1">school</span>
                                    Programación Web
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">person</span>
                                    Ing. Jonatan
                                </div>
                                <div class="flex items-center text-red-600 font-medium">
                                    <span class="material-icons-round text-sm mr-1">event</span>
                                    Vence: 12/10/2025 (10 días)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4 flex gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        <span class="material-icons-round text-sm mr-1 align-middle">upload</span>
                        Entregar
                    </button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Ver detalles
                    </button>
                </div>
            </div>
        </div>

        <!-- Tarea 2 - Próxima -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-yellow-500 p-6 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-yellow-100 rounded-xl">
                            <span class="material-icons-round text-yellow-600">description</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Ensayo sobre Scrum</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Próxima</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Redactar un ensayo de 5 páginas sobre la metodología Scrum y su implementación en proyectos reales.</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-orange-600 text-sm mr-1">school</span>
                                    Metodologías Ágiles
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">person</span>
                                    Ing. Jonatan
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">event</span>
                                    Vence: 15/10/2025 (13 días)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4 flex gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        <span class="material-icons-round text-sm mr-1 align-middle">upload</span>
                        Entregar
                    </button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Ver detalles
                    </button>
                </div>
            </div>
        </div>

        <!-- Tarea 3 - Normal -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <span class="material-icons-round text-blue-600">code</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Ejercicios SQL Avanzados</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">Normal</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Resolver 10 ejercicios de consultas SQL avanzadas incluyendo joins, subconsultas y funciones agregadas.</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-purple-600 text-sm mr-1">school</span>
                                    Base de Datos
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">person</span>
                                    Ing. Mario
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-sm mr-1">event</span>
                                    Vence: 18/10/2025 (16 días)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4 flex gap-2">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        <span class="material-icons-round text-sm mr-1 align-middle">upload</span>
                        Entregar
                    </button>
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Ver detalles
                    </button>
                </div>
            </div>
        </div>

        <!-- Tarea 4 - Entregada -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-all duration-300 opacity-75">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-green-100 rounded-xl">
                            <span class="material-icons-round text-green-600">check_circle</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Prototipo de Interfaz Móvil</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Entregada</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Diseñar prototipo de interfaz para aplicación móvil usando Figma.</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-indigo-600 text-sm mr-1">school</span>
                                    Desarrollo Móvil
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">person</span>
                                    Ing. Alcides
                                </div>
                                <div class="flex items-center text-green-600 font-medium">
                                    <span class="material-icons-round text-sm mr-1">check</span>
                                    Entregado: 28/09/2025
                                </div>
                                <div class="flex items-center text-green-600 font-medium">
                                    <span class="material-icons-round text-sm mr-1">star</span>
                                    Calificación: 18/20
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4 flex gap-2">
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Ver entrega
                    </button>
                </div>
            </div>
        </div>

        <!-- Tarea 5 - Entregada y Calificada -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-all duration-300 opacity-75">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-start gap-4">
                        <div class="p-3 bg-green-100 rounded-xl">
                            <span class="material-icons-round text-green-600">assignment_turned_in</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <h3 class="text-lg font-semibold text-gray-900">Algoritmos de Ordenamiento</h3>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Calificada</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Implementar algoritmos de ordenamiento (Bubble Sort, Quick Sort, Merge Sort) en Python.</p>
                            <div class="flex flex-wrap gap-3 text-sm">
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">school</span>
                                    Algoritmos y Programación
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <span class="material-icons-round text-amber-600 text-sm mr-1">person</span>
                                    Ing. Roberto
                                </div>
                                <div class="flex items-center text-green-600 font-medium">
                                    <span class="material-icons-round text-sm mr-1">check</span>
                                    Entregado: 25/09/2025
                                </div>
                                <div class="flex items-center text-green-600 font-bold">
                                    <span class="material-icons-round text-sm mr-1">star</span>
                                    Calificación: 16/20
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4 flex gap-2">
                    <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                        Ver feedback
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
