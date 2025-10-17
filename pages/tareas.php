<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Encabezado de la página -->
    <div class="bg-gradient-to-r from-red-800 to-red-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
        <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full opacity-50"></div>
        <div class="absolute -left-10 -bottom-10 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold">Mis Tareas</h1>
            <p class="text-red-200 mt-1">Gestiona tus entregas y mantente al día.</p>
        </div>
    </div>

    <!-- Widgets de resumen -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Pendientes -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg">
                    <span class="material-icons-round text-yellow-800">pending_actions</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Pendientes</p>
                    <p class="text-2xl font-bold text-gray-800">3</p>
                </div>
            </div>
        </div>

        <!-- Entregadas -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg">
                    <span class="material-icons-round text-green-800">check_circle</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Entregadas</p>
                    <p class="text-2xl font-bold text-gray-800">15</p>
                </div>
            </div>
        </div>

        <!-- Por Vencer -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg">
                    <span class="material-icons-round text-red-800">schedule</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Por Vencer</p>
                    <p class="text-2xl font-bold text-gray-800">2</p>
                </div>
            </div>
        </div>

        <!-- Calificadas -->
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg">
                    <span class="material-icons-round text-blue-800">grading</span>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Calificadas</p>
                    <p class="text-2xl font-bold text-gray-800">12</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal de dos columnas -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Columna Izquierda -->
    <div class="lg:col-span-2 space-y-6">
        <!-- Lista de Tareas -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <span class="material-icons-round mr-2 text-red-800">list_alt</span>
                    Todas las Tareas
                </h2>
                <div class="flex flex-wrap gap-2">
                    <button class="px-3 py-1.5 rounded-lg bg-red-800 text-white text-xs font-medium hover:bg-red-900 transition-colors">Todas</button>
                    <button class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 text-xs font-medium hover:bg-gray-200 transition-colors">Pendientes</button>
                    <button class="px-3 py-1.5 rounded-lg bg-gray-100 text-gray-700 text-xs font-medium hover:bg-gray-200 transition-colors">Entregadas</button>
                </div>
            </div>

            <!-- Agrupación por Curso -->
            <div class="space-y-6">
                <!-- Curso: Programación Web -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 pb-2 border-b border-gray-200">Programación Web</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                            <div class="p-2 bg-red-100 rounded-lg mr-4"><span class="material-icons-round text-red-800">code</span></div>
                            <div class="flex-grow">
                                <p class="font-semibold text-gray-800">Proyecto Final</p>
                                <p class="text-sm text-gray-500">Docente: Ing. Jonatan</p>
                            </div>
                            <div class="flex items-center space-x-4 ml-4">
                                <div class="text-right flex-shrink-0">
                                    <p class="font-semibold text-red-800">En 4 días</p>
                                    <p class="text-xs text-gray-500">12/10/2025</p>
                                </div>
                                <button class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">Entregar <span class="material-icons-round text-sm ml-1">upload</span></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Curso: Metodologías Ágiles -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 pb-2 border-b border-gray-200">Metodologías Ágiles</h3>
                    <div class="space-y-4">
                        <div class="flex items-center p-4 rounded-lg bg-gray-50 border border-gray-200 hover:bg-gray-100 transition-colors">
                            <div class="p-2 bg-yellow-100 rounded-lg mr-4"><span class="material-icons-round text-yellow-800">description</span></div>
                            <div class="flex-grow">
                                <p class="font-semibold text-gray-800">Ensayo sobre Scrum</p>
                                <p class="text-sm text-gray-500">Docente: Ing. Jonatan</p>
                            </div>
                            <div class="flex items-center space-x-4 ml-4">
                                <div class="text-right flex-shrink-0">
                                    <p class="font-semibold text-yellow-800">En 7 días</p>
                                    <p class="text-xs text-gray-500">15/10/2025</p>
                                </div>
                                <button class="bg-red-800 text-white px-3 py-2 rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center">Entregar <span class="material-icons-round text-sm ml-1">upload</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Columna Derecha -->
    <div class="lg:col-span-1 space-y-6">
        <!-- Calendario -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-4">
                <span class="material-icons-round mr-2 text-red-800">calendar_today</span>
                Calendario
            </h2>
            <div class="text-center mb-4">
                <h3 class="font-semibold">Octubre 2025</h3>
            </div>
            <div class="grid grid-cols-7 gap-2 text-center text-sm">
                <div class="text-gray-500 font-medium">Lu</div>
                <div class="text-gray-500 font-medium">Ma</div>
                <div class="text-gray-500 font-medium">Mi</div>
                <div class="text-gray-500 font-medium">Ju</div>
                <div class="text-gray-500 font-medium">Vi</div>
                <div class="text-gray-500 font-medium">Sá</div>
                <div class="text-gray-500 font-medium">Do</div>
                
                <div class="text-gray-400"></div><div class="text-gray-400"></div>
                <div>1</div><div>2</div><div>3</div><div>4</div><div>5</div>
                <div>6</div><div>7</div><div>8</div><div>9</div><div>10</div>
                <div class="relative"><span class="bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center mx-auto">12</span></div>
                <div>13</div><div>14</div>
                <div class="relative"><span class="bg-yellow-500 text-white rounded-full w-6 h-6 flex items-center justify-center mx-auto">15</span></div>
                <div>16</div><div>17</div><div>18</div><div>19</div><div>20</div><div>21</div>
                <div>22</div><div>23</div><div>24</div><div>25</div><div>26</div><div>27</div>
                <div>28</div><div>29</div><div>30</div><div>31</div>
            </div>
        </div>

        <!-- Tareas Recientemente Calificadas -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800 flex items-center mb-4">
                <span class="material-icons-round mr-2 text-red-800">history_edu</span>
                Recientemente Calificadas
            </h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <p class="font-semibold text-gray-700">Prototipo de Interfaz Móvil</p>
                        <p class="text-sm text-gray-500">Desarrollo Móvil</p>
                    </div>
                    <div class="text-lg font-bold text-green-600">18<span class="text-sm text-gray-500 font-normal">/20</span></div>
                </div>
                <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                    <div>
                        <p class="font-semibold text-gray-700">Investigación sobre IA</p>
                        <p class="text-sm text-gray-500">Inteligencia Artificial</p>
                    </div>
                    <div class="text-lg font-bold text-orange-500">14<span class="text-sm text-gray-500 font-normal">/20</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
