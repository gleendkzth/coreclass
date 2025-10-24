<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}

require_once '../../config/conexion.php';

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
$id_usuario = $_POST['id_usuario'] ?? $_GET['id_usuario'] ?? null;

$error = null;
$success = null;

// Obtener programas para los select del formulario
$programas = $conn->query("SELECT * FROM programa_estudio ORDER BY nombre")->fetch_all(MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger todos los datos del formulario
    $id_estudiante = $_POST['id_estudiante'] ?? null;
    $dni = $_POST['dni'] ?? '';
    $primer_nombre = $_POST['primer_nombre'] ?? '';
    $segundo_nombre = $_POST['segundo_nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $usuario_form = $_POST['usuario'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $codigo_estudiante = $_POST['codigo_estudiante'] ?? '';
    $fecha_ingreso = $_POST['fecha_ingreso'] ?? '';
    $id_programa = $_POST['id_programa'] ?? null;
    $semestre = $_POST['semestre'] ?? '';

    // Generar un nombre de usuario si está vacío
    if (empty($usuario_form)) {
        $usuario_form = strtolower(substr($primer_nombre, 0, 1) . $apellido_paterno);
    }

    switch ($accion) {
        case 'crear':
            if (!empty($dni) && !empty($primer_nombre) && !empty($apellido_paterno) && !empty($correo) && !empty($contrasena) && !empty($codigo_estudiante) && !empty($id_programa) && !empty($semestre)) {
                $conn->begin_transaction();
                try {
                    // 1. Verificar duplicados
                    $stmt_check = $conn->prepare("SELECT id_usuario FROM usuario WHERE correo = ? OR dni = ? OR usuario = ?");
                    $stmt_check->bind_param('sss', $correo, $dni, $usuario_form);
                    $stmt_check->execute();
                    if ($stmt_check->get_result()->num_rows > 0) throw new Exception('El DNI, correo o nombre de usuario ya está registrado.');

                    $stmt_check_code = $conn->prepare("SELECT id_estudiante FROM estudiante WHERE codigo_estudiante = ?");
                    $stmt_check_code->bind_param('s', $codigo_estudiante);
                    $stmt_check_code->execute();
                    if ($stmt_check_code->get_result()->num_rows > 0) throw new Exception('El código de estudiante ya existe.');

                    // 2. Crear el Usuario
                    $rol = 'estudiante';
                    $stmt_user = $conn->prepare("INSERT INTO usuario (dni, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, usuario, correo, contrasena, telefono, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt_user->bind_param('ssssssssss', $dni, $primer_nombre, $segundo_nombre, $apellido_paterno, $apellido_materno, $usuario_form, $correo, $contrasena, $telefono, $rol);
                    $stmt_user->execute();
                    $id_usuario_nuevo = $conn->insert_id;

                    // 3. Crear el Estudiante
                    $stmt_est = $conn->prepare("INSERT INTO estudiante (id_usuario, codigo_estudiante, fecha_ingreso) VALUES (?, ?, ?)");
                    $stmt_est->bind_param('iss', $id_usuario_nuevo, $codigo_estudiante, $fecha_ingreso);
                    $stmt_est->execute();
                    $id_estudiante_nuevo = $conn->insert_id;

                    // 4. Crear la Matrícula
                    $stmt_mat = $conn->prepare("INSERT INTO matricula (id_estudiante, id_programa, semestre) VALUES (?, ?, ?)");
                    $stmt_mat->bind_param('iis', $id_estudiante_nuevo, $id_programa, $semestre);
                    $stmt_mat->execute();

                    $conn->commit();
                    $success = 'Estudiante creado exitosamente.';
                } catch (Exception $e) {
                    $conn->rollback();
                    $error = $e->getMessage();
                }
            } else {
                $error = 'Los campos marcados con * son obligatorios.';
            }
            break;

        case 'editar':
            if (!empty($id_usuario) && !empty($id_estudiante) && !empty($dni) && !empty($primer_nombre) && !empty($apellido_paterno) && !empty($correo)) {
                $conn->begin_transaction();
                try {
                    // 1. Actualizar Usuario
                    $stmt_user = $conn->prepare("UPDATE usuario SET dni = ?, primer_nombre = ?, segundo_nombre = ?, apellido_paterno = ?, apellido_materno = ?, usuario = ?, correo = ?, telefono = ? WHERE id_usuario = ?");
                    $stmt_user->bind_param('ssssssssi', $dni, $primer_nombre, $segundo_nombre, $apellido_paterno, $apellido_materno, $usuario_form, $correo, $telefono, $id_usuario);
                    $stmt_user->execute();

                    // 2. Actualizar Estudiante
                    $stmt_est = $conn->prepare("UPDATE estudiante SET codigo_estudiante = ?, fecha_ingreso = ? WHERE id_estudiante = ?");
                    $stmt_est->bind_param('ssi', $codigo_estudiante, $fecha_ingreso, $id_estudiante);
                    $stmt_est->execute();

                    // 3. Actualizar o Crear Matrícula
                    // Primero, buscamos si ya existe una matrícula para este estudiante.
                    $stmt_find_mat = $conn->prepare("SELECT id_matricula FROM matricula WHERE id_estudiante = ? ORDER BY fecha_matricula DESC LIMIT 1");
                    $stmt_find_mat->bind_param('i', $id_estudiante);
                    $stmt_find_mat->execute();
                    $result_mat = $stmt_find_mat->get_result();

                    if ($result_mat->num_rows > 0) {
                        // Si existe, la actualizamos
                        $matricula_existente = $result_mat->fetch_assoc();
                        $id_matricula = $matricula_existente['id_matricula'];
                        $stmt_mat_update = $conn->prepare("UPDATE matricula SET id_programa = ?, semestre = ? WHERE id_matricula = ?");
                        $stmt_mat_update->bind_param('isi', $id_programa, $semestre, $id_matricula);
                        $stmt_mat_update->execute();
                    } else {
                        // Si no existe, creamos una nueva
                        $stmt_mat_insert = $conn->prepare("INSERT INTO matricula (id_estudiante, id_programa, semestre) VALUES (?, ?, ?)");
                        $stmt_mat_insert->bind_param('iis', $id_estudiante, $id_programa, $semestre);
                        $stmt_mat_insert->execute();
                    }

                    $conn->commit();
                    $success = 'Estudiante actualizado exitosamente.';
                } catch (Exception $e) {
                    $conn->rollback();
                    $error = 'Error al actualizar: ' . $e->getMessage();
                }
            } else {
                $error = 'Faltan datos para actualizar.';
            }
            break;
    }
}

// Obtener lista de estudiantes con su información completa
$sql_select = "
    SELECT 
        u.id_usuario, u.dni, u.primer_nombre, u.segundo_nombre, u.apellido_paterno, u.apellido_materno, u.correo, u.telefono, u.estado as estado_usuario,
        e.id_estudiante, e.codigo_estudiante, e.fecha_ingreso, 
        p.nombre as nombre_programa, m.semestre, m.estado as estado_matricula
    FROM usuario u
    JOIN estudiante e ON u.id_usuario = e.id_usuario
    LEFT JOIN matricula m ON e.id_estudiante = m.id_estudiante
    LEFT JOIN programa_estudio p ON m.id_programa = p.id_programa
    WHERE u.rol = 'estudiante'
    GROUP BY u.id_usuario
    ORDER BY u.apellido_paterno, u.apellido_materno, u.primer_nombre ASC
";
$estudiantes = $conn->query($sql_select)->fetch_all(MYSQLI_ASSOC);

// Obtener datos de un estudiante para editar
$estudiante_a_editar = null;
if ($accion === 'mostrar_editar' && !empty($id_usuario)) {
    $sql_edit = "
        SELECT u.*, e.id_estudiante, e.codigo_estudiante, e.fecha_ingreso, m.id_programa, m.semestre
        FROM usuario u 
        JOIN estudiante e ON u.id_usuario = e.id_usuario
        LEFT JOIN matricula m ON e.id_estudiante = m.id_estudiante
        WHERE u.id_usuario = ?
    ";
    $stmt_edit = $conn->prepare($sql_edit);
    $stmt_edit->bind_param('i', $id_usuario);
    $stmt_edit->execute();
    $estudiante_a_editar = $stmt_edit->get_result()->fetch_assoc();
}

?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Gestión de Estudiantes</h1>

    <?php if ($error) echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4'>$error</div>"; ?>
    <?php if ($success) echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4'>$success</div>"; ?>

    <!-- Formulario para Crear o Editar Estudiante -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4"><?php echo $estudiante_a_editar ? 'Editar' : 'Añadir Nuevo'; ?> Estudiante</h2>
        <form action="estudiantes.php" method="POST">
            <input type="hidden" name="accion" value="<?php echo $estudiante_a_editar ? 'editar' : 'crear'; ?>">
            <?php if ($estudiante_a_editar): ?>
                <input type="hidden" name="id_usuario" value="<?php echo $estudiante_a_editar['id_usuario']; ?>">
                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante_a_editar['id_estudiante']; ?>">
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <input type="text" name="dni" placeholder="DNI *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['dni'] ?? ''); ?>">
                <input type="text" name="primer_nombre" placeholder="Primer Nombre *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['primer_nombre'] ?? ''); ?>">
                <input type="text" name="segundo_nombre" placeholder="Segundo Nombre" class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($estudiante_a_editar['segundo_nombre'] ?? ''); ?>">
                <input type="text" name="apellido_paterno" placeholder="Apellido Paterno *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['apellido_paterno'] ?? ''); ?>">
                <input type="text" name="apellido_materno" placeholder="Apellido Materno *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['apellido_materno'] ?? ''); ?>">
                <input type="email" name="correo" placeholder="Correo Electrónico *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['correo'] ?? ''); ?>">
                <input type="text" name="telefono" placeholder="Teléfono" class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($estudiante_a_editar['telefono'] ?? ''); ?>">
                <input type="text" name="usuario" placeholder="Nombre de Usuario" class="w-full p-2 border rounded" value="<?php echo htmlspecialchars($estudiante_a_editar['usuario'] ?? ''); ?>">
                <input type="text" name="codigo_estudiante" placeholder="Código de Estudiante *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['codigo_estudiante'] ?? ''); ?>">
                <input type="date" name="fecha_ingreso" placeholder="Fecha de Ingreso *" class="w-full p-2 border rounded" required value="<?php echo htmlspecialchars($estudiante_a_editar['fecha_ingreso'] ?? ''); ?>">
                <select name="id_programa" class="w-full p-2 border rounded" required>
                    <option value="">Seleccionar Programa *</option>
                    <?php foreach ($programas as $programa): ?>
                        <option value="<?php echo $programa['id_programa']; ?>" <?php echo (isset($estudiante_a_editar) && $estudiante_a_editar['id_programa'] == $programa['id_programa']) ? 'selected' : ''; ?>><?php echo $programa['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="semestre" class="w-full p-2 border rounded" required>
                    <option value="">Seleccionar Semestre *</option>
                    <?php $semestres = ['I', 'II', 'III', 'IV', 'V', 'VI']; ?>
                    <?php foreach ($semestres as $sem): ?>
                        <option value="<?php echo $sem; ?>" <?php echo (isset($estudiante_a_editar) && $estudiante_a_editar['semestre'] == $sem) ? 'selected' : ''; ?>><?php echo $sem; ?> Semestre</option>
                    <?php endforeach; ?>
                </select>
                <?php if (!$estudiante_a_editar): ?>
                    <input type="password" name="contrasena" placeholder="Contraseña *" class="w-full p-2 border rounded" required>
                <?php endif; ?>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-red-700 text-white font-bold py-2 px-4 rounded hover:bg-red-800"><?php echo $estudiante_a_editar ? 'Actualizar Estudiante' : 'Guardar Estudiante'; ?></button>
                <?php if ($estudiante_a_editar): ?>
                    <a href="estudiantes.php" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-300 ml-2">Cancelar</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Tabla de Estudiantes -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Estudiantes Registrados</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left">DNI</th>
                        <th class="px-4 py-2 text-left">Nombre Completo</th>
                        <th class="px-4 py-2 text-left">Código</th>
                        <th class="px-4 py-2 text-left">Correo</th>
                        <th class="px-4 py-2 text-left">Programa</th>
                        <th class="px-4 py-2 text-left">Semestre</th>
                        <th class="px-4 py-2 text-left">Estado</th>
                        <th class="px-4 py-2 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    <?php if (empty($estudiantes)): ?>
                        <tr><td colspan="8" class="p-4 text-center text-gray-500">No hay estudiantes registrados.</td></tr>
                    <?php else: foreach ($estudiantes as $est): ?>
                        <tr>
                            <td class="p-2"><?php echo htmlspecialchars($est['dni']); ?></td>
                            <td class="p-2"><?php echo htmlspecialchars(trim($est['apellido_paterno'] . ' ' . $est['apellido_materno'] . ', ' . $est['primer_nombre'] . ' ' . $est['segundo_nombre'])); ?></td>
                            <td class="p-2"><?php echo htmlspecialchars($est['codigo_estudiante']); ?></td>
                            <td class="p-2"><?php echo htmlspecialchars($est['correo']); ?></td>
                            <td class="p-2"><?php echo htmlspecialchars($est['nombre_programa']); ?></td>
                            <td class="p-2"><?php echo htmlspecialchars($est['semestre']); ?></td>
                            <td class="p-2"><span class="px-2 py-1 font-semibold leading-tight <?php echo $est['estado_usuario'] ? 'text-green-700 bg-green-100' : 'text-red-700 bg-red-100'; ?> rounded-full"><?php echo $est['estado_usuario'] ? 'Activo' : 'Inactivo'; ?></span></td>
                            <td class="p-2 text-right">
                                <a href="estudiantes.php?accion=mostrar_editar&id_usuario=<?php echo $est['id_usuario']; ?>" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
