<?php
session_start();
require_once "../../config/conexion.php"; // Ajusta la ruta según tu estructura

// Si ya está logueado, redirige según rol
if (isset($_SESSION['rol'])) {
    $redirect_map = [
        'administrador' => '../administrador/panel_administrador.php',
        'docente' => '../docente/panel_docente.php',
        'estudiante' => '../estudiante/panel_estudiante.php'
    ];
    if (isset($redirect_map[$_SESSION['rol']])) {
        header("Location: " . $redirect_map[$_SESSION['rol']]);
        exit;
    }
}

$error = null;
// Procesar el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['email'] ?? '';
    $contrasena = $_POST['password'] ?? '';

    if (!empty($correo) && !empty($contrasena)) {
        // se recomienda usar sentencias preparadas para prevenir inyección sql
        $sql = "SELECT * FROM Usuario WHERE correo = ? AND contrasena = ?"; // la contraseña no está hasheada
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $correo, $contrasena);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($row = $resultado->fetch_assoc()) {
            $_SESSION['usuario_autenticado'] = true;
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['rol'] = $row['rol'];

            $redirect_map = [
                'administrador' => '../administrador/panel_administrador.php',
                'docente' => '../docente/panel_docente.php',
                'estudiante' => '../estudiante/panel_estudiante.php'
            ];

            if (isset($redirect_map[$row['rol']])) {
                header("Location: " . $redirect_map[$row['rol']]);
                exit;
            }
        } else {
            $error = "Correo o contraseña incorrectos.";
        }
    } else {
        $error = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - CoreClass</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="../../public/img/logo.png" type="image/png">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .logo-sora {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            letter-spacing: -0.03em;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23991b1b' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="relative min-h-screen flex flex-col items-center justify-center px-4">
        <!-- fondo decorativo -->
        <div class="absolute inset-0 bg-pattern opacity-50"></div>

        <!-- contenedor del formulario -->
        <div class="relative z-10 w-full max-w-md">
            <div class="text-center mb-8">
                <a href="../../index.php" class="inline-block">
                    <h1 class="text-5xl">
                        <span class="logo-sora">
                            <span class="text-red-800">Core</span><span class="text-gray-700">Class</span>
                        </span>
                    </h1>
                </a>
                <p class="text-gray-600 mt-2">Inicia sesión para acceder a tu cuenta.</p>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <form method="POST" action="" class="space-y-6">
                    <?php if ($error): ?>
                        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg text-center text-sm">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors"
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                        <input type="password" id="password" name="password" required 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 transition-colors">
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-red-800 text-white font-medium px-6 py-3 rounded-lg shadow-md hover:bg-red-900 transition-colors duration-300 transform hover:scale-105">
                            Iniciar Sesión
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>