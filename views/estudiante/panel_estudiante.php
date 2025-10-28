<?php
// iniciar la sesión
session_start();

// verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['usuario_autenticado'] !== true) {
    // si no hay sesión activa, redirigir al login
    header('Location: ../../views/auth/login.php');
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
    <link rel="icon" href="../../public/img/logo.png" type="image/png">
    
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

        /* Estilos para forzar el estado expandido (hover simulado) */
        .sidebar-pinned {
            width: 16rem !important; /* lg:w-64 */
        }
        .sidebar-pinned .nav-link span,
        .sidebar-pinned #pin-sidebar-btn span {
            display: inline !important;
            opacity: 1 !important;
        }
        .sidebar-pinned .nav-link,
        .sidebar-pinned #pin-sidebar-btn {
            justify-content: flex-start !important;
        }

        /* estilos para el botón orejita */
        .sidebar-toggle-ear {
            position: absolute;
            right: -30px;
            top: 1px;
            width: 30px;
            height: 60px;
            background: white;
            border-radius: 0 12px 12px 0;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 50;
            border: 1px solid #e5e7eb;
            border-left: none;
        }


        /* ocultar orejita en móviles */
        @media (max-width: 1023px) {
            .sidebar-toggle-ear {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-50 h-screen overflow-hidden">
    <div class="h-full flex flex-col">
        <header class="bg-red-800 border-b border-red-700 shadow-sm w-full">
            <div class="w-full px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16 w-full">
                    <!-- logo y menu toggle -->
                    <div class="flex items-center">
                        <!-- boton amburguesa para moviles -->
                        <button id="menu-toggle" class="mr-4 p-2 rounded-md text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white lg:hidden">
                            <span class="sr-only">Abrir menú principal</span>
                            <span class="material-icons-round">menu</span>
                        </button>
                        <h1 class="text-3xl">
                            <span class="logo-sora relative">
                                <span class="relative z-10">
                                    <span class="text-white">Core</span>
                                    <span class="text-white">Class</span>
                                </span>
                                <span class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-red-600 via-red-500 to-red-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-400 origin-left"></span>
                            </span>
                        </h1>
                    </div>
                    
                    <!-- acciones de usuario -->
                    <div class="flex items-center space-x-2 md:space-x-4">
                        <!-- Menú de usuario unificado -->
                        <div class="flex items-center space-x-3 border-l border-red-700 pl-2 md:pl-4">
                            <div class="text-right hidden md:block">
                                <p class="text-sm font-medium text-white"><?php echo $_SESSION['primer_nombre']; ?> <?php echo $_SESSION['apellido_paterno']; ?></p>
                                <p class="text-xs text-gray-300">Estudiante</p>
                            </div>
                            <div class="relative group">
                                <button id="user-menu-button" class="flex items-center space-x-1 focus:outline-none">
                                    <div class="h-9 w-9 rounded-full bg-gradient-to-r from-red-600 via-red-500 to-red-400 flex items-center justify-center text-white font-medium">
                                        <?php echo strtoupper(substr($_SESSION['primer_nombre'], 0, 1)); ?>
                                    </div>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="user-menu-dropdown" 
                                     class="hidden absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl overflow-hidden z-20 transition-all duration-200 ease-out transform origin-top-right scale-95 opacity-0"
                                     data-transition-enter="transition ease-out duration-100"
                                     data-transition-enter-start="transform opacity-0 scale-95"
                                     data-transition-enter-end="transform opacity-100 scale-100"
                                     data-transition-leave="transition ease-in duration-75"
                                     data-transition-leave-start="transform opacity-100 scale-100"
                                     data-transition-leave-end="transform opacity-0 scale-95">
                                    <div class="px-4 py-3 border-b border-gray-200">
                                        <p class="text-sm font-semibold text-gray-800 truncate">
                                            <?php echo htmlspecialchars($_SESSION['nombre_completo']); ?>
                                        </p>
                                        <p class="text-xs text-gray-500 truncate">
                                            Estudiante
                                        </p>
                                    </div>
                                    <div class="py-1">
                                        <a href="#" data-page="perfil" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-150 nav-link">
                                            <span class="material-icons-round text-base mr-3">account_circle</span>
                                            Mi Cuenta
                                        </a>
                                    </div>
                                    <div class="py-1 border-t border-gray-200">
                                        <a href="#" onclick="confirmLogout()" class="flex items-center w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                                            <span class="material-icons-round text-base mr-3">logout</span>
                                            Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </header>
        <div class="flex flex-1 overflow-hidden">
            <!-- Barra lateral -->
            <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg flex flex-col transition-transform duration-300 ease-in-out transform -translate-x-full lg:relative lg:translate-x-0 lg:w-20 lg:hover:w-64 group">
                <!-- botón orejita con funcionalidad de fijar -->
                <div id="sidebar-ear-toggle" class="sidebar-toggle-ear cursor-pointer hover:bg-gray-50 transition-colors" title="Fijar sidebar">
                    <span id="ear-pin-icon" class="material-icons-round text-gray-600 text-base transform -rotate-45">
                        push_pin
                    </span>
                </div>
                
                <!-- contenido del menú con scroll interno -->
                <div class="flex-1 flex flex-col overflow-hidden">
                    <!-- cabecera del sidebar para móviles -->
                    <div class="p-4 lg:hidden">
                        <h2 class="text-2xl text-gray-800 logo-sora">
                            <span class="text-red-700">Core</span><span class="text-gray-700">Class</span>
                        </h2>
                    </div>
                    <div class="px-2 lg:hidden">
                        <hr class="border-gray-200"/>
                    </div>
            
                    <!-- menú de navegación -->
                    <nav class="flex-1 overflow-y-auto" aria-label="Menú principal">
                        <div class="px-2 py-1">
                            <!-- Inicio -->
                            <a href="#" data-page="inicio" class="relative flex items-center lg:justify-center lg:group-hover:justify-start px-2 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 nav-link">
                                <div class="w-12 flex justify-center items-center">
                                    <span class="material-icons-round text-lg text-gray-500 group-hover:text-gray-700 transition-colors duration-200">home</span>
                                </div>
                                <span class="ml-4 whitespace-nowrap lg:hidden lg:group-hover:inline lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">Inicio</span>
                            </a>

                            <!-- Cursos -->
                            <a href="#" data-page="cursos" class="relative flex items-center lg:justify-center lg:group-hover:justify-start px-2 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 nav-link">
                                <div class="w-12 flex justify-center items-center">
                                    <span class="material-icons-round text-lg text-gray-500 group-hover:text-gray-700 transition-colors duration-200">school</span>
                                </div>
                                <span class="ml-4 whitespace-nowrap lg:hidden lg:group-hover:inline lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">Cursos</span>
                            </a>

                            <!-- Calificaciones -->
                            <a href="#" data-page="calificaciones" class="relative flex items-center lg:justify-center lg:group-hover:justify-start px-2 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 nav-link">
                                <div class="w-12 flex justify-center items-center">
                                    <span class="material-icons-round text-lg text-gray-500 group-hover:text-gray-700 transition-colors duration-200">grade</span>
                                </div>
                                <span class="ml-4 whitespace-nowrap lg:hidden lg:group-hover:inline lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">Calificaciones</span>
                            </a>

                            <!-- Tareas & Entregas -->
                            <a href="#" data-page="tareas" class="relative flex items-center lg:justify-center lg:group-hover:justify-start px-2 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 nav-link">
                                <div class="w-12 flex justify-center items-center">
                                    <span class="material-icons-round text-lg text-gray-500 group-hover:text-gray-700 transition-colors duration-200">assignment</span>
                                </div>
                                <span class="ml-4 whitespace-nowrap lg:hidden lg:group-hover:inline lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">Tareas & Entregas</span>
                            </a>

                            <!-- Asistencia -->
                            <a href="#" data-page="asistencia" class="relative flex items-center lg:justify-center lg:group-hover:justify-start px-2 py-3 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors duration-200 nav-link">
                                <div class="w-12 flex justify-center items-center">
                                    <span class="material-icons-round text-lg text-gray-500 group-hover:text-gray-700 transition-colors duration-200">event_available</span>
                                </div>
                                <span class="ml-4 whitespace-nowrap lg:hidden lg:group-hover:inline lg:opacity-0 lg:group-hover:opacity-100 transition-opacity duration-300">Asistencia</span>
                            </a>

                        </div>
                    </nav>
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
            const menuToggle = document.getElementById('menu-toggle');
            let backdrop = null;
            const navLinks = document.querySelectorAll('.nav-link');

            // función para cargar contenido
            function loadContent(page) {
                // mostrar un indicador de carga
                mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';

                fetch(`${page}.php`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('La página no pudo ser cargada.');
                        }
                        return response.text();
                    })
                    .then(html => {
                        mainContent.innerHTML = html;

                        // ejecutar los scripts que vienen en el html cargado
                        const scripts = mainContent.querySelectorAll('script');
                        scripts.forEach(script => {
                            const newScript = document.createElement('script');
                            if (script.src) {
                                // añadir un timestamp para forzar la recarga del script en cada navegación
                                newScript.src = script.src + '?v=' + new Date().getTime();
                            } else {
                                // si es un script en línea, copiamos el contenido
                                newScript.textContent = script.innerHTML;
                            }
                            document.body.appendChild(newScript);
                        });
                    })
                    .catch(error => {
                        mainContent.innerHTML = `<div class="text-center text-red-500 p-8"><strong>Error:</strong> ${error.message}</div>`;
                        console.error('Error al cargar la página:', error);
                    });
            }

            // cargar la página de inicio por defecto
            loadContent('inicio');
            // marcar el enlace de inicio como activo
            const defaultActiveLink = document.querySelector('a[data-page="inicio"]');
            if(defaultActiveLink) {
                defaultActiveLink.classList.add('bg-red-800', 'text-white');
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
                        innerLink.classList.remove('bg-red-800', 'text-white');
                        innerLink.classList.add('text-gray-700', 'hover:bg-gray-100');
                        // restaurar el color original de los iconos
                        const icons = innerLink.querySelectorAll('.material-icons-round');
                        icons.forEach(icon => {
                            icon.classList.remove('text-white');
                            icon.classList.add('text-gray-500', 'group-hover:text-gray-700');
                        });
                    });

                    // añadir clase activa al enlace clickeado y su icono
                    this.classList.add('bg-red-800', 'text-white');
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
                        if(backdrop) backdrop.remove();
                        backdrop = null;
                    }
                });
            });

            // lógica para el menú lateral responsivo
            function toggleSidebar() {
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    // crear y mostrar el backdrop
                    if (!backdrop) {
                        backdrop = document.createElement('div');
                        backdrop.className = 'fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden';
                        document.body.appendChild(backdrop);
                        backdrop.addEventListener('click', toggleSidebar);
                    }
                } else {
                    sidebar.classList.add('-translate-x-full');
                    // eliminar el backdrop
                    if (backdrop) {
                        backdrop.remove();
                        backdrop = null;
                    }
                }
            }

            menuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleSidebar();
            });

            // ajustar el estado del sidebar en resize
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    if (backdrop) {
                        backdrop.remove();
                        backdrop = null;
                    }
                    // mainContent.style.marginLeft = sidebar.classList.contains('lg:w-20') ? '5rem' : '16rem';
                } else {
                    sidebar.classList.add('-translate-x-full');
                    mainContent.style.marginLeft = '0';
                }
            });

            // ajustar el margen del contenido principal según el estado de la barra lateral en escritorio
            // const observer = new MutationObserver(() => {
            //     if (window.innerWidth >= 1024) {
            //         if (sidebar.classList.contains('lg:hover:w-64') && sidebar.matches(':hover')) {
            //             mainContent.style.marginLeft = '16rem';
            //         } else {
            //             mainContent.style.marginLeft = '5rem';
            //         }
            //     }
            // });

            // sidebar.addEventListener('mouseenter', () => {
            //     if (window.innerWidth >= 1024) mainContent.style.marginLeft = '16rem';
            // });
            // sidebar.addEventListener('mouseleave', () => {
            //     if (window.innerWidth >= 1024) mainContent.style.marginLeft = '5rem';
            // });

            // // inicializar margen
            // if (window.innerWidth >= 1024) {
            //     mainContent.style.marginLeft = '5rem';
            // }

            // gestión global de dropdowns para que solo uno esté abierto a la vez
            const dropdowns = [];

            function setupDropdown(buttonId, dropdownId) {
                const button = document.getElementById(buttonId);
                const dropdown = document.getElementById(dropdownId);
                const dropdownState = {
                    id: dropdownId,
                    button: button,
                    dropdown: dropdown,
                    isOpen: false,
                    toggle(show) {
                        if (this.isOpen === show) return;

                        if (show) {
                            // cerrar otros dropdowns abiertos
                            dropdowns.forEach(d => {
                                if (d.id !== this.id && d.isOpen) {
                                    d.toggle(false);
                                }
                            });
                            this.dropdown.classList.remove('hidden');
                            requestAnimationFrame(() => {
                                this.dropdown.classList.remove('opacity-0', 'scale-95');
                                this.dropdown.classList.add('opacity-100', 'scale-100');
                            });
                        } else {
                            this.dropdown.classList.remove('opacity-100', 'scale-100');
                            this.dropdown.classList.add('opacity-0', 'scale-95');
                            setTimeout(() => {
                                this.dropdown.classList.add('hidden');
                            }, 150);
                        }
                        this.isOpen = show;
                    }
                };

                button.addEventListener('click', (event) => {
                    event.stopPropagation();
                    dropdownState.toggle(!dropdownState.isOpen);
                });

                dropdowns.push(dropdownState);
            }

            // cerrar todos los dropdowns si se hace clic fuera
            window.addEventListener('click', () => {
                dropdowns.forEach(d => {
                    if (d.isOpen) {
                        d.toggle(false);
                    }
                });
            });

            // inicializar los dropdowns
            setupDropdown('user-menu-button', 'user-menu-dropdown');

            // lógica para fijar el sidebar con el botón orejita
            const sidebarEarToggle = document.getElementById('sidebar-ear-toggle');
            const earPinIcon = document.getElementById('ear-pin-icon');

            sidebarEarToggle.addEventListener('click', (e) => {
                e.stopPropagation();
                sidebar.classList.toggle('sidebar-pinned');

                if (sidebar.classList.contains('sidebar-pinned')) {
                    // estado: fijado (hover simulado)
                    sidebar.classList.remove('lg:hover:w-64'); // desactivar hover original
                    earPinIcon.classList.remove('-rotate-45');
                    earPinIcon.classList.add('text-red-500');
                } else {
                    // estado: normal (con hover)
                    sidebar.classList.add('lg:hover:w-64'); // reactivar hover original
                    earPinIcon.classList.add('-rotate-45');
                    earPinIcon.classList.remove('text-red-500');
                }
            });
        });
    </script>
<script>
    function confirmLogout() {
        if (confirm("¿Estás seguro de que quieres cerrar sesión?")) {
            window.location.href = '../auth/logout.php';
        }
    }
</script>
</body>
</html>