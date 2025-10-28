<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}

require_once '../../config/conexion.php';

// Lógica para manejar las acciones CRUD (Crear, Leer, Actualizar, Eliminar)
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
$id_programa = $_POST['id_programa'] ?? $_GET['id_programa'] ?? null;

$error = null;
$success = null;

// Manejo de acciones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($accion) {
        case 'crear':
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            if (!empty($nombre)) {
                $sql = "INSERT INTO programa_estudio (nombre, descripcion) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ss', $nombre, $descripcion);
                if ($stmt->execute()) {
                    $success = 'Programa creado exitosamente.';
                } else {
                    $error = 'Error al crear el programa.';
                }
            } else {
                $error = 'El nombre del programa es obligatorio.';
            }
            break;

        case 'editar':
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            if (!empty($nombre) && !empty($id_programa)) {
                $sql = "UPDATE programa_estudio SET nombre = ?, descripcion = ? WHERE id_programa = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssi', $nombre, $descripcion, $id_programa);
                if ($stmt->execute()) {
                    $success = 'Programa actualizado exitosamente.';
                } else {
                    $error = 'Error al actualizar el programa.';
                }
            } else {
                $error = 'Faltan datos para actualizar el programa.';
            }
            break;

        case 'eliminar':
            if (!empty($id_programa)) {
                $sql = "DELETE FROM programa_estudio WHERE id_programa = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $id_programa);
                if ($stmt->execute()) {
                    $success = 'Programa eliminado exitosamente.';
                } else {
                    $error = 'Error al eliminar el programa. Es posible que tenga cursos o estudiantes asociados.';
                }
            }
            break;
    }
}

// Obtener todos los programas para mostrarlos en la tabla
$sql_select = "SELECT * FROM programa_estudio ORDER BY id_programa ASC";
$resultado = $conn->query($sql_select);
$programas = $resultado->fetch_all(MYSQLI_ASSOC);

// Obtener datos de un programa específico para editar
$programa_a_editar = null;
if ($accion === 'mostrar_editar' && !empty($id_programa)) {
    $sql_edit = "SELECT * FROM programa_estudio WHERE id_programa = ?";
    $stmt_edit = $conn->prepare($sql_edit);
    $stmt_edit->bind_param('i', $id_programa);
    $stmt_edit->execute();
    $result_edit = $stmt_edit->get_result();
    $programa_a_editar = $result_edit->fetch_assoc();
}
?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestión de Programas de Estudio</h1>

    <?php if ($error): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo htmlspecialchars($error); ?></span>
        </div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo htmlspecialchars($success); ?></span>
        </div>
    <?php endif; ?>

    <!-- Botón para mostrar/ocultar formulario -->
    <div class="flex justify-end mb-4">
        <button id="toggleFormBtnProgramas" 
                class="px-6 py-3 bg-gradient-to-r from-red-700 to-red-800 text-white font-semibold rounded-lg hover:from-red-800 hover:to-red-900 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span id="btnTextProgramas">Registrar Nuevo Programa</span>
        </button>
    </div>

    <!-- Formulario para Crear o Editar -->
    <div id="formContainerProgramas" class="bg-white p-6 rounded-lg shadow-lg mb-8 <?php echo $programa_a_editar ? '' : 'hidden'; ?>">
        <h2 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $programa_a_editar ? 'Editar' : 'Añadir Nuevo'; ?> Programa</h2>
        <form action="programas.php" method="POST">
            <input type="hidden" name="accion" value="<?php echo $programa_a_editar ? 'editar' : 'crear'; ?>">
            <?php if ($programa_a_editar): ?>
                <input type="hidden" name="id_programa" value="<?php echo $programa_a_editar['id_programa']; ?>">
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Programa</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($programa_a_editar['nombre'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" required>
                </div>
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción (Opcional)</label>
                    <input type="text" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($programa_a_editar['descripcion'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500">
                </div>
            </div>
            
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-800 transition-colors">
                    <?php echo $programa_a_editar ? 'Actualizar Programa' : 'Guardar Programa'; ?>
                </button>
                <?php if ($programa_a_editar): ?>
                    <a href="programas.php" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-300 transition-colors ml-2">Cancelar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Tarjetas de Programas Existentes -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Programas Registrados</h2>
        
        <?php if (empty($programas)):
 ?>
            <div class="bg-blue-50 border border-blue-200 text-blue-800 p-6 rounded-lg text-center">
                <h3 class="font-semibold text-lg">No hay programas registrados</h3>
                <p class="mt-1">Cuando agregues un programa, aparecerá aquí.</p>
            </div>
        <?php else:
 ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($programas as $programa):
 ?>
                    <!-- Tarjeta de Programa Moderna -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1.5 transition-all duration-300 group flex flex-col border border-gray-100">
                        <!-- Cabecera con Gradiente -->
                        <div class="h-32 bg-gradient-to-br from-red-800 to-red-900 relative overflow-hidden">
                            <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/10 rounded-full opacity-50"></div>
                            <div class="absolute -left-8 -bottom-8 w-24 h-24 bg-white/10 rounded-full opacity-50"></div>
                            <div class="relative z-10 flex items-end h-full p-5">
                                <div>
                                    <div class="flex items-center text-white/80 text-xs mb-1">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                                        <span>Programa de Estudio</span>
                                    </div>
                                    <h3 class="text-xl font-bold text-white leading-tight"><?php echo htmlspecialchars($programa['nombre']);
 ?></h3>
                                </div>
                            </div>
                        </div>

                        <!-- Cuerpo de la tarjeta -->
                        <div class="p-5 flex-grow flex flex-col">
                            <!-- Descripción -->
                            <div class="flex-grow mb-4">
                                <div class="flex items-start text-sm text-gray-600">
                                    <svg class="w-5 h-5 mr-2 text-red-700 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <p class="flex-1 min-h-[60px]"><?php echo htmlspecialchars($programa['descripcion'] ?? 'Sin descripción.');
 ?></p>
                                </div>
                            </div>

                            <!-- Acciones -->
                            <div class="flex justify-end items-center border-t border-gray-200 pt-4 mt-auto space-x-3">
                                <a href="programas.php?accion=mostrar_editar&id_programa=<?php echo $programa['id_programa'];
 ?>" class="flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    Editar
                                </a>
                                <form action="programas.php" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este programa?');">
                                    <input type="hidden" name="accion" value="eliminar">
                                    <input type="hidden" name="id_programa" value="<?php echo $programa['id_programa'];
 ?>">
                                    <button type="submit" class="flex items-center text-sm font-medium text-red-600 hover:text-red-800 transition-colors">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
 ?>
            </div>
        <?php endif;
 ?>
    </div>
</div>

<script>
// Script para mostrar/ocultar el formulario de registro de programas
const toggleBtnProgramas = document.getElementById('toggleFormBtnProgramas');
const formContainerProgramas = document.getElementById('formContainerProgramas');
const btnTextProgramas = document.getElementById('btnTextProgramas');

// Inicializar el estado del botón al cargar la página
if (formContainerProgramas && !formContainerProgramas.classList.contains('hidden')) {
    btnTextProgramas.textContent = 'Ocultar Registro';
    toggleBtnProgramas.querySelector('svg path').setAttribute('d', 'M20 12H4');
}

if (toggleBtnProgramas) {
    toggleBtnProgramas.addEventListener('click', function() {
        if (formContainerProgramas.classList.contains('hidden')) {
            // Mostrar formulario
            formContainerProgramas.classList.remove('hidden');
            btnTextProgramas.textContent = 'Ocultar Registro';
            // Cambiar icono a minus
            this.querySelector('svg path').setAttribute('d', 'M20 12H4');
        } else {
            // Ocultar formulario
            formContainerProgramas.classList.add('hidden');
            btnTextProgramas.textContent = 'Registrar Nuevo Programa';
            // Cambiar icono a plus
            this.querySelector('svg path').setAttribute('d', 'M12 4v16m8-8H4');
        }
    });
}
</script>
