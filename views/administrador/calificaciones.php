<?php
session_start();

// verificar si el usuario está autenticado y tiene el rol de administrador
if (!isset($_SESSION['usuario_autenticado']) || $_SESSION['rol'] !== 'administrador') {
    http_response_code(403); // forbidden
    echo "Acceso denegado. Esta página solo puede ser cargada a través del panel de administrador.";
    exit;
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Calificaciones Globales</h1>

    <!-- Filtros y Acciones -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
            <input type="text" placeholder="Buscar estudiante..." class="md:col-span-1 border-gray-300 rounded-lg shadow-sm">
            <select class="md:col-span-1 border-gray-300 rounded-lg shadow-sm">
                <option>Todos los Cursos</option>
                <option>Matemáticas Básicas</option>
            </select>
            <select class="md:col-span-1 border-gray-300 rounded-lg shadow-sm">
                <option>Todos los Semestres</option>
                <option>2024-II</option>
            </select>
            <button class="md:col-span-1 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center">
                <span class="material-icons-round mr-2">download</span>
                Exportar Notas
            </button>
        </div>
    </div>

    <!-- Gráfico de Distribucion y Promedios -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Distribución de Calificaciones (Matemáticas Básicas)</h2>
            <canvas id="gradesChart"></canvas>
        </div>
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <p class="text-gray-600">Promedio del Curso</p>
                <p class="text-3xl font-bold text-blue-600">8.2</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <p class="text-gray-600">Tasa de Aprobación</p>
                <p class="text-3xl font-bold text-green-600">88%</p>
            </div>
        </div>
    </div>

    <!-- Tabla de Calificaciones -->
    <div class="bg-white shadow-lg rounded-lg overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Estudiante</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Curso</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Calificación</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Fila: Nota Alta -->
                <tr>
                    <td class="px-5 py-4"><div class="flex items-center"><img class="h-10 w-10 rounded-full mr-4" src="https://randomuser.me/api/portraits/men/6.jpg" alt=""><p class="font-medium">Carlos Ruiz</p></div></td>
                    <td class="px-5 py-4 text-sm">Física Cuántica</td>
                    <td class="px-5 py-4"><span class="px-3 py-1 font-semibold rounded-full bg-green-100 text-green-800">9.5</span></td>
                    <td class="px-5 py-4 text-center"><button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button></td>
                </tr>
                <!-- Fila: Nota Baja -->
                <tr>
                    <td class="px-5 py-4"><div class="flex items-center"><img class="h-10 w-10 rounded-full mr-4" src="https://randomuser.me/api/portraits/women/7.jpg" alt=""><p class="font-medium">Laura Méndez</p></div></td>
                    <td class="px-5 py-4 text-sm">Cálculo Avanzado</td>
                    <td class="px-5 py-4"><span class="px-3 py-1 font-semibold rounded-full bg-red-100 text-red-800">4.2</span></td>
                    <td class="px-5 py-4 text-center"><div class="flex justify-center space-x-3"><button class="text-gray-500 hover:text-blue-600"><span class="material-icons-round">visibility</span></button><button class="text-gray-500 hover:text-yellow-600"><span class="material-icons-round">notification_add</span></button></div></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    const ctxGrades = document.getElementById('gradesChart').getContext('2d');
    new Chart(ctxGrades, {
        type: 'bar',
        data: {
            labels: ['0-2', '3-4', '5-6', '7-8', '9-10'],
            datasets: [{
                label: 'Nº de Estudiantes',
                data: [5, 12, 35, 25, 10],
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } },
            plugins: { legend: { display: false } }
        }
    });
</script>
