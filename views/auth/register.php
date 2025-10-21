<?php
require_once '../../config/conexion.php';

$error = null;
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['email'] ?? '';
    $contrasena = $_POST['password'] ?? '';
    $confirmar_contrasena = $_POST['confirm_password'] ?? '';

    // validaciones básicas
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($contrasena)) {
        $error = 'Por favor, completa todos los campos.';
    } elseif ($contrasena !== $confirmar_contrasena) {
        $error = 'Las contraseñas no coinciden.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = 'El formato del correo electrónico no es válido.';
    } else {
        // verificar si el correo ya existe
        $sql_check = "SELECT id_usuario FROM Usuario WHERE correo = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('s', $correo);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $error = 'El correo electrónico ya está registrado.';
        } else {
            // la contraseña se guarda en texto plano
            $rol = 'estudiante'; // rol por defecto para auto-registro

            // insertar nuevo usuario
            $sql_insert = "INSERT INTO Usuario (nombre, apellido, correo, contrasena, rol) VALUES (?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('sssss', $nombre, $apellido, $correo, $contrasena, $rol);

            if ($stmt_insert->execute()) {
                $success = '¡Registro exitoso! Ahora puedes iniciar sesión.';
            } else {
                $error = 'Hubo un error al crear la cuenta. Por favor, inténtalo de nuevo.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - CoreClass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../../public/img/logo.png" type="image/png">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .logo-sora { font-family: 'Sora', sans-serif; font-weight: 800; letter-spacing: -0.03em; }
        .bg-pattern { background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23991b1b' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-8">
        <div class="absolute inset-0 bg-pattern opacity-50"></div>

        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-8">
                <a href="../../index.php" class="inline-block">
                    <h1 class="text-5xl">
                        <span class="logo-sora">
                            <span class="text-red-800">Core</span><span class="text-gray-700">Class</span>
                        </span>
                    </h1>
                </a>
                <p class="text-gray-600 mt-2">Crea tu cuenta de estudiante.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <form method="POST" action="" class="space-y-4">
                    <?php if ($error): ?>
                        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-center text-sm">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg text-center text-sm">
                            <?php echo htmlspecialchars($success); ?>
                            <a href="login.php" class="font-bold underline ml-2">Iniciar Sesión</a>
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                            <input type="text" id="nombre" name="nombre" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                        </div>
                        <div>
                            <label for="apellido" class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                            <input type="text" id="apellido" name="apellido" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmar Contraseña</label>
                        <input type="password" id="confirm_password" name="confirm_password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-red-800 text-white font-medium px-6 py-3 rounded-lg shadow-md hover:bg-red-900 transition-colors duration-300 transform hover:scale-105">
                            Crear Cuenta
                        </button>
                    </div>
                </form>
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        ¿Ya tienes una cuenta? 
                        <a href="login.php" class="font-medium text-red-700 hover:text-red-600">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>