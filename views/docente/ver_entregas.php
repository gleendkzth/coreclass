<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- encabezado -->
    <div class="md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <a href="#" id="volver-a-tareas" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 mb-2">
                <span class="material-icons-round text-base mr-1">arrow_back_ios</span>
                Volver a Tareas
            </a>
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Entregas de Tarea
            </h2>
        </div>
    </div>

    <!-- resumen de la tarea -->
    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 space-y-4">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Investigación sobre IA</h3>
            <p class="mt-1 text-sm text-gray-600">
                Realizar una investigación exhaustiva sobre los últimos avances en Inteligencia Artificial, enfocándose en modelos de lenguaje grandes (LLMs) y su impacto en el desarrollo de software.
            </p>
        </div>
        <div class="flex items-center space-x-6 text-sm text-gray-500">
            <div class="flex items-center">
                <span class="material-icons-round text-lg mr-1.5">calendar_today</span>
                <span>Fecha Límite: <span class="font-medium text-gray-700">05/11/2024</span></span>
            </div>
        </div>
    </div>

    <!-- Botón para guardar cambios -->
    <div class="flex justify-end mb-4">
        <button id="guardar-calificaciones" class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
            <span class="material-icons-round text-base mr-2">save</span>
            Guardar Calificaciones
        </button>
    </div>

    <!-- tabla de entregas -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estudiante</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Entrega</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archivo Enviado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Calificación</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observación</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- fila de estudiante que entregó -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Ana García Pérez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">03/11/2024 10:30 AM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="#" class="text-red-700 hover:text-red-900 inline-flex items-center">
                                <span class="material-icons-round text-base mr-1">description</span>
                                Ver Archivo
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Entregado</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <input type="number" class="w-20 border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="-">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <input type="text" class="w-full border-gray-300 rounded-md shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm" placeholder="Añadir comentario...">
                        </td>
                    </tr>

                    <!-- fila de estudiante que no entregó -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Luis Martínez Rodríguez</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">No Entregó</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
(() => {
    const volverBtn = document.getElementById('volver-a-tareas');
    if (volverBtn) {
        volverBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const mainContent = document.getElementById('contenido-principal');
            mainContent.innerHTML = '<div class="flex justify-center items-center h-full"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-red-500"></div></div>';

            fetch('tareas.php')
                .then(response => response.text())
                .then(html => {
                    mainContent.innerHTML = html;
                    const newScript = document.createElement('script');
                    const scriptContent = mainContent.querySelector('script');
                    if (scriptContent) {
                        newScript.textContent = scriptContent.innerHTML;
                        document.body.appendChild(newScript).parentNode.removeChild(newScript);
                    }
                })
                .catch(error => {
                    mainContent.innerHTML = `<div class="text-center text-red-500 p-8"><strong>Error:</strong> ${error.message}</div>`;
                });
        });
    }
})();
</script>
