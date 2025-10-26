<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreClass - Tu Plataforma Educativa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="public/img/logo.png" type="image/png">
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
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ef4444' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="relative min-h-screen flex flex-col">
        <!-- Fondo decorativo -->
        <div class="absolute inset-0 bg-pattern opacity-50"></div>

        <!-- Contenido -->
        <div class="relative z-10 flex-grow flex flex-col">
            <!-- Header -->
            <header class="w-full">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center py-6">
                        <div class="flex items-center group">
                            <img src="public/img/ies.png" alt="Logo IES Ayaviri" class="h-12 mr-3">
                            <h1 class="text-4xl">
                                <span class="logo-sora relative">
                                    <span class="relative z-10">
                                        <span class="text-red-800">Core</span><span class="text-gray-700">Class</span>
                                    </span>
                                </span>
                            </h1>
                        </div>
                        <!-- <a href="views/auth/login.php" class="inline-block bg-red-800 text-white font-medium px-6 py-2 rounded-lg shadow-md hover:bg-red-900 transition-colors duration-300 transform hover:scale-105">
                            Acceder
                        </a> -->
                    </div>
                </div>
            </header>
        
            <!-- Hero Section -->
            <main class="flex-grow flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div class="max-w-3xl mx-auto">
                        <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight">
                            <span class="block text-gray-700 mt-2">Moderniza la Gestión Académica con Innovación, Eficiencia y Transparencia.</span>
                        </h2>
                        <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-600">
                        CoreClass centraliza la gestión de notas, asistencia, materiales y comunicación docente-estudiante en una sola plataforma digital.</p>
                        <div class="mt-10">
                            <a href="views/auth/login.php" class="inline-block bg-red-800 text-white font-bold text-xl px-10 py-4 rounded-xl shadow-xl hover:bg-red-900 transition-all duration-300 transform hover:scale-105">
                                ¡Comienza ahora!
                            </a>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="w-full py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
                    <p>&copy; <?php echo date('Y'); ?> Instituto de Educación Superior Tecnológico Público Ayaviri – Proyecto CoreClass.</p>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>
