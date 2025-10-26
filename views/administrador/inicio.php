<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}

require_once '../../config/conexion.php';

// contadores iniciales
$total_estudiantes = 0;
$total_docentes = 0;
// consulta para obtener el número total de programas de estudio
$sql_programas = "SELECT COUNT(*) as total FROM programa_estudio";
$resultado_programas = $conn->query($sql_programas);
$total_programas = ($resultado_programas && $resultado_programas->num_rows > 0) ? $resultado_programas->fetch_assoc()['total'] : 0;

// consulta para obtener el número de usuarios por rol
$sql_usuarios = "SELECT rol, COUNT(*) as total FROM usuario GROUP BY rol";
$resultado_usuarios = $conn->query($sql_usuarios);

$usuarios_por_rol = [
    'estudiante' => 0,
    'docente' => 0,
    'administrador' => 0
];

if ($resultado_usuarios) {
    while ($fila = $resultado_usuarios->fetch_assoc()) {
        if (isset($usuarios_por_rol[$fila['rol']])) {
            $usuarios_por_rol[$fila['rol']] = $fila['total'];
        }
    }
}

$total_estudiantes = $usuarios_por_rol['estudiante'];
$total_docentes = $usuarios_por_rol['docente'];

// aquí iría la lógica para obtener datos de asistencia (por ahora, se usan datos de ejemplo)
$asistencia_data = [95, 92, 98, 88, 96];

?>

<!-- Cargar Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h1>
    <p class="text-gray-600 mb-8">Vista panorámica del estado académico y administrativo.</p>

    <!-- Tarjetas de Resumen (KPIs) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
            <div class="bg-blue-500 p-3 rounded-full mr-4">
                <span class="material-icons-round text-white text-2xl">groups</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Estudiantes Totales</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $total_estudiantes; ?></p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
            <div class="bg-green-500 p-3 rounded-full mr-4">
                <span class="material-icons-round text-white text-2xl">account_box</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Docentes Activos</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $total_docentes; ?></p>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
            <div class="bg-red-500 p-3 rounded-full mr-4">
                <span class="material-icons-round text-white text-2xl">school</span>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Programas de Estudio</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo $total_programas; ?></p>
            </div>
        </div>
    </div>

    <!-- Gráficos de Estadísticas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Distribución de Usuarios</h2>
            <canvas id="usuariosChart"></canvas>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Asistencia (Última Semana)</h2>
            <canvas id="asistenciaChart"></canvas>
        </div>
    </div>

    <!-- Accesos Rápidos -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Accesos Directos</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="#" data-page="programas" class="nav-link bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all text-center flex flex-col items-center justify-center">
                <span class="material-icons-round text-4xl text-red-500">school</span>
                <p class="mt-2 font-semibold text-gray-700">Programas</p>
            </a>
            <a href="#" data-page="docentes" class="nav-link bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all text-center flex flex-col items-center justify-center">
                <span class="material-icons-round text-4xl text-green-500">account_box</span>
                <p class="mt-2 font-semibold text-gray-700">Docentes</p>
            </a>
            <a href="#" data-page="estudiantes" class="nav-link bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all text-center flex flex-col items-center justify-center">
                <span class="material-icons-round text-4xl text-blue-500">groups</span>
                <p class="mt-2 font-semibold text-gray-700">Estudiantes</p>
            </a>
            <a href="#" data-page="asistencia" class="nav-link bg-white p-6 rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all text-center flex flex-col items-center justify-center">
                <span class="material-icons-round text-4xl text-yellow-500">event_available</span>
                <p class="mt-2 font-semibold text-gray-700">Asistencia</p>
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- GRÁFICO DE USUARIOS ---
    const dataUsuarios = {
        labels: ['Estudiantes', 'Docentes', 'Admins'],
        datasets: [{
            label: 'Número de Usuarios',
            data: [<?php echo $usuarios_por_rol['estudiante']; ?>, <?php echo $usuarios_por_rol['docente']; ?>, <?php echo $usuarios_por_rol['administrador']; ?>],
            backgroundColor: [
                'rgba(59, 130, 246, 0.7)',
                'rgba(34, 197, 94, 0.7)',
                'rgba(234, 179, 8, 0.7)',
            ],
            borderColor: [
                'rgba(59, 130, 246, 1)',
                'rgba(34, 197, 94, 1)',
                'rgba(234, 179, 8, 1)',
            ],
            borderWidth: 1
        }]
    };

    const ctxUsuarios = document.getElementById('usuariosChart').getContext('2d');
    new Chart(ctxUsuarios, {
        type: 'doughnut',
        data: dataUsuarios,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // --- GRÁFICO DE ASISTENCIA ---
    const dataAsistencia = {
        labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
        datasets: [{
            label: 'Asistencia (%)',
            data: <?php echo json_encode($asistencia_data); ?>,
            backgroundColor: 'rgba(239, 68, 68, 0.2)',
            borderColor: 'rgba(239, 68, 68, 1)',
            pointBackgroundColor: 'rgba(239, 68, 68, 1)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgba(239, 68, 68, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true
        }]
    };

    const ctxAsistencia = document.getElementById('asistenciaChart').getContext('2d');
    new Chart(ctxAsistencia, {
        type: 'line',
        data: dataAsistencia,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    min: 80,
                    max: 100,
                    ticks: { callback: function(value) { return value + '%' } }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
});
</script>
