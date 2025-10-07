<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>

        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-100">Mark, aquí tienes recomendaciones personalizadas</h1>
                    <p class="text-blue-100/90 mt-2 text-lg">Consejos y sugerencias basadas en tu rendimiento académico</p>
                </div>
                <div class="mt-4 md:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-yellow-400">"El conocimiento se multiplica cuando se comparte"</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recomendaciones destacadas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Recomendaciones Activas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">lightbulb</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Recomendaciones Activas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">8</p>
                </div>
            </div>
        </div>

        <!-- Esta Semana -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-500">today</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Esta Semana</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600">3</p>
                </div>
            </div>
        </div>

        <!-- Aplicadas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-500">check_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Aplicadas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">12</p>
                </div>
            </div>
        </div>

        <!-- Mejora Detectada -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">trending_up</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Mejora Detectada</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">+5%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recomendaciones por Unidad Didáctica -->
    <div class="space-y-6">
        <!-- Arquitectura de la Información - Crítica -->
        <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-xl p-6 border-l-4 border-red-500 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-3 bg-red-100 rounded-xl">
                            <span class="material-icons-round text-red-600">warning</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Arquitectura de la Información - Acción Inmediata</h3>
                            <p class="text-sm text-gray-600">Tu rendimiento está por debajo del mínimo requerido</p>
                        </div>
                    </div>
                    <div class="ml-16 space-y-2">
                        <p class="text-sm text-gray-700"><strong>Problema identificado:</strong> Promedio actual de 9.5/20 puntos</p>
                        <p class="text-sm text-gray-700"><strong>Recomendaciones:</strong></p>
                        <ul class="text-sm text-gray-700 list-disc list-inside ml-4 space-y-1">
                            <li>Revisar apuntes de las últimas 3 clases</li>
                            <li>Practicar con ejercicios del libro de texto (capítulos 3-5)</li>
                            <li>Solicitar asesoría personalizada con el profesor</li>
                            <li>Dedicar mínimo 2 horas diarias esta semana</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4">
                    <span class="px-4 py-2 bg-red-100 text-red-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                        Prioridad Crítica
                    </span>
                </div>
            </div>
        </div>

        <!-- Base de Datos - Mejora -->
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border-l-4 border-blue-500 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <span class="material-icons-round text-blue-600">trending_up</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Base de Datos - Área de Mejora</h3>
                            <p class="text-sm text-gray-600">Buen rendimiento, pero hay espacio para mejorar</p>
                        </div>
                    </div>
                    <div class="ml-16 space-y-2">
                        <p class="text-sm text-gray-700"><strong>Área de oportunidad:</strong> Consultas SQL complejas</p>
                        <p class="text-sm text-gray-700"><strong>Sugerencias:</strong></p>
                        <ul class="text-sm text-gray-700 list-disc list-inside ml-4 space-y-1">
                            <li>Practicar más ejercicios de JOINs múltiples</li>
                            <li>Revisar ejemplos de funciones agregadas avanzadas</li>
                            <li>Realizar ejercicios prácticos en laboratorio</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4">
                    <span class="px-4 py-2 bg-blue-100 text-blue-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                        Mejora Sugerida
                    </span>
                </div>
            </div>
        </div>

        <!-- Metodologías Ágiles - Excelente -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border-l-4 border-green-500 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-3 bg-green-100 rounded-xl">
                            <span class="material-icons-round text-green-600">emoji_events</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Metodologías Ágiles - ¡Excelente Trabajo!</h3>
                            <p class="text-sm text-gray-600">Tu desempeño es sobresaliente en esta área</p>
                        </div>
                    </div>
                    <div class="ml-16 space-y-2">
                        <p class="text-sm text-gray-700"><strong>Felicitaciones:</strong> Mantienes un promedio de 17/20 puntos</p>
                        <p class="text-sm text-gray-700"><strong>Recomendación:</strong> Continúa con este nivel de dedicación y considera ayudar a compañeros que necesiten apoyo en esta área.</p>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4">
                    <span class="px-4 py-2 bg-green-100 text-green-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                        ¡Excelente!
                    </span>
                </div>
            </div>
        </div>

        <!-- Programación Web - Próximo Examen -->
        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 rounded-xl p-6 border-l-4 border-yellow-500 hover:shadow-md transition-all duration-300">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-3 bg-yellow-100 rounded-xl">
                            <span class="material-icons-round text-yellow-600">quiz</span>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Programación Web - Preparación para Examen</h3>
                            <p class="text-sm text-gray-600">Tienes un examen próximo que requiere preparación</p>
                        </div>
                    </div>
                    <div class="ml-16 space-y-2">
                        <p class="text-sm text-gray-700"><strong>Examen programado:</strong> Jueves 10/10/2025 - 10:00 AM</p>
                        <p class="text-sm text-gray-700"><strong>Plan de estudio recomendado:</strong></p>
                        <ul class="text-sm text-gray-700 list-disc list-inside ml-4 space-y-1">
                            <li>Dedicar 2 horas diarias a repaso de JavaScript</li>
                            <li>Practicar ejercicios de manipulación del DOM</li>
                            <li>Revisar proyectos anteriores y corregir errores</li>
                            <li>Resolver cuestionarios de práctica disponibles</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-4">
                    <span class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-lg font-semibold text-sm whitespace-nowrap">
                        Preparación Requerida
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Consejos Generales -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <span class="material-icons-round mr-2 text-purple-600">tips_and_updates</span>
            Consejos Generales para Mejorar tu Rendimiento
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Consejo 1 -->
            <div class="p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg border border-blue-200">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <span class="material-icons-round text-blue-600">schedule</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Gestión del Tiempo</h4>
                        <p class="text-sm text-gray-700">Dedica tiempo específico para cada materia. Usa la técnica Pomodoro (25 minutos de estudio, 5 de descanso).</p>
                    </div>
                </div>
            </div>

            <!-- Consejo 2 -->
            <div class="p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-200">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-green-100 rounded-lg">
                        <span class="material-icons-round text-green-600">groups</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Estudio Colaborativo</h4>
                        <p class="text-sm text-gray-700">Forma grupos de estudio con compañeros. Explicar conceptos a otros refuerza tu propio aprendizaje.</p>
                    </div>
                </div>
            </div>

            <!-- Consejo 3 -->
            <div class="p-4 bg-gradient-to-r from-purple-50 to-violet-50 rounded-lg border border-purple-200">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <span class="material-icons-round text-purple-600">fitness_center</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Ejercicio y Descanso</h4>
                        <p class="text-sm text-gray-700">Mantén un equilibrio entre estudio, ejercicio físico y descanso. El cerebro necesita tiempo para procesar información.</p>
                    </div>
                </div>
            </div>

            <!-- Consejo 4 -->
            <div class="p-4 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-lg border border-amber-200">
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-amber-100 rounded-lg">
                        <span class="material-icons-round text-amber-600">help_outline</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Consulta Oportuna</h4>
                        <p class="text-sm text-gray-700">No esperes a estar perdido para pedir ayuda. Consulta dudas inmediatamente con profesores o tutores.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
