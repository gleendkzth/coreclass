<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, revisa tus mensajes</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Mantén la comunicación con tus profesores y compañeros</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"La comunicación es la clave del éxito"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen de mensajes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Mensajes Recibidos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">mail</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Recibidos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">24</p>
                </div>
            </div>
        </div>

        <!-- Mensajes Enviados -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">send</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Enviados</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">18</p>
                </div>
            </div>
        </div>

        <!-- No Leídos -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">mark_email_unread</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">No Leídos</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">5</p>
                </div>
            </div>
        </div>

        <!-- Esta Semana -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-500">today</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Esta Semana</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
        <div class="flex flex-wrap gap-2">
            <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition-colors">
                Todos
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                No Leídos
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                Importantes
            </button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium hover:bg-gray-200 transition-colors">
                Profesores
            </button>
        </div>
    </div>

    <!-- Lista de mensajes -->
    <div class="space-y-4">
        <!-- Mensaje 1 - No leído (Importante) -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-red-500 p-6 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-red-100 rounded-xl">
                    <span class="material-icons-round text-red-600">warning</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-lg font-bold text-gray-900">Ing. Jonatan</h3>
                            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Importante</span>
                        </div>
                        <span class="text-sm text-gray-500">Hace 2 horas</span>
                    </div>
                    <p class="text-sm text-gray-700 mb-3"><strong>Recordatorio:</strong> El proyecto final de Programación Web vence mañana. Asegúrate de entregar toda la documentación requerida.</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                            <span class="material-icons-round text-sm mr-1 align-middle">reply</span>Responder
                        </button>
                        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                            Marcar como leído
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje 2 - No leído -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-blue-500 p-6 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-blue-100 rounded-xl">
                    <span class="material-icons-round text-blue-600">school</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-lg font-bold text-gray-900">Ing. Mario</h3>
                            <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Información</span>
                        </div>
                        <span class="text-sm text-gray-500">Ayer</span>
                    </div>
                    <p class="text-sm text-gray-700 mb-3">Hola Mark, ya se subio el material para el dia Jueves.</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                            <span class="material-icons-round text-sm mr-1 align-middle">reply</span>Responder
                        </button>
                        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                            Marcar como leído
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje 3 - Leído -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-green-500 p-6 hover:shadow-md transition-all duration-300 opacity-75">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-green-100 rounded-xl">
                    <span class="material-icons-round text-green-600">check_circle</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-lg font-bold text-gray-900">Ing. Alcides</h3>
                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Feedback</span>
                        </div>
                        <span class="text-sm text-gray-500">Anteayer</span>
                    </div>
                    <p class="text-sm text-gray-700 mb-3">Excelente trabajo en el último ejercicio en Android Studio. Tu implementación fue muy eficiente. ¡Sigue así!</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                            <span class="material-icons-round text-sm mr-1 align-middle">reply</span>Responder
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje 4 - Leído -->
        <div class="bg-white rounded-xl shadow-sm border-l-4 border-purple-500 p-6 hover:shadow-md transition-all duration-300 opacity-75">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-purple-100 rounded-xl">
                    <span class="material-icons-round text-purple-600">assignment</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <h3 class="text-lg font-bold text-gray-900">Sistema de Notificaciones</h3>
                            <span class="px-2 py-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">Sistema</span>
                        </div>
                        <span class="text-sm text-gray-500">Hace 3 días</span>
                    </div>
                    <p class="text-sm text-gray-700 mb-3">Se ha publicado nuevo material en la sección de Materiales: "Guía práctica de consultas avanzadas en SQL". Revisa la documentación.</p>
                    <div class="flex gap-2">
                        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                            <span class="material-icons-round text-sm mr-1 align-middle">link</span>Ir al material
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Más mensajes -->
        <div class="text-center mt-4">
            <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                Cargar más mensajes <span class="material-icons-round align-middle">expand_more</span>
            </button>
        </div>
    </div>

    <!-- Componer nuevo mensaje -->
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-indigo-600">edit</span>
            Componer Nuevo Mensaje
        </h2>

        <div class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Para:</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option>Seleccionar destinatario...</option>
                        <option>Ing. Jonatan (Programación Web)</option>
                        <option>Ing. Carlos (Base de Datos)</option>
                        <option>Ing. Roberto (Algoritmos)</option>
                        <option>Ing. Julieta (Inglés)</option>
                        <option>Ing. Sandra (Front End)</option>
                        <option>Ing. Alcides (Desarrollo Móvil)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Asunto:</label>
                    <input type="text" placeholder="Escribe el asunto..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mensaje:</label>
                <textarea rows="4" placeholder="Escribe tu mensaje aquí..." class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"></textarea>
            </div>
            <div class="flex justify-end gap-2">
                <button class="px-6 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium">
                    Cancelar
                </button>
                <button class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-medium">
                    <span class="material-icons-round text-sm mr-1 align-middle">send</span>
                    Enviar Mensaje
                </button>
            </div>
        </div>
    </div>
</div>
