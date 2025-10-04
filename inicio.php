<?php
// iniciar la sesión
session_start();

// verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    // si no hay sesión activa, redirigir al login
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreClass</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@700;800&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/logo.png" type="image/png">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .logo-sora {
            font-family: 'Sora', sans-serif;
            font-weight: 800;
            letter-spacing: -0.03em;
        }
        .sidebar { transition: all 0.3s ease; }
        .submenu { 
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .has-submenu.active .submenu {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
    </style>
</head>
<body class="bg-gray-50 h-screen overflow-hidden">
    <div class="h-full flex flex-col">
        <header class="bg-white border-b border-gray-200 shadow-sm w-full">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 w-full">
                    <!-- logo -->
                    <div class="flex items-center group">
                        <h1 class="text-3xl">
                            <span class="logo-sora relative">
                                <span class="relative z-10">
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-700 to-cyan-500">Core</span>
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-emerald-500">Class</span>
                                </span>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-cyan-500 to-emerald-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-400 origin-left"></span>
                            </span>
                        </h1>
                    </div>
                    
                    <!-- acciones de usuario -->
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-full transition-colors" title="Notificaciones">
                            <span class="material-icons-round relative">
                                notifications_none
                                <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                            </span>
                        </button>
                        <div class="hidden md:flex items-center space-x-3 border-l border-gray-200 pl-4">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">Mark</p>
                                <p class="text-xs text-gray-500">Estudiante</p>
                            </div>
                            <div class="relative group">
                                <button class="flex items-center space-x-1 focus:outline-none">
                                    <div class="h-9 w-9 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center text-white font-medium">
                                        U
                                    </div>
                                    <span class="material-icons-round text-gray-500 text-lg">expand_more</span>
                                </button>
                                <!-- menú desplegable -->
                                <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi perfil</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Configuración</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Cerrar sesión</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="flex flex-1 overflow-hidden">
            <!-- Barra lateral -->
            <aside class="w-64 bg-white shadow-lg flex flex-col h-full z-30 transition-all duration-300 ease-in-out transform -translate-x-full lg:translate-x-0" id="sidebar">
                <!-- contenido del menú con scroll interno -->
                <div class="flex-1 flex flex-col overflow-hidden">
            
                    <!-- menú de navegación -->
                    <nav class="flex-1 overflow-y-auto" aria-label="Menú principal">
                        <div class="px-2 py-1">
                            <!-- Inicio -->
                            <a href="#" data-page="principal" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">home</span>
                                <span>Inicio</span>
                            </a>

                            <!-- Mis Cursos -->
                            <a href="#" data-page="cursos" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">school</span>
                                <span>Mis Cursos</span>
                            </a>

                            <!-- Horario -->
                            <a href="#" data-page="horario" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">calendar_today</span>
                                <span>Horario</span>
                            </a>

                            <!-- Calificaciones -->
                            <a href="#" data-page="calificaciones" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">grade</span>
                                <span>Calificaciones</span>
                            </a>

                            <!-- Tareas & Entregas -->
                            <a href="#" data-page="tareas" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">assignment</span>
                                <span>Tareas & Entregas</span>
                            </a>

                            <!-- Exámenes -->
                            <a href="#" data-page="examenes" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">quiz</span>
                                <span>Exámenes</span>
                            </a>

                            <!-- Materiales -->
                            <a href="#" data-page="materiales" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">folder</span>
                                <span>Materiales</span>
                            </a>

                            <!-- Asistencia -->
                            <a href="#" data-page="asistencia" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">event_available</span>
                                <span>Asistencia</span>
                            </a>

                            <!-- Mensajes -->
                            <a href="#" data-page="mensajes" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">chat_bubble_outline</span>
                                <span>Mensajes</span>
                            </a>

                            <!-- Recomendaciones -->
                            <a href="#" data-page="recomendaciones" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">notifications_none</span>
                                <span>Recomendaciones</span>
                            </a>

                            <!-- Soporte -->
                            <a href="#" data-page="soporte" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 group mb-1 nav-link">
                                <span class="material-icons-round mr-3 text-lg text-gray-500 group-hover:text-gray-700">help_outline</span>
                                <span>Soporte</span>
                            </a>
                        </div>
                    </nav>
                </div>
                
                <!-- Perfil de usuario -->
                <div class="p-4 border-t border-gray-200 mt-auto">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="material-icons-round text-4xl text-gray-400" aria-hidden="true">account_circle</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Mark</p>
                            <p class="text-xs text-gray-500 truncate"><?php echo $_SESSION['usuario_email']; ?></p>
                        </div>
                        <div class="ml-auto">
                            <button class="p-1 text-gray-400 hover:text-gray-500 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Configuración de usuario">
                                <span class="material-icons-round text-xl">settings</span>
                            </button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Contenido principal -->
            <main id="contenido-principal" class="flex-1 overflow-y-auto bg-gradient-to-br from-gray-25 to-gray-100 p-4 sm:p-6 lg:p-8">
                <!-- contenido dinámicamente -->
            </main>
        </div>

    <script>
    // script para el menú lateral y carga de contenido
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('contenido-principal');
            const navLinks = document.querySelectorAll('.nav-link');

            // función para cargar contenido
            function loadContent(page) {
                // mostrar un indicador de carga
                mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-blue-500"></div></div>';

                fetch(`pages/${page}.php`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('La página no pudo ser cargada.');
                        }
                        return response.text();
                    })
                    .then(html => {
                        mainContent.innerHTML = html;
                    })
                    .catch(error => {
                        mainContent.innerHTML = `<div class="text-center text-red-500 p-8"><strong>Error:</strong> ${error.message}</div>`;
                        console.error('Error al cargar la página:', error);
                    });
            }

            // cargar la página de inicio por defecto
            loadContent('principal');
            // marcar el enlace de inicio como activo
            const defaultActiveLink = document.querySelector('a[data-page="principal"]');
            if(defaultActiveLink) {
                defaultActiveLink.classList.add('bg-blue-600', 'text-white');
                defaultActiveLink.classList.remove('text-gray-700', 'hover:bg-gray-100');
                // cambiar el color del ícono a blanco
                const icon = defaultActiveLink.querySelector('.material-icons-round');
                if (icon) {
                    icon.classList.remove('text-gray-500', 'group-hover:text-gray-700');
                    icon.classList.add('text-white');
                }
            }

            // cambia de sección al hacer clic en el menú y resalta la opción seleccionada
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const page = this.dataset.page;

                    // quitar clase activa de todos los enlaces e iconos
                    navLinks.forEach(innerLink => {
                        innerLink.classList.remove('bg-blue-600', 'text-white');
                        innerLink.classList.add('text-gray-700', 'hover:bg-gray-100');
                        // restaurar el color original de los iconos
                        const icons = innerLink.querySelectorAll('.material-icons-round');
                        icons.forEach(icon => {
                            icon.classList.remove('text-white');
                            icon.classList.add('text-gray-500', 'group-hover:text-gray-700');
                        });
                    });

                    // añadir clase activa al enlace clickeado y su icono
                    this.classList.add('bg-blue-600', 'text-white');
                    this.classList.remove('text-gray-700', 'hover:bg-gray-100');
                    // cambiar el color del ícono a blanco
                    const icon = this.querySelector('.material-icons-round');
                    if (icon) {
                        icon.classList.remove('text-gray-500', 'group-hover:text-gray-700');
                        icon.classList.add('text-white');
                    }

                    loadContent(page);

                    // cerrar sidebar en móvil
                    if (window.innerWidth < 1024) {
                        sidebar.classList.add('-translate-x-full');
                    }
                });
            });

            // lógica para el menú lateral
            const menuToggle = document.getElementById('menu-toggle');
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
            
            function handleResize() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                } else {
                    if (!sidebar.classList.contains('manual-toggle')) {
                       sidebar.classList.add('-translate-x-full');
                    }
                }
            }
            
            handleResize();
            window.addEventListener('resize', handleResize);
        });
    </script>
</body>
</html>