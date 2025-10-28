<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/PerfilController.php';

if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'docente') {
    echo '<div class="text-center text-red-500 p-8">Acceso no autorizado</div>';
    exit;
}

$perfilController = new PerfilController($conn);
$perfil = $perfilController->obtenerPerfilCompleto($_SESSION['id_usuario'], $_SESSION['rol']);

if (!$perfil) {
    echo '<div class="text-center text-red-500 p-8">Error al cargar el perfil</div>';
    exit;
}
?>

<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex items-center mb-6">
        <div class="w-1 h-8 bg-gradient-to-b from-red-700 to-red-900 rounded-full mr-3"></div>
        <h1 class="text-3xl font-bold text-gray-800">Mi Perfil</h1>
    </div>

    <!-- Grid principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Columna izquierda - Card de usuario -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Información básica -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-4xl font-bold border-4 border-gray-100 shadow">
                        <?php echo strtoupper(substr($perfil['primer_nombre'], 0, 1)); ?>
                    </div>
                    
                    <h2 class="mt-4 text-xl font-bold text-gray-800 text-center">
                        <?php echo htmlspecialchars($perfil['primer_nombre'] . ' ' . ($perfil['segundo_nombre'] ? $perfil['segundo_nombre'] . ' ' : '') . $perfil['apellido_paterno'] . ' ' . $perfil['apellido_materno']); ?>
                    </h2>
                    
                    <span class="mt-2 inline-block px-3 py-1 text-xs font-semibold text-red-700 bg-red-50 rounded-full border border-red-200">
                        <?php echo strtoupper($perfil['rol']); ?>
                    </span>
                    
                    <?php if (isset($perfil['datos_especificos']['especialidad'])): ?>
                    <p class="mt-2 text-sm text-gray-600">
                        <?php echo htmlspecialchars($perfil['datos_especificos']['especialidad']); ?>
                    </p>
                    <?php endif; ?>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <div class="space-y-4">
                        <div class="flex items-start text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500 text-xs uppercase">DNI</p>
                                <p class="text-gray-800 font-medium"><?php echo htmlspecialchars($perfil['dni']); ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500 text-xs uppercase">Correo</p>
                                <p class="text-gray-800 font-medium break-all"><?php echo htmlspecialchars($perfil['correo']); ?></p>
                            </div>
                        </div>
                        
                        <?php if ($perfil['telefono']): ?>
                        <div class="flex items-start text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500 text-xs uppercase">Teléfono</p>
                                <p class="text-gray-800 font-medium"><?php echo htmlspecialchars($perfil['telefono']); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex items-start text-sm">
                            <svg class="w-5 h-5 text-gray-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <p class="text-gray-500 text-xs uppercase">Miembro desde</p>
                                <p class="text-gray-800 font-medium"><?php echo date('d/m/Y', strtotime($perfil['fecha_registro'])); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <button onclick="mostrarModalCambiarPassword()" class="w-full px-4 py-3 bg-gradient-to-r from-red-700 to-red-800 text-white font-semibold rounded-lg hover:from-red-800 hover:to-red-900 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Estadísticas y detalles -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Estadísticas -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Estadísticas Académicas
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-2xl font-bold text-gray-800"><?php echo $perfil['estadisticas']['cursos_asignados']; ?></p>
                        <p class="text-sm text-gray-600 mt-1">Cursos Asignados</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-2xl font-bold text-gray-800"><?php echo $perfil['estadisticas']['total_estudiantes']; ?></p>
                        <p class="text-sm text-gray-600 mt-1">Estudiantes</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <p class="text-2xl font-bold text-gray-800"><?php echo $perfil['estadisticas']['tareas_publicadas']; ?></p>
                        <p class="text-sm text-gray-600 mt-1">Tareas Publicadas</p>
                    </div>
                </div>
            </div>

            <!-- Información Académica -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Información Académica
                </h3>
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php if (isset($perfil['datos_especificos']['especialidad'])): ?>
                        <div>
                            <p class="text-xs text-gray-500 uppercase mb-1">Especialidad</p>
                            <p class="text-sm text-gray-800 font-medium"><?php echo htmlspecialchars($perfil['datos_especificos']['especialidad']); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if (isset($perfil['datos_especificos']['grado_academico'])): ?>
                        <div>
                            <p class="text-xs text-gray-500 uppercase mb-1">Grado Académico</p>
                            <p class="text-sm text-gray-800 font-medium"><?php echo htmlspecialchars($perfil['datos_especificos']['grado_academico']); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Información de cuenta -->
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-200">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Información de la Cuenta
                </h3>
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-gray-500 uppercase mb-1">Usuario</p>
                            <p class="text-sm text-gray-800 font-medium"><?php echo htmlspecialchars($perfil['usuario']); ?></p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase mb-1">Estado</p>
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded">
                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                Activa
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cambiar Contraseña -->
<div id="modalCambiarPassword" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-red-700 to-red-800 px-6 py-4 flex items-center justify-between rounded-t-xl">
            <h3 class="text-xl font-bold text-white">Cambiar Contraseña</h3>
            <button onclick="cerrarModalCambiarPassword()" class="text-white hover:text-gray-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form id="formCambiarPassword" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Contraseña Actual</label>
                <input type="password" id="password_actual" name="password_actual" 
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nueva Contraseña</label>
                <input type="password" id="password_nueva" name="password_nueva" 
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Nueva Contraseña</label>
                <input type="password" id="password_confirmar" name="password_confirmar" 
                       class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-gradient-to-r from-red-700 to-red-800 text-white px-6 py-2.5 rounded-lg hover:from-red-800 hover:to-red-900 font-semibold">
                    Cambiar
                </button>
                <button type="button" onclick="cerrarModalCambiarPassword()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 font-semibold">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function mostrarModalCambiarPassword() {
    document.getElementById('modalCambiarPassword').classList.remove('hidden');
}

function cerrarModalCambiarPassword() {
    document.getElementById('modalCambiarPassword').classList.add('hidden');
    document.getElementById('formCambiarPassword').reset();
}

document.getElementById('formCambiarPassword').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const passwordNueva = document.getElementById('password_nueva').value;
    const passwordConfirmar = document.getElementById('password_confirmar').value;
    
    if (passwordNueva !== passwordConfirmar) {
        alert('Las contraseñas no coinciden');
        return;
    }
    
    if (passwordNueva.length < 6) {
        alert('La contraseña debe tener al menos 6 caracteres');
        return;
    }
    
    const formData = new FormData(this);
    
    fetch('../ajax/cambiar_contrasena.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            cerrarModalCambiarPassword();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la solicitud');
    });
});
</script>
