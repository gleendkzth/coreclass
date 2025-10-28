<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}
?>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Anuncios Globales</h1>
    <p class="text-gray-600 mb-8">Publica mensajes importantes para todos los miembros de la institución.</p>

    <!-- Formulario para Nuevo Anuncio -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-200 mb-8">
        <div class="flex items-start gap-4">
                        <div class="h-11 w-11 rounded-full bg-gradient-to-r from-red-600 via-red-500 to-red-400 flex items-center justify-center text-white font-medium shadow">
                <?php echo strtoupper(substr($_SESSION['primer_nombre'], 0, 1)); ?>
            </div>
            <div class="flex-1">
                <textarea rows="3" class="w-full p-3 border-gray-200 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500 transition-all duration-200 resize-none" placeholder="Escribe un nuevo anuncio..."></textarea>
                <div class="flex justify-end items-center mt-3">
                    <button class="bg-red-700 text-white font-semibold rounded-lg px-6 py-2.5 hover:bg-red-800 transition-colors shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Publicar Anuncio
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Anuncios -->
    <div class="space-y-6">
        <h2 class="text-2xl font-bold text-gray-700 border-b pb-3 mb-4">Historial de Anuncios</h2>

        <!-- Anuncio de ejemplo 1 -->
        <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100">
            <div class="flex items-start gap-4">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-red-600 via-red-500 to-red-400 flex items-center justify-center text-white font-medium">
                    <?php echo strtoupper(substr($_SESSION['primer_nombre'], 0, 1)); ?>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Administrador</p>
                    <p class="text-xs text-gray-500">Publicado el 26 de Octubre a las 10:30 AM</p>
                </div>
            </div>
            <div class="mt-4 pl-14">
                <p class="text-gray-700">
                    <strong>Recordatorio Importante:</strong> La próxima semana inician las inscripciones para el semestre 2025-I. Asegúrense de revisar sus horarios y requisitos.
                </p>
            </div>
        </div>

        <!-- Anuncio de ejemplo 2 -->
        <div class="bg-white p-5 rounded-2xl shadow-md border border-gray-100">
            <div class="flex items-start gap-4">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-red-600 via-red-500 to-red-400 flex items-center justify-center text-white font-medium">
                    <?php echo strtoupper(substr($_SESSION['primer_nombre'], 0, 1)); ?>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">Administrador</p>
                    <p class="text-xs text-gray-500">Publicado el 24 de Octubre a las 03:15 PM</p>
                </div>
            </div>
            <div class="mt-4 pl-14">
                <p class="text-gray-700">
                    Bienvenidos al nuevo sistema CoreClass
                </p>
            </div>
        </div>
    </div>
</div>
