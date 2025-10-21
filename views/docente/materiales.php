<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado y acción principal -->
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Materiales</h1>
            <p class="text-gray-500 mt-1">Sube, organiza y comparte recursos con tus estudiantes.</p>
        </div>
        <button class="w-full md:w-auto bg-red-800 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-900 transition-colors flex items-center justify-center">
            <span class="material-icons-round text-lg mr-2">upload_file</span>
            Subir Material
        </button>
    </div>

    <!-- filtros y búsqueda -->
    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-2">
                <label for="search-material" class="sr-only">Buscar</label>
                <div class="relative">
                    <span class="material-icons-round absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">search</span>
                    <input type="text" id="search-material" placeholder="Buscar material por nombre o tipo..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors">
                </div>
            </div>
            <div>
                <label for="curso-material-select" class="sr-only">Curso</label>
                <select id="curso-material-select" class="w-full bg-white border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-red-500">
                    <option>Todos los Cursos</option>
                    <option>Programación Web</option>
                    <option>Bases de Datos</option>
                </select>
            </div>
        </div>
    </div>

    <!-- listado de materiales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- material 1: pdf -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                    <span class="material-icons-round text-red-800">picture_as_pdf</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-800 truncate">Guía Completa HTML5 y CSS3</h3>
                    <p class="text-sm text-gray-500 mt-1">Programación Web</p>
                    <p class="text-xs text-gray-400 mt-1">Subido hace 2 días • 5.2 MB</p>
                </div>
            </div>
            <div class="flex gap-2 mt-4">
                <button class="flex-1 px-3 py-2 bg-gray-200 text-gray-800 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors flex items-center justify-center">
                    <span class="material-icons-round text-base mr-1">edit</span>Editar
                </button>
                <button class="p-2 bg-red-100 text-red-800 rounded-lg text-sm hover:bg-red-200 transition-colors">
                    <span class="material-icons-round text-base">delete</span>
                </button>
            </div>
        </div>

        <!-- material 2: video (enlace) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                    <span class="material-icons-round text-red-800">link</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-800 truncate">Introducción a JavaScript ES6</h3>
                    <p class="text-sm text-gray-500 mt-1">Programación Web</p>
                    <p class="text-xs text-gray-400 mt-1">Enlace de Video • YouTube</p>
                </div>
            </div>
            <div class="flex gap-2 mt-4">
                <button class="flex-1 px-3 py-2 bg-gray-200 text-gray-800 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors flex items-center justify-center">
                    <span class="material-icons-round text-base mr-1">edit</span>Editar
                </button>
                <button class="p-2 bg-red-100 text-red-800 rounded-lg text-sm hover:bg-red-200 transition-colors">
                    <span class="material-icons-round text-base">delete</span>
                </button>
            </div>
        </div>

        <!-- material 3: zip -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-red-100 rounded-lg flex-shrink-0 mt-1">
                    <span class="material-icons-round text-red-800">folder_zip</span>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="font-semibold text-gray-800 truncate">Proyecto Landing Page</h3>
                    <p class="text-sm text-gray-500 mt-1">Programación Web</p>
                    <p class="text-xs text-gray-400 mt-1">Subido hace 1 semana • 2.8 MB</p>
                </div>
            </div>
            <div class="flex gap-2 mt-4">
                <button class="flex-1 px-3 py-2 bg-gray-200 text-gray-800 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors flex items-center justify-center">
                    <span class="material-icons-round text-base mr-1">edit</span>Editar
                </button>
                <button class="p-2 bg-red-100 text-red-800 rounded-lg text-sm hover:bg-red-200 transition-colors">
                    <span class="material-icons-round text-base">delete</span>
                </button>
            </div>
        </div>

    </div>
</div>
