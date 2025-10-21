<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado y filtros -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Mis Cursos</h1>
            <p class="text-gray-500 mt-1">Gestiona tus cursos, estudiantes y calificaciones.</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="text" placeholder="Buscar curso..." class="w-full md:w-auto bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
            <button class="bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center">
                <span class="material-icons-round text-lg mr-1">add</span>
                Nuevo
            </button>
        </div>
    </div>

    <!-- grid de cursos -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- curso 1: programación web -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300 flex flex-col">
            <div class="p-5 flex-grow">
                <div class="flex items-start justify-between">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <span class="material-icons-round text-red-800">code</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800">Programación Web</h3>
                            <p class="text-sm text-gray-500">ID: PROG-101</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="material-icons-round text-base mr-2">groups</span>
                        <span><span class="font-bold">35</span> Estudiantes</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="material-icons-round text-base mr-2">grading</span>
                        <span><span class="font-bold">85%</span> Calificaciones Registradas</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t">
                <a href="#" class="w-full text-center bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center justify-center">
                    Gestionar Curso <span class="material-icons-round text-lg ml-1">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- curso 2: bases de datos -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-300 flex flex-col">
            <div class="p-5 flex-grow">
                <div class="flex items-start justify-between">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <span class="material-icons-round text-red-800">storage</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800">Bases de Datos</h3>
                            <p class="text-sm text-gray-500">ID: DB-201</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 space-y-3">
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="material-icons-round text-base mr-2">groups</span>
                        <span><span class="font-bold">42</span> Estudiantes</span>
                    </div>
                    <div class="flex items-center text-sm text-gray-600">
                        <span class="material-icons-round text-base mr-2">grading</span>
                        <span><span class="font-bold">95%</span> Calificaciones Registradas</span>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t">
                <a href="#" class="w-full text-center bg-red-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center justify-center">
                    Gestionar Curso <span class="material-icons-round text-lg ml-1">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- agregar más cursos dinámicamente -->

    </div>
</div>
