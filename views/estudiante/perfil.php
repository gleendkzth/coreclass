<?php
session_start();
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../../controllers/PerfilController.php';

// Verificar sesión
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'estudiante') {
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

<div class="max-w-7xl mx-auto">
    <!-- Header del perfil -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 flex items-center">
            <span class="material-icons-round text-red-600 text-4xl mr-3">account_circle</span>
            Mi Perfil
        </h1>
        <p class="text-gray-600 mt-2">Gestiona tu información personal y configuración de cuenta</p>
    </div>

    <!-- Grid principal -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Columna izquierda - Información del usuario -->
        <div class="lg:col-span-1">
            <!-- Card de perfil -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Banner superior con gradiente -->
                <div class="h-32 bg-gradient-to-r from-red-600 via-red-500 to-red-400"></div>
                
                <!-- Avatar y nombre -->
                <div class="px-6 pb-6">
                    <div class="flex flex-col items-center -mt-16">
                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-red-600 to-red-400 flex items-center justify-center text-white text-5xl font-bold shadow-xl ring-4 ring-white">
                            <?php echo strtoupper(substr($perfil['primer_nombre'], 0, 1)); ?>
                        </div>
                        
                        <h2 class="mt-4 text-2xl font-bold text-gray-900 text-center">
                            <?php echo htmlspecialchars($perfil['primer_nombre'] . ' ' . ($perfil['segundo_nombre'] ? $perfil['segundo_nombre'] . ' ' : '') . $perfil['apellido_paterno'] . ' ' . $perfil['apellido_materno']); ?>
                        </h2>
                        
                        <div class="mt-2 inline-flex items-center px-4 py-1 rounded-full text-sm font-medium bg-red-100 text-red-700">
                            <span class="material-icons-round text-sm mr-1">person</span>
                            <?php echo ucfirst($perfil['rol']); ?>
                        </div>
                        
                        <?php if (isset($perfil['datos_especificos']['codigo_estudiante'])): ?>
                        <p class="mt-2 text-gray-600 text-center font-mono font-semibold">
                            <?php echo htmlspecialchars($perfil['datos_especificos']['codigo_estudiante']); ?>
                        </p>
                        <?php endif; ?>
                        
                        <!-- Estado -->
                        <div class="mt-4 flex items-center">
                            <span class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                            <span class="text-sm text-gray-600">Cuenta activa</span>
                        </div>
                    </div>
                    
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Cursos Matriculados -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Cursos</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['cursos_matriculados']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-blue-600 text-2xl">book</span>
                        </div>
                    </div>
                </div>

                <!-- Tareas Pendientes -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Tareas</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo $perfil['estadisticas']['tareas_pendientes']; ?>
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-orange-600 text-2xl">assignment</span>
                        </div>
                    </div>
                </div>

                <!-- Promedio General -->
                <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-lg transition-shadow duration-300 md:col-span-2 lg:col-span-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 font-medium">Promedio General</p>
                            <p class="text-3xl font-bold text-gray-900 mt-1">
                                <?php echo number_format($perfil['estadisticas']['promedio_general'], 2); ?>
                            </p>
                            <div class="mt-2">
                                <?php 
                                $promedio = $perfil['estadisticas']['promedio_general'];
                                if ($promedio >= 14) {
                                    echo '<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="material-icons-round text-xs mr-1">trending_up</span>Excelente
                                          </span>';
                                } elseif ($promedio >= 11) {
                                    echo '<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <span class="material-icons-round text-xs mr-1">done</span>Aprobado
                                          </span>';
                                } else {
                                    echo '<span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <span class="material-icons-round text-xs mr-1">warning</span>Requiere mejora
                                          </span>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="material-icons-round text-green-600 text-3xl">grade</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información Académica -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center">
                        <span class="material-icons-round text-gray-700 mr-2">school</span>
                        Información Académica
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php if (isset($perfil['datos_especificos']['codigo_estudiante'])): ?>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide flex items-center">
                                <span class="material-icons-round text-sm mr-1">qr_code</span>
                                Código de Estudiante
                            </label>
                            <p class="text-base text-gray-900 font-mono font-semibold bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <?php echo htmlspecialchars($perfil['datos_especificos']['codigo_estudiante']); ?>
                            </p>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (isset($perfil['datos_especificos']['fecha_ingreso'])): ?>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide flex items-center">
                                <span class="material-icons-round text-sm mr-1">event</span>
                                Fecha de Ingreso
                            </label>
                            <p class="text-base text-gray-900 font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <?php echo date('d/m/Y', strtotime($perfil['datos_especificos']['fecha_ingreso'])); ?>
                            </p>
                        </div>
                        <?php endif; ?>

                        <?php if (isset($perfil['datos_especificos']['programa_nombre'])): ?>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide flex items-center">
                                <span class="material-icons-round text-sm mr-1">apartment</span>
                                Programa de Estudio
                            </label>
                            <p class="text-base text-gray-900 font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <?php echo htmlspecialchars($perfil['datos_especificos']['programa_nombre']); ?>
                            </p>
                        </div>
                        <?php endif; ?>

                        <?php if (isset($perfil['datos_especificos']['semestre'])): ?>
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide flex items-center">
                                <span class="material-icons-round text-sm mr-1">layers</span>
                                Semestre Actual
                            </label>
                            <p class="text-base text-gray-900 font-medium bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <?php echo htmlspecialchars($perfil['datos_especificos']['semestre']); ?>
                            </p>
                        </div>
                        <?php endif; ?>

                        <?php if (isset($perfil['datos_especificos']['estado_matricula'])): ?>
                        <div class="space-y-2 md:col-span-2">
                            <label class="text-sm font-medium text-gray-700 uppercase tracking-wide flex items-center">
                                <span class="material-icons-round text-sm mr-1">info</span>
                                Estado de Matrícula
                            </label>
                            <div class="bg-red-50 px-4 py-3 rounded-lg border-l-4 border-red-500">
                                <?php 
                                $estado = $perfil['datos_especificos']['estado_matricula'];
                                $color_class = '';
                                switch ($estado) {
                                    case 'Activo':
                                        $color_class = 'bg-green-100 text-green-800';
                                        break;
                                    case 'Retirado':
                                        $color_class = 'bg-red-100 text-red-800';
                                        break;
                                    case 'Egresado':
                                        $color_class = 'bg-blue-100 text-blue-800';
                                        break;
                                }
                                ?>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo $color_class; ?>">
                                    <?php echo htmlspecialchars($estado); ?>
                                </span>
                            </div>
                        </div>
                        <?php endif; ?>
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
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700 uppercase tracking-wide">Usuario</label>
                        <p class="text-base text-gray-900 font-medium bg-gray-50 px-4 py-3 rounded-lg">
                            <?php echo htmlspecialchars($perfil['usuario']); ?>
                        </p>
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
