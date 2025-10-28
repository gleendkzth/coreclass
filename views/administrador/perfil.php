<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/PerfilController.php';

// Verificar sesión
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
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
    <!-- Header del perfil -->
    <div class="flex items-center mb-6">
        <div class="w-1 h-8 bg-gradient-to-b from-red-700 to-red-900 rounded-full mr-3"></div>
        <h1 class="text-3xl font-bold text-gray-800">Mi Perfil</h1>
    </div>

    <!-- Grid principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Columna izquierda - Información del usuario -->
        <div class="lg:col-span-1">
            <!-- Card de perfil -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200">
                <div class="p-6">
                    <div class="flex flex-col items-center">
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-4xl font-bold border-4 border-white shadow-md">
                            <?php echo strtoupper(substr($perfil['primer_nombre'], 0, 1)); ?>
                        </div>
                        
                        <h2 class="mt-4 text-xl font-bold text-gray-800 text-center">
                            <?php echo htmlspecialchars($perfil['primer_nombre'] . ' ' . ($perfil['segundo_nombre'] ? $perfil['segundo_nombre'] . ' ' : '') . $perfil['apellido_paterno'] . ' ' . $perfil['apellido_materno']); ?>
                        </h2>
                        
                        <span class="mt-2 inline-block px-3 py-1 text-sm font-semibold text-red-700 bg-red-50 rounded-full">
                            <?php echo ucfirst($perfil['rol']); ?>
                        </span>
                        
                        <?php if (isset($perfil['datos_especificos']['cargo'])): ?>
                        <p class="mt-1 text-sm text-gray-600 text-center">
                            <?php echo htmlspecialchars($perfil['datos_especificos']['cargo']); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-center text-sm text-gray-600">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            <span>Cuenta activa</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Información de contacto -->
            <div class="bg-white rounded-xl shadow-md border border-gray-200 mt-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Información de Contacto
                    </h3>
                    
                    <!-- Información adicional -->
                    <div class="mt-6 pt-6 border-t border-gray-200 space-y-3">
                        <div class="flex items-start">
                            <span class="material-icons-round text-gray-400 text-xl mr-3 mt-0.5">badge</span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-medium">DNI</p>
                                <p class="text-sm text-gray-900 font-medium"><?php echo htmlspecialchars($perfil['dni']); ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <span class="material-icons-round text-gray-400 text-xl mr-3 mt-0.5">email</span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-medium">Correo</p>
                                <p class="text-sm text-gray-900 font-medium break-all"><?php echo htmlspecialchars($perfil['correo']); ?></p>
                            </div>
                        </div>
                        
                        <?php if ($perfil['telefono']): ?>
                        <div class="flex items-start">
                            <span class="material-icons-round text-gray-400 text-xl mr-3 mt-0.5">phone</span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-medium">Teléfono</p>
                                <p class="text-sm text-gray-900 font-medium"><?php echo htmlspecialchars($perfil['telefono']); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="flex items-start">
                            <span class="material-icons-round text-gray-400 text-xl mr-3 mt-0.5">calendar_today</span>
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-medium">Miembro desde</p>
                                <p class="text-sm text-gray-900 font-medium">
                                    <?php echo date('d/m/Y', strtotime($perfil['fecha_registro'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Estadísticas y detalles -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Estadísticas en cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Total Usuarios -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Total Usuarios</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['total_usuarios']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-blue-600 text-2xl">people</span>
                        </div>
                    </div>
                </div>

                <!-- Total Docentes -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Docentes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['total_docentes']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-green-600 text-2xl">school</span>
                        </div>
                    </div>
                </div>

                <!-- Total Estudiantes -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Estudiantes</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['total_estudiantes']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-purple-600 text-2xl">groups</span>
                        </div>
                    </div>
                </div>

                <!-- Total Programas -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Programas</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['total_programas']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-yellow-600 text-2xl">apartment</span>
                        </div>
                    </div>
                </div>

                <!-- Total Cursos -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Cursos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['total_cursos']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-red-600 text-2xl">book</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información de la cuenta -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <span class="material-icons-round text-gray-700 mr-2">settings</span>
                        Información de la Cuenta
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide">Usuario</label>
                            <p class="text-base text-gray-900 font-medium bg-gray-50 px-4 py-3 rounded-lg">
                                <?php echo htmlspecialchars($perfil['usuario']); ?>
                            </p>
                        </div>
                        
                        <?php if (isset($perfil['datos_especificos']['permisos'])): ?>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide">Permisos</label>
                            <p class="text-base text-gray-900 font-medium bg-gray-50 px-4 py-3 rounded-lg">
                                <?php echo htmlspecialchars($perfil['datos_especificos']['permisos']); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Acciones rápidas -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <span class="material-icons-round text-gray-700 mr-2">bolt</span>
                        Acciones Rápidas
                    </h3>
                </div>
                <div class="p-6">
                    <button onclick="mostrarModalCambiarPassword()" class="w-full flex items-center justify-center px-6 py-4 bg-gradient-to-r from-red-600 to-red-500 text-white rounded-lg hover:from-red-700 hover:to-red-600 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        <span class="material-icons-round mr-2">lock</span>
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para cambiar contraseña -->
<div id="modalCambiarPassword" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full">
        <div class="bg-gradient-to-r from-red-600 to-red-500 px-6 py-4 flex items-center justify-between">
            <h3 class="text-xl font-bold text-white flex items-center">
                <span class="material-icons-round mr-2">lock</span>
                Cambiar Contraseña
            </h3>
            <button onclick="cerrarModalCambiarPassword()" class="text-white hover:text-gray-200 transition-colors">
                <span class="material-icons-round">close</span>
            </button>
        </div>
        <form id="formCambiarPassword" class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Contraseña Actual</label>
                <input type="password" id="password_actual" name="password_actual" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nueva Contraseña</label>
                <input type="password" id="password_nueva" name="password_nueva" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmar Nueva Contraseña</label>
                <input type="password" id="password_confirmar" name="password_confirmar" 
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" required>
            </div>
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-colors font-medium">
                    Cambiar Contraseña
                </button>
                <button type="button" onclick="cerrarModalCambiarPassword()" class="flex-1 bg-gray-200 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                    Cancelar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Funciones para modales
function mostrarModalCambiarPassword() {
    document.getElementById('modalCambiarPassword').classList.remove('hidden');
}

function cerrarModalCambiarPassword() {
    document.getElementById('modalCambiarPassword').classList.add('hidden');
    document.getElementById('formCambiarPassword').reset();
}

// Manejar formulario de cambiar contraseña
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
