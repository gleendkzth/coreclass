<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, necesitas ayuda?</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Centro de soporte técnico y académico</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La ayuda oportuna hace la diferencia"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas de soporte -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Tickets Activos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">support</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Tickets Activos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">3</p>
                </div>
            </div>
        </div>

        <!-- Resueltos Esta Semana -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">check_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Resueltos Esta Semana</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">5</p>
                </div>
            </div>
        </div>

        <!-- Tiempo de Respuesta -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-500">schedule</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Tiempo de Respuesta</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">< 4h</p>
                </div>
            </div>
        </div>

        <!-- Recursos Disponibles -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">library_books</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Recursos Disponibles</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">24</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Categorías de soporte -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Soporte Técnico -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 bg-blue-100 rounded-xl">
                    <span class="material-icons-round text-blue-600">computer</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Soporte Técnico</h3>
                    <p class="text-sm text-gray-600">Problemas con plataformas y sistemas</p>
                </div>
            </div>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Acceso a la plataformas
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Problemas con software educativo
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Conectividad y redes
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Instalación de herramientas
                </li>
            </ul>
        </div>

        <!-- Soporte Académico -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 bg-green-100 rounded-xl">
                    <span class="material-icons-round text-green-600">school</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Soporte Académico</h3>
                    <p class="text-sm text-gray-600">Consultas sobre contenido y evaluaciones</p>
                </div>
            </div>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Dudas sobre materias
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Ayuda con tareas y proyectos
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Preparación para exámenes
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Orientación académica
                </li>
            </ul>
        </div>

        <!-- Soporte Administrativo -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-3 bg-purple-100 rounded-xl">
                    <span class="material-icons-round text-purple-600">assignment</span>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">Soporte Administrativo</h3>
                    <p class="text-sm text-gray-600">Trámites y procedimientos</p>
                </div>
            </div>
            <ul class="space-y-2 text-sm text-gray-700">
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Certificados y constancias
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Inscripciones y retiros
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Becas y ayudas estudiantiles
                </li>
                <li class="flex items-center gap-2">
                    <span class="material-icons-round text-green-500 text-sm">check_circle</span>
                    Información general
                </li>
            </ul>
        </div>
    </div>

    <!-- Estado de tickets recientes -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-indigo-600">confirmation_number</span>
            Estado de Tus Tickets Recientes
        </h2>

        <div class="space-y-4">
            <!-- Ticket 1 - En proceso -->
            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <span class="material-icons-round text-blue-600 text-sm">hourglass_empty</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Problema con acceso a Core Class</p>
                        <p class="text-sm text-gray-600">Ticket #001234 - Creado hace 2 horas</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">En Proceso</span>
            </div>

            <!-- Ticket 2 - Resuelto -->
            <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <span class="material-icons-round text-green-600 text-sm">check_circle</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Consulta sobre el horario para la siguiente semana</p>
                        <p class="text-sm text-gray-600">Ticket #001233 - Resuelto ayer</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Resuelto</span>
            </div>

            <!-- Ticket 3 - Pendiente -->
            <div class="flex items-center justify-between p-4 bg-amber-50 rounded-lg border-l-4 border-amber-500">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-amber-100 rounded-lg">
                        <span class="material-icons-round text-amber-600 text-sm">schedule</span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Solicitud de permiso</p>
                        <p class="text-sm text-gray-600">Ticket #001232 - Pendiente desde hace 3 días</p>
                    </div>
                </div>
                <span class="px-2 py-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">Pendiente</span>
            </div>
        </div>

        <div class="text-center mt-4">
            <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                Ver todos mis tickets <span class="material-icons-round align-middle">expand_more</span>
            </button>
        </div>
    </div>

    <!-- Crear nuevo ticket -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-green-600">add_circle</span>
            Crear Nuevo Ticket de Soporte
        </h2>

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Categoría:</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option>Seleccionar categoría...</option>
                        <option>Soporte Técnico</option>
                        <option>Soporte Académico</option>
                        <option>Soporte Administrativo</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prioridad:</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option>Seleccionar prioridad...</option>
                        <option>Baja</option>
                        <option>Media</option>
                        <option>Alta</option>
                        <option>Crítica</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Asunto:</label>
                <input type="text" placeholder="Breve descripción del problema..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción detallada:</label>
                <textarea rows="4" placeholder="Describe tu problema con el mayor detalle posible..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                    Cancelar
                </button>
                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-medium">
                    <span class="material-icons-round text-sm mr-1 align-middle">send</span>
                    Crear Ticket
                </button>
            </div>
        </div>
    </div>
</div>
