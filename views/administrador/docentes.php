<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}

require_once '../../config/conexion.php';

// Lógica para manejar las acciones CRUD
$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
$id_usuario = $_POST['id_usuario'] ?? $_GET['id_usuario'] ?? null;

$error = null;
$success = null;

// Manejo de acciones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'] ?? '';
    $primer_nombre = $_POST['primer_nombre'] ?? '';
    $segundo_nombre = $_POST['segundo_nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $especialidad = $_POST['especialidad'] ?? '';
    $grado_academico = $_POST['grado_academico'] ?? '';

    switch ($accion) {
        case 'crear':
            if (!empty($dni) && !empty($primer_nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($usuario) && !empty($correo) && !empty($contrasena)) {
                $conn->begin_transaction();
                try {
                    $sql_check = "SELECT id_usuario FROM usuario WHERE correo = ? OR dni = ? OR usuario = ?";
                    $stmt_check = $conn->prepare($sql_check);
                    $stmt_check->bind_param('sss', $correo, $dni, $usuario);
                    $stmt_check->execute();
                    if ($stmt_check->get_result()->num_rows > 0) {
                        throw new Exception('El DNI, correo electrónico o nombre de usuario ya está registrado.');
                    }

                    $rol = 'docente';
                    $sql_user = "INSERT INTO usuario (dni, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, usuario, correo, contrasena, telefono, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt_user = $conn->prepare($sql_user);
                    $stmt_user->bind_param('ssssssssss', $dni, $primer_nombre, $segundo_nombre, $apellido_paterno, $apellido_materno, $usuario, $correo, $contrasena, $telefono, $rol);
                    $stmt_user->execute();
                    $nuevo_id_usuario = $conn->insert_id;

                    $sql_docente = "INSERT INTO docente (id_usuario, especialidad, grado_academico) VALUES (?, ?, ?)";
                    $stmt_docente = $conn->prepare($sql_docente);
                    $stmt_docente->bind_param('iss', $nuevo_id_usuario, $especialidad, $grado_academico);
                    $stmt_docente->execute();

                    $conn->commit();
                    $success = 'Docente creado exitosamente.';
                } catch (Exception $e) {
                    $conn->rollback();
                    $error = $e->getMessage();
                }
            } else {
                $error = 'DNI, primer nombre, apellidos, usuario, correo y contraseña son obligatorios.';
            }
            break;

        case 'editar':
            if (!empty($dni) && !empty($primer_nombre) && !empty($apellido_paterno) && !empty($apellido_materno) && !empty($usuario) && !empty($correo) && !empty($id_usuario)) {
                $conn->begin_transaction();
                try {
                    $sql_user = "UPDATE usuario SET dni = ?, primer_nombre = ?, segundo_nombre = ?, apellido_paterno = ?, apellido_materno = ?, usuario = ?, correo = ?, telefono = ? WHERE id_usuario = ?";
                    $stmt_user = $conn->prepare($sql_user);
                    $stmt_user->bind_param('ssssssssi', $dni, $primer_nombre, $segundo_nombre, $apellido_paterno, $apellido_materno, $usuario, $correo, $telefono, $id_usuario);
                    $stmt_user->execute();

                    $sql_docente = "UPDATE docente SET especialidad = ?, grado_academico = ? WHERE id_usuario = ?";
                    $stmt_docente = $conn->prepare($sql_docente);
                    $stmt_docente->bind_param('ssi', $especialidad, $grado_academico, $id_usuario);
                    $stmt_docente->execute();
                    
                    $conn->commit();
                    $success = 'Docente actualizado exitosamente.';
                } catch (Exception $e) {
                    $conn->rollback();
                    $error = 'Error al actualizar el docente: ' . $e->getMessage();
                }
            } else {
                $error = 'Faltan datos para actualizar.';
            }
            break;

        case 'eliminar':
            if (!empty($id_usuario)) {
                $sql = "DELETE FROM usuario WHERE id_usuario = ? AND rol = 'docente'";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('i', $id_usuario);
                if ($stmt->execute()) {
                    $success = 'Docente eliminado exitosamente.';
                } else {
                    $error = 'Error al eliminar el docente.';
                }
            }
            break;
    }
}

// Obtener todos los docentes (JOIN de Usuario y Docente)
$sql_select = "
    SELECT u.id_usuario, u.dni, u.primer_nombre, u.segundo_nombre, u.apellido_paterno, u.apellido_materno, u.usuario, u.correo, u.telefono, d.especialidad, d.grado_academico
    FROM usuario u
    JOIN docente d ON u.id_usuario = d.id_usuario
    WHERE u.rol = 'docente'
    ORDER BY u.apellido_paterno, u.apellido_materno, u.primer_nombre ASC
";
$resultado = $conn->query($sql_select);
$docentes = $resultado->fetch_all(MYSQLI_ASSOC);

// Obtener datos de un docente para editar
$docente_a_editar = null;
if ($accion === 'mostrar_editar' && !empty($id_usuario)) {
    $sql_edit = "
        SELECT u.*, d.especialidad, d.grado_academico
        FROM usuario u
        LEFT JOIN docente d ON u.id_usuario = d.id_usuario
        WHERE u.id_usuario = ? AND u.rol = 'docente'
    ";
    $stmt_edit = $conn->prepare($sql_edit);
    $stmt_edit->bind_param('i', $id_usuario);
    $stmt_edit->execute();
    $result_edit = $stmt_edit->get_result();
    $docente_a_editar = $result_edit->fetch_assoc();
}
?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestión de Docentes</h1>

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

    <!-- Formulario para Crear o Editar Docente -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $docente_a_editar ? 'Editar' : 'Añadir Nuevo'; ?> Docente</h2>
        <form action="docentes.php" method="POST">
            <input type="hidden" name="accion" value="<?php echo $docente_a_editar ? 'editar' : 'crear'; ?>">
            <?php if ($docente_a_editar): ?>
                <input type="hidden" name="id_usuario" value="<?php echo $docente_a_editar['id_usuario']; ?>">
            <?php endif; ?>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
                    <input type="text" name="dni" id="dni" value="<?php echo htmlspecialchars($docente_a_editar['dni'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="primer_nombre" class="block text-sm font-medium text-gray-700">Primer Nombre</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" value="<?php echo htmlspecialchars($docente_a_editar['primer_nombre'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="segundo_nombre" class="block text-sm font-medium text-gray-700">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" value="<?php echo htmlspecialchars($docente_a_editar['segundo_nombre'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="apellido_paterno" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" value="<?php echo htmlspecialchars($docente_a_editar['apellido_paterno'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="apellido_materno" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" value="<?php echo htmlspecialchars($docente_a_editar['apellido_materno'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                    <input type="text" name="usuario" id="usuario" value="<?php echo htmlspecialchars($docente_a_editar['usuario'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($docente_a_editar['correo'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($docente_a_editar['telefono'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="especialidad" class="block text-sm font-medium text-gray-700">Especialidad</label>
                    <input type="text" name="especialidad" id="especialidad" value="<?php echo htmlspecialchars($docente_a_editar['especialidad'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                 <div>
                    <label for="grado_academico" class="block text-sm font-medium text-gray-700">Grado Académico</label>
                    <input type="text" name="grado_academico" id="grado_academico" value="<?php echo htmlspecialchars($docente_a_editar['grado_academico'] ?? ''); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <?php if (!$docente_a_editar): ?>
                <div>
                    <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-800 transition-colors">
                    <?php echo $docente_a_editar ? 'Actualizar Docente' : 'Guardar Docente'; ?>
                </button>
                <?php if ($docente_a_editar): ?>
                    <a href="docentes.php" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-300 transition-colors ml-2">Cancelar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Tabla de Docentes -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Docentes Registrados</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">DNI</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre Completo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Especialidad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Grado Académico</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if (empty($docentes)) { ?>
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500">No hay docentes registrados.</td>
                        </tr>
                    <?php } else {
                        foreach ($docentes as $docente) { ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo htmlspecialchars($docente['dni']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"><?php echo htmlspecialchars(trim($docente['apellido_paterno'] . ' ' . $docente['apellido_materno'] . ', ' . $docente['primer_nombre'] . ' ' . $docente['segundo_nombre'])); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo htmlspecialchars($docente['usuario']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo htmlspecialchars($docente['correo']); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"><?php echo htmlspecialchars($docente['telefono'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($docente['especialidad'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo htmlspecialchars($docente['grado_academico'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="docentes.php?accion=mostrar_editar&id_usuario=<?php echo $docente['id_usuario']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                    <form action="docentes.php" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que quieres eliminar a este docente?');">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="id_usuario" value="<?php echo $docente['id_usuario']; ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
