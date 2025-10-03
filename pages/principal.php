<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
                    <!-- Sección de bienvenida -->
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
                        <!-- Elementos decorativos -->
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
                        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
                        
                        <div class="relative z-10">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div>
                                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">¡Hola, Mark!</h1>
                                    <p class="text-blue-100/90 mt-2 text-lg">Resumen de tu actividad académica</p>
                                </div>
                                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                                    <p class="text-sm font-medium flex items-center">
                                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"¡Sigue así, cada paso cuenta!"</span>
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Barra de progreso motivacional -->
                            <div class="mt-6 bg-white/10 backdrop-blur-sm rounded-full h-2">
                                <div class="bg-gradient-to-r from-yellow-400 to-amber-500 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <div class="flex justify-between mt-2 text-xs text-white/80">
                                <span>Tu progreso general</span>
                                <span>85% Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets principales -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                        <!-- Unidades activas -->
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center">
                                    <div class="p-3 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl shadow-inner">
                                        <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">school</span>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-500">Unidades activas</p>
                                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-500">8</p>
                                    </div>
                                </div>
                                <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-800">+2 esta semana</span>
                            </div>
                            <div class="mt-3 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full" style="width: 100%"></div>
                            </div>
                        </div>

                        <!-- Promedio general -->
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start">
                                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">star</span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-medium text-gray-500">Promedio general</p>
                                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-100 text-green-800 flex items-center">
                                            <span class="material-icons-round text-green-600 text-sm mr-1">trending_up</span> 0.5
                                        </span>
                                    </div>
                                    <div class="flex items-baseline mt-1">
                                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">14.5</p>
                                        <span class="text-sm text-gray-400 ml-1">/20</span>
                                    </div>
                                    <div class="mt-2 text-xs text-gray-500">
                                        <span class="font-medium text-green-600">+5%</span> que el mes pasado
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Asistencia -->
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start">
                                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-600">event_available</span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-sm font-medium text-gray-500">Asistencia general</p>
                                    <div class="flex items-baseline justify-between">
                                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">85%</p>
                                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-purple-100 text-purple-800">
                                            Regular
                                        </span>
                                    </div>
                                    <div class="mt-3 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-purple-400 to-violet-500 rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alertas -->
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                            <div class="flex items-start">
                                <div class="p-3 bg-gradient-to-br from-red-50 to-pink-100 rounded-xl shadow-inner">
                                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-500">warning</span>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Alertas importantes</p>
                                    <p class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">2 materias</p>
                                    <p class="text-xs text-red-500 font-medium mt-1">Revisa las notificaciones</p>
                                </div>
                            </div>
                            <div class="mt-3 flex space-x-2">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 mr-1 bg-red-500 rounded-full"></span>
                                    Crítico
                                </span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <span class="w-2 h-2 mr-1 bg-yellow-500 rounded-full"></span>
                                    Advertencia
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Sección de próximas tareas -->
                        <div class="lg:col-span-2">
                            <div class="bg-white rounded-xl shadow-sm p-6 h-full">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                                        <span class="material-icons-round mr-2 text-blue-600">assignment</span>
                                        Próximas tareas
                                    </h2>
                                    <a href="#" class="text-sm text-blue-600 hover:underline">Ver todas</a>
                                </div>
                                
                                <div class="space-y-3">
                                    <!-- Tarea 1 -->
                                    <div class="group relative overflow-hidden bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-4 border-l-4 border-blue-500 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-cyan-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <div class="relative z-10">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="p-1.5 bg-blue-100 rounded-lg mr-3">
                                                            <span class="material-icons-round text-blue-600 text-lg">code</span>
                                                        </div>
                                                        <span class="text-sm font-semibold text-gray-800">Programación Web</span>
                                                    </div>
                                                    <p class="text-sm text-gray-600 mt-2 ml-9">Entrega proyecto final - Sistema de gestión de tareas</p>
                                                    <div class="flex items-center mt-2 ml-9">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 mr-2">
                                                            <span class="material-icons-round text-yellow-600 text-sm mr-1">schedule</span>
                                                            Vence en 10 días
                                                        </span>
                                                        <span class="text-xs text-gray-500 flex items-center">
                                                            <span class="w-1 h-1 bg-gray-400 rounded-full mr-1"></span>
                                                            No entregado
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right ml-4">
                                                    <div class="text-sm font-semibold text-gray-900">12/10/2025</div>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gradient-to-r from-blue-500 to-cyan-500 text-white mt-1">
                                                        Alta prioridad
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tarea 2 -->
                                    <div class="group relative overflow-hidden bg-white rounded-xl p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5 border border-gray-100">
                                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-violet-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <div class="relative z-10">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="p-1.5 bg-purple-100 rounded-lg mr-3">
                                                            <span class="material-icons-round text-purple-600 text-lg">groups</span>
                                                        </div>
                                                        <span class="text-sm font-semibold text-gray-800">Metodologías Ágiles</span>
                                                    </div>
                                                    <p class="text-sm text-gray-600 mt-2 ml-9">Ensayo sobre Scrum y su implementación</p>
                                                    <div class="flex items-center mt-2 ml-9">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                            <span class="material-icons-round text-gray-600 text-sm mr-1">event</span>
                                                            En 13 días
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right ml-4">
                                                    <div class="text-sm font-medium text-gray-900">15/10/2025</div>
                                                    <span class="text-xs text-gray-500">Próxima semana</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tarea 3 -->
                                    <div class="group relative overflow-hidden bg-white rounded-xl p-4 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5 border border-gray-100">
                                        <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-emerald-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        <div class="relative z-10">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1">
                                                    <div class="flex items-center">
                                                        <div class="p-1.5 bg-green-100 rounded-lg mr-3">
                                                            <span class="material-icons-round text-green-600 text-lg">storage</span>
                                                        </div>
                                                        <span class="text-sm font-semibold text-gray-800">Base de Datos</span>
                                                    </div>
                                                    <p class="text-sm text-gray-600 mt-2 ml-9">Ejercicio práctico de consultas SQL avanzadas</p>
                                                    <div class="flex items-center mt-2 ml-9">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                            <span class="material-icons-round text-gray-600 text-sm mr-1">event</span>
                                                            En 16 días
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="text-right ml-4">
                                                    <div class="text-sm font-medium text-gray-900">18/10/2025</div>
                                                    <span class="text-xs text-gray-500">Próximas semanas</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Ver más tareas -->
                                    <div class="text-center mt-3">
                                        <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                                            Mostrar 3 tareas más <span class="material-icons-round align-middle">expand_more</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección de progreso por materia -->
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-sm p-6 h-full">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                    <span class="material-icons-round mr-2 text-purple-600">trending_up</span>
                                    Progreso por materia
                                </h2>
                                
                                <div class="space-y-4">
                                    <!-- Materia 1 -->
                                    <div class="group relative p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                                    <span class="material-icons-round text-blue-600 text-lg">code</span>
                                                </div>
                                                <span class="font-medium text-gray-800">Programación Web</span>
                                            </div>
                                            <span class="font-semibold bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-cyan-500">85%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full" style="width: 85%"></div>
                                        </div>
                                    </div>

                                    <!-- Materia 2 -->
                                    <div class="group relative p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                                    <span class="material-icons-round text-green-600 text-lg">storage</span>
                                                </div>
                                                <span class="font-medium text-gray-800">Base de Datos</span>
                                            </div>
                                            <span class="font-semibold bg-clip-text text-transparent bg-gradient-to-r from-green-500 to-emerald-500">92%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-green-400 to-emerald-400 rounded-full" style="width: 92%"></div>
                                        </div>
                                    </div>

                                    <!-- Materia 3 -->
                                    <div class="group relative p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                                    <span class="material-icons-round text-purple-600 text-lg">groups</span>
                                                </div>
                                                <span class="font-medium text-gray-800">Metodologías Ágiles</span>
                                            </div>
                                            <span class="font-semibold text-amber-500">59%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-amber-400 to-yellow-400 rounded-full" style="width: 59%"></div>
                                        </div>
                                        <div class="mt-1 text-xs text-amber-600 flex items-center">
                                            <span class="material-icons-round text-sm mr-1">warning</span>
                                            Necesitas mejorar
                                        </div>
                                    </div>

                                    <!-- Materia 4 -->
                                    <div class="group relative p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center mr-3">
                                                    <span class="material-icons-round text-indigo-600 text-lg">devices</span>
                                                </div>
                                                <span class="font-medium text-gray-800">Algoritmos y Programación</span>
                                            </div>
                                            <span class="font-semibold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-violet-500">80%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-indigo-400 to-violet-400 rounded-full" style="width: 80%"></div>
                                        </div>
                                    </div>

                                    <!-- Materia 5 -->
                                    <div class="group relative p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center mr-3">
                                                    <span class="material-icons-round text-rose-600 text-lg">phone_android</span>
                                                </div>
                                                <span class="font-medium text-gray-800">Desarrollo Móvil</span>
                                            </div>
                                            <span class="font-semibold bg-clip-text text-transparent bg-gradient-to-r from-rose-500 to-pink-500">82%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 overflow-hidden">
                                            <div class="h-full bg-gradient-to-r from-rose-400 to-pink-400 rounded-full" style="width: 82%"></div>
                                        </div>
                                    </div>

                                    <div class="pt-2">
                                        <a href="#" class="text-sm text-blue-600 hover:underline flex items-center">
                                            Ver todas las materias
                                            <span class="material-icons-round text-sm ml-1">chevron_right</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de alertas y materiales -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Alertas -->
                        <div class="lg:col-span-1">
                            <div class="bg-white rounded-xl shadow-sm p-6 h-full">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                                    <span class="material-icons-round mr-2 text-red-500">notifications_active</span>
                                    Alertas importantes
                                </h2>
                                
                                <div class="space-y-4">
                                    <!-- Alerta 1 -->
                                    <div class="p-4 bg-red-50 border-l-4 border-red-500 rounded-r-lg">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <span class="material-icons-round text-red-400">warning_amber</span>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-red-800">Riesgo en Metodologías Ágiles</h3>
                                                <div class="mt-1 text-sm text-red-700">
                                                    <p>Tu rendimiento está por debajo del 60%. Te recomendamos revisar el material y asistir a asesorías.</p>
                                                </div>
                                                <div class="mt-2">
                                                    <a href="#" class="inline-flex items-center text-sm font-medium text-red-700 hover:text-red-600">
                                                        Ver detalles
                                                        <span class="material-icons-round text-sm ml-1">chevron_right</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Alerta 2 -->
                                    <div class="p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded-r-lg">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <span class="material-icons-round text-yellow-400">info</span>
                                            </div>
                                            <div class="ml-3">
                                                <h3 class="text-sm font-medium text-yellow-800">Proyecto próximo a vencer</h3>
                                                <div class="mt-1 text-sm text-yellow-700">
                                                    <p>El proyecto final de Programación Web vence en 10 días. ¡No dejes todo para el final!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Materiales recientes -->
                        <div class="lg:col-span-2">
                            <div class="bg-white rounded-xl shadow-sm p-6 h-full">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                                        <span class="material-icons-round mr-2 text-green-600">folder_open</span>
                                        Materiales recientes
                                    </h2>
                                    <a href="#" class="text-sm text-blue-600 hover:underline">Ver biblioteca</a>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Material 1 -->
                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg">
                                                <span class="material-icons-round text-blue-600">picture_as_pdf</span>
                                            </div>
                                            <div class="ml-4 flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Guía completa de HTML5 y CSS3</p>
                                                <p class="text-xs text-gray-500 mt-1">Programación Web</p>
                                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                                    <span class="material-icons-round text-xs mr-1">update</span>
                                                    <span>Actualizado ayer</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Material 2 -->
                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 p-2 bg-purple-100 rounded-lg">
                                                <span class="material-icons-round text-purple-600">description</span>
                                            </div>
                                            <div class="ml-4 flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Ejercicios prácticos de SQL</p>
                                                <p class="text-xs text-gray-500 mt-1">Base de Datos</p>
                                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                                    <span class="material-icons-round text-xs mr-1">update</span>
                                                    <span>Hace 3 días</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Material 3 -->
                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 p-2 bg-yellow-100 rounded-lg">
                                                <span class="material-icons-round text-yellow-600">slideshow</span>
                                            </div>
                                            <div class="ml-4 flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Introducción a React - Video</p>
                                                <p class="text-xs text-gray-500 mt-1">Desarrollo Front End</p>
                                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                                    <span class="material-icons-round text-xs mr-1">update</span>
                                                    <span>Hace 1 semana</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Material 4 -->
                                    <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 p-2 bg-green-100 rounded-lg">
                                                <span class="material-icons-round text-green-600">code</span>
                                            </div>
                                            <div class="ml-4 flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">Ejemplos de patrones de diseño</p>
                                                <p class="text-xs text-gray-500 mt-1">Algoritmos y Programación</p>
                                                <div class="mt-2 flex items-center text-xs text-gray-500">
                                                    <span class="material-icons-round text-xs mr-1">update</span>
                                                    <span>Hace 2 semanas</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de anuncios -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                                <span class="material-icons-round mr-2 text-indigo-600">campaign</span>
                                Últimos anuncios
                            </h2>
                            <a href="#" class="text-sm text-blue-600 hover:underline">Ver todos</a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Anuncio 1 -->
                            <div class="border-l-4 border-indigo-500 pl-4 py-2 bg-indigo-50 rounded-r-lg">
                                <p class="font-medium text-gray-900">Semana de exámenes parciales</p>
                                <p class="text-sm text-gray-600 mt-1">Prepárate para los exámenes de mitad de ciclo. Revisa el calendario de evaluaciones.</p>
                                <p class="text-xs text-gray-500 mt-2">Publicado el 01/10/2025</p>
                            </div>

                            <!-- Anuncio 2 -->
                            <div class="border-l-4 border-blue-500 pl-4 py-2 bg-blue-50 rounded-r-lg">
                                <p class="font-medium text-gray-900">Nuevo material disponible</p>
                                <p class="text-sm text-gray-600 mt-1">Hemos subido la guía de React actualizada con los últimos hooks.</p>
                                <p class="text-xs text-gray-500 mt-2">Publicado el 28/09/2025</p>
                            </div>

                            <!-- Anuncio 3 -->
                            <div class="border-l-4 border-green-500 pl-4 py-2 bg-green-50 rounded-r-lg">
                                <p class="font-medium text-gray-900">Horario de asesorías</p>
                                <p class="text-sm text-gray-600 mt-1">Se ha actualizado el horario de asesorías. Consulta los nuevos horarios disponibles.</p>
                                <p class="text-xs text-gray-500 mt-2">Publicado el 25/09/2025</p>
                            </div>
                        </div>
                    </div>
                </div>