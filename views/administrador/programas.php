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

    <!-- Formulario para Crear o Editar -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
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
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Programas Registrados</h2>
        
        <?php if (empty($programas)):
 ?>
            <div class="text-center text-gray-500 py-4">
                No hay programas registrados.
            </div>
        <?php else:
 ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($programas as $programa):
 ?>
                    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-5 flex flex-col justify-between hover:shadow-xl transition-shadow duration-300">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800"><?php echo htmlspecialchars($programa['nombre']);
 ?></h3>
                            <p class="text-sm text-gray-600 mt-2 mb-4 h-16 overflow-y-auto"><?php echo htmlspecialchars($programa['descripcion'] ?? 'Sin descripción.');
 ?></p>
                        </div>
                        <div class="flex justify-end items-center border-t border-gray-200 pt-3 mt-auto">
                            <a href="programas.php?accion=mostrar_editar&id_programa=<?php echo $programa['id_programa'];
 ?>" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">Editar</a>
                            <form action="programas.php" method="POST" class="inline-block ml-4" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este programa?');">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id_programa" value="<?php echo $programa['id_programa'];
 ?>">
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach;
 ?>
            </div>
        <?php endif;
 ?>
    </div>
</div>
