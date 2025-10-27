<?php
// Incluir el autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Cargar las variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Configuración de la base de datos usando variables de entorno
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

// Crear conexión con control de errores
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_errno) {
    error_log("[" . date("Y-m-d H:i:s") . "] Error de conexión: " . $conn->connect_error . "\n", 3, __DIR__ . "/../logs/error.log");
    die("No se pudo conectar a la base de datos.");
}

$conn->set_charset("utf8mb4");
?>
