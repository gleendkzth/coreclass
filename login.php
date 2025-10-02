<?php
// iniciar la sesión
session_start();

// si ya está autenticado, redirigir a inicio.php
if (isset($_SESSION['usuario_autenticado']) && $_SESSION['usuario_autenticado'] === true) {
    header('Location: inicio.php');
    exit();
}

// procesar el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // validación básica
    if (!empty($email) && !empty($password)) {
        // autenticación exitosa
        $_SESSION['usuario_autenticado'] = true;
        $_SESSION['usuario_email'] = $email;
        
        // redirigir a la página de inicio
        header('Location: inicio.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="assets/logo.png">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                    },
                    boxShadow: {
                        'card': '0 10px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1)',
                        'input': '0 0 0 3px rgba(14, 165, 233, 0.2)',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(10px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            },
            plugins: [
                require('@tailwindcss/forms')({
                    strategy: 'class',
                }),
            ],
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .bg-gradient-primary {
                @apply bg-gradient-to-r from-blue-500 to-cyan-500;
            }
            .text-gradient {
                @apply bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-500;
            }
            .btn {
                @apply px-6 py-3 rounded-lg font-medium transition-all duration-200 flex items-center justify-center gap-2;
            }
            .btn-primary {
                @apply bg-gradient-primary text-white hover:shadow-lg hover:-translate-y-0.5;
            }
            .btn-outline {
                @apply border border-gray-300 hover:bg-gray-50;
            }
        }
        
        /* animaciones personalizadas */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 flex items-center justify-center p-4">
    <div class="w-full max-w-6xl bg-white rounded-2xl shadow-card overflow-hidden flex flex-col md:flex-row">
        <!-- sección de login -->
        <div class="w-full md:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center">
            <div class="text-center mb-10">
                <div class="flex justify-center mb-6">
                    <div class="p-3 bg-blue-50 rounded-2xl shadow-inner">
                        <img src="assets/logo.png" alt="Logo CoreClass" class="w-16 h-auto">
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    Bienvenido a <span class="text-gradient">CoreClass</span>
                </h1>
                <p class="text-gray-600">Iniciar sesión </p>
            </div>

            <form id="loginForm" class="max-w-md w-full mx-auto space-y-6" method="POST" action="">
                <div class="space-y-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400 focus:outline-none focus:shadow-outline" 
                            placeholder="Correo electrónico" 
                            autocomplete="username" 
                            required
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <div id="emailError" class="text-sm text-red-500 ml-2"></div>
                </div>

                <div class="space-y-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="w-full pl-10 pr-10 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 placeholder-gray-400 focus:outline-none focus:shadow-outline" 
                            placeholder="Contraseña" 
                            autocomplete="current-password" 
                            required>
                        <button 
                            type="button" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-eye-slash text-sm"></i>
                        </button>
                    </div>
                    <div id="passwordError" class="text-sm text-red-500 ml-2"></div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" id="remember" class="sr-only peer">
                            <div class="w-5 h-5 bg-gray-100 rounded border border-gray-300 peer-checked:bg-blue-500 peer-checked:border-blue-500 flex items-center justify-center transition-colors">
                                <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <span class="text-gray-700 select-none">Recordar mi cuenta</span>
                    </label>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <button type="submit" class="btn btn-primary w-full">
                    <span>Iniciar sesión</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </button>

                <p class="text-center text-sm text-gray-600">
                    ¿No tienes una cuenta? 
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Regístrate</a>
                </p>
            </form>
        </div>
        
        <!-- Sección de Ilustración -->
        <div class="hidden md:flex md:w-1/2 bg-gradient-primary text-white p-8 lg:p-12 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: url('assets/1.png'); background-size: cover; background-position: center;"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent"></div>
            
            <div class="relative z-10 w-full max-w-md mx-auto flex flex-col h-full justify-center">
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-sm mb-6 shadow-lg">
                        <img src="assets/logo.png" alt="Logo" class="w-10 h-10">
                    </div>
                    <h2 class="text-4xl font-bold mb-4">
                        <span class="text-white">Core</span><span class="text-blue-100">Class</span>
                    </h2>
                    <p class="text-blue-100/90 text-lg">Tu plataforma educativa integral</p>
                </div>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-book text-blue-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Seguimiento académico</h3>
                            <p class="text-sm text-blue-100/90">Consulta tus notas, asistencias y promedios en tiempo real</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-chart-line text-blue-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Análisis detallado</h3>
                            <p class="text-sm text-blue-100/90">Visualiza tu progreso con estadísticas y reportes detallados</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4 p-4 rounded-xl bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-colors">
                        <div class="flex-shrink-0 w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-comments text-blue-200"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Comunicación directa</h3>
                            <p class="text-sm text-blue-100/90">Conéctate con profesores y compañeros en tiempo real</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-10 text-center text-sm text-blue-100/80">
                    <p>Menos papeleo. Más enseñanza. Decisiones que importan.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script>
        // toggle contraseña oculta
        document.querySelectorAll('[type="password"]').forEach(input => {
            const toggle = input.nextElementSibling;
            if (toggle && toggle.classList.contains('fa-eye-slash')) {
                toggle.addEventListener('click', function() {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }
        });

        // Formulario de inicio de sesión
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            
            // Validación básica del formulario
            if (!email || !password) {
                e.preventDefault();
                alert('Por favor, completa todos los campos');
                return false;
            }else if (email === "prueba@gmail.com" && password === "12345") {
                localStorage.setItem('usuario_autenticado', 'true');
                window.location.href = 'inicio.php';
                return true;
            }else {
                alert('Credenciales incorrectas');
                return false;
            }
        });
    </script>
</body>
</html>