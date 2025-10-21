<?php
// Configuración de la base de datos
$host = "127.0.0.1";
$user = "zeth";
$pass = "zeth8080";
$dbname = "coreclass_db";

// Crear conexión con control de errores
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar conexión
if ($conn->connect_errno) {
    error_log("[" . date("Y-m-d H:i:s") . "] Error de conexión: " . $conn->connect_error . "\n", 3, __DIR__ . "/../logs/error.log");
    die("No se pudo conectar a la base de datos.");
}

$conn->set_charset("utf8mb4");
?>
