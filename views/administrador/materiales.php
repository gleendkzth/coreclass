<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}
?>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Materiales Académicos</h1>

    <!-- Filtros -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <input type="text" placeholder="Buscar material..." class="border-gray-300 rounded-lg shadow-sm">
            <select class="border-gray-300 rounded-lg shadow-sm">
                <option>Todos los Cursos</option>
            </select>
            <select class="border-gray-300 rounded-lg shadow-sm">
                <option>Todos los Tipos</option>
                <option>PDF</option>
                <option>Video</option>
            </select>
            <select class="border-gray-300 rounded-lg shadow-sm">
                <option>Estado: Todos</option>
                <option>Pendiente</option>
                <option>Aprobado</option>
            </select>
        </div>
    </div>

    <!-- Grid de Materiales -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Tarjeta de Material: Pendiente -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <span class="material-icons-round text-3xl text-red-500">picture_as_pdf</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pendiente</span>
                </div>
                <h3 class="font-bold text-gray-800 truncate">Guía de Estudio #1</h3>
                <p class="text-sm text-gray-500">Cálculo I</p>
                <p class="text-xs text-gray-400 mt-2">Subido por Prof. Newton</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center">
                <button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button>
                <div class="flex space-x-2">
                    <button class="text-green-500 hover:text-green-700"><span class="material-icons-round">check_circle</span></button>
                    <button class="text-red-500 hover:text-red-700"><span class="material-icons-round">cancel</span></button>
                </div>
            </div>
        </div>
        <!-- Tarjeta de Material: Aprobado -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-5">
                <div class="flex justify-between items-center mb-3">
                    <span class="material-icons-round text-3xl text-blue-500">smart_display</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Aprobado</span>
                </div>
                <h3 class="font-bold text-gray-800 truncate">Video: Derivadas</h3>
                <p class="text-sm text-gray-500">Cálculo I</p>
                <p class="text-xs text-gray-400 mt-2">Subido por Prof. Newton</p>
            </div>
            <div class="bg-gray-50 px-5 py-3 flex justify-between items-center">
                <button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button>
                <button class="text-red-500 hover:text-red-700"><span class="material-icons-round">delete</span></button>
            </div>
        </div>
    </div>
</div>
