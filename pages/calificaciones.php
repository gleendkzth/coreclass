<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
        <!-- Elementos decorativos -->
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/5 rounded-full"></div>
        <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-yellow-300/20 to-orange-300/20 rounded-full"></div>

        <div class="relative z-10">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-white to-emerald-100">Mark, revisa tus calificaciones</h1>
                    <p class="text-emerald-100/90 mt-2 text-lg">Sigue tu rendimiento académico de manera detallada</p>
                </div>
                <div class="mt-4 lg:mt-0 bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20 shadow-lg">
                    <p class="text-sm font-medium flex items-center">
                        <span class="material-icons-round mr-2 text-yellow-300">emoji_events</span>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-yellow-200 to-orange-400">"¡Cada nota cuenta hacia tu éxito!"</span>
                    </p>
                </div>
            </div>

            <!-- Barra de progreso motivacional -->
            <div class="mt-6 bg-white/10 backdrop-blur-sm rounded-full h-2">
                <div class="bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400 h-2 rounded-full" style="width: 78%"></div>
            </div>
            <div class="flex justify-between mt-2 text-xs text-white/80">
                <span>Tu progreso académico</span>
                <span>78% del semestre completado</span>
            </div>
        </div>
    </div>

    <!-- Widgets principales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Promedio General -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-start justify-between">
                <div class="flex items-center">
                    <div class="p-3 bg-gradient-to-br from-emerald-50 to-teal-100 rounded-xl shadow-inner">
                        <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-teal-500">star</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Promedio General</p>
                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-500">14.2</p>
                    </div>
                </div>
                <span class="text-xs font-medium px-2 py-1 rounded-full bg-emerald-100 text-emerald-800 group-hover:bg-emerald-200 transition-colors">+0.3</span>
            </div>
            <div class="mt-3 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                <div class="h-full bg-gradient-to-r from-emerald-400 to-teal-400 rounded-full" style="width: 85%"></div>
            </div>
            <div class="mt-2 text-xs text-gray-500">
                <span class="font-medium text-emerald-600">+5%</span> que el semestre pasado
            </div>
        </div>

        <!-- Mejor Nota -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-amber-50 to-yellow-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-amber-500 to-yellow-500">emoji_events</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Mejor Nota</p>
                    <div class="flex items-baseline mt-1">
                        <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-yellow-600">18.5</p>
                        <span class="text-sm text-gray-400 ml-1">/20</span>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">
                        <span class="font-medium text-amber-600">Programación Web</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Materias Aprobadas -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-blue-50 to-cyan-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-cyan-500">check_circle</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Materias Aprobadas</p>
                    <p class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-600">6</p>
                    <div class="mt-3 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Próximo Examen -->
        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-sm p-5 border border-gray-100 hover:shadow-md transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-start">
                <div class="p-3 bg-gradient-to-br from-purple-50 to-violet-100 rounded-xl shadow-inner">
                    <span class="material-icons-round text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-violet-600">event</span>
                </div>
                <div class="ml-4 flex-1">
                    <p class="text-sm font-medium text-gray-500">Próximo Examen</p>
                    <p class="text-sm font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-violet-600">Matemáticas</p>
                    <div class="mt-2 text-xs text-gray-500">
                        <span class="font-medium">En 3 días</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controles de filtrado y acciones -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Filtro por período -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-3 pr-10 py-2.5 transition-all duration-200">
                        <option value="">Todos los períodos</option>
                        <option value="semestre1">Primer Semestre</option>
                        <option value="semestre2">Segundo Semestre</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <span class="material-icons-round text-gray-400 text-lg">expand_more</span>
                    </div>
                </div>

                <!-- Filtro por materia -->
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-3 pr-10 py-2.5 transition-all duration-200">
                        <option value="">Todas las materias</option>
                        <option value="matematicas">Matemáticas</option>
                        <option value="programacion">Programación Web</option>
                        <option value="metodologias">Metodologías Ágiles</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <span class="material-icons-round text-gray-400 text-lg">expand_more</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-2">
                <!-- Botón de gráficos -->
                <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                    <span class="material-icons-round mr-2 text-lg">show_chart</span>
                    Ver Gráficos
                </button>

                <!-- Botón de exportar -->
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                    <span class="material-icons-round mr-2 text-lg">download</span>
                    Exportar PDF
                </button>
            </div>
        </div>
    </div>

    <!-- Tabla de calificaciones detallada -->
    <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                <span class="material-icons-round mr-2 text-emerald-600">grade</span>
                Calificaciones por Materia
            </h2>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Ordenar por:</span>
                <select class="text-sm border-gray-300 rounded-lg focus:ring-emerald-500 focus:border-emerald-500">
                    <option>Nombre</option>
                    <option>Nota</option>
                    <option>Fecha</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materia</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Primer Parcial</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Segundo Parcial</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Proyecto Final</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nota Final</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Programación Web -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-blue-600 text-sm">code</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Programación Web</div>
                                    <div class="text-xs text-gray-500">Ing. Jonatan</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">16.5</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">17.2</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800 bg-amber-100 px-2 py-1 rounded-full">18.5</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600">17.4</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="material-icons-round text-green-600 text-sm mr-1">check_circle</span>
                                Aprobado
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-emerald-600 hover:text-emerald-900 p-1 rounded-full hover:bg-emerald-50 transition-colors" title="Ver detalles">
                                <span class="material-icons-round text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Metodologías Ágiles -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-orange-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-orange-600 text-sm">groups</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Metodologías Ágiles</div>
                                    <div class="text-xs text-gray-500">Ing. Jonatan</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-blue-800 bg-blue-100 px-2 py-1 rounded-full">14.0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">15.5</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">16.8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600">15.4</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="material-icons-round text-green-600 text-sm mr-1">check_circle</span>
                                Aprobado
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-emerald-600 hover:text-emerald-900 p-1 rounded-full hover:bg-emerald-50 transition-colors" title="Ver detalles">
                                <span class="material-icons-round text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Aplicaciones moviles -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-purple-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-purple-600 text-sm">functions</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Aplicaciones moviles</div>
                                    <div class="text-xs text-gray-500">Ing. Alcides</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800 bg-amber-100 px-2 py-1 rounded-full">12.5</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-amber-800 bg-amber-100 px-2 py-1 rounded-full">13.8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-red-800 bg-red-100 px-2 py-1 rounded-full">9.5</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-red-600 to-pink-600">11.9</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <span class="material-icons-round text-red-600 text-sm mr-1">warning</span>
                                Reprobado
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-emerald-600 hover:text-emerald-900 p-1 rounded-full hover:bg-emerald-50 transition-colors" title="Ver detalles">
                                <span class="material-icons-round text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>

                    <!-- Base de Datos -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-100 rounded-lg mr-3">
                                    <span class="material-icons-round text-green-600 text-sm">storage</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Base de Datos</div>
                                    <div class="text-xs text-gray-500">Ing. Mario</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">15.8</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">16.2</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-sm font-semibold text-emerald-800 bg-emerald-100 px-2 py-1 rounded-full">17.0</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-lg font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600">16.3</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="material-icons-round text-green-600 text-sm mr-1">check_circle</span>
                                Aprobado
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-emerald-600 hover:text-emerald-900 p-1 rounded-full hover:bg-emerald-50 transition-colors" title="Ver detalles">
                                <span class="material-icons-round text-lg">visibility</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Mostrando <span class="font-medium">1</span> a <span class="font-medium">4</span> de <span class="font-medium">8</span> materias
            </div>
            <div class="flex gap-2">
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    Anterior
                </button>
                <button class="px-3 py-1 text-sm bg-gradient-to-r from-emerald-600 to-teal-600 text-white rounded-lg hover:from-emerald-700 hover:to-teal-700">
                    1
                </button>
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                    2
                </button>
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                    Siguiente
                </button>
            </div>
        </div>
    </div>

    <!-- Consejos y recomendaciones -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl shadow-sm p-6 border border-blue-100">
        <div class="flex items-start">
            <div class="p-3 bg-blue-100 rounded-xl mr-4">
                <span class="material-icons-round text-blue-600">lightbulb</span>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-blue-900 mb-2">Consejos para mejorar</h3>
                <ul class="text-sm text-blue-800 space-y-1">
                    <li class="flex items-center">
                        <span class="material-icons-round text-blue-500 text-sm mr-2">check_circle</span>
                        Dedica más tiempo al estudio de Matemáticas para mejorar tu promedio
                    </li>
                    <li class="flex items-center">
                        <span class="material-icons-round text-blue-500 text-sm mr-2">check_circle</span>
                        ¡Sigue así con Programación Web! Tus notas muestran un excelente progreso
                    </li>
                    <li class="flex items-center">
                        <span class="material-icons-round text-blue-500 text-sm mr-2">check_circle</span>
                        Considera pedir ayuda adicional en las materias donde necesitas apoyo
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
// Funcionalidad adicional para filtros y acciones
document.addEventListener('DOMContentLoaded', function() {
    // Filtros
    const periodoFilter = document.querySelector('select');
    const materiaFilter = document.querySelectorAll('select')[1];

    periodoFilter?.addEventListener('change', function() {
        console.log('Filtro de período cambiado:', this.value);
    });

    materiaFilter?.addEventListener('change', function() {
        console.log('Filtro de materia cambiado:', this.value);
    });

    // Botones de acción
    const chartButton = document.querySelector('button:has(span.material-icons-round)');
    const exportButton = document.querySelectorAll('button')[2];

    chartButton?.addEventListener('click', function() {
        console.log('Mostrar gráficos');
    });

    exportButton?.addEventListener('click', function() {
        console.log('Exportar PDF');
    });
});
</script>
