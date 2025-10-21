<?php
session_start();

// destruir todas las variables de sesion
$_SESSION = array();

// si se desea destruir la sesion completamente, borre tambien la cookie de sesion.
// nota: ¡esto destruira la sesion, y no solo los datos de la sesion!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// finalmente, destruir la sesion.
session_destroy();

// redirigir a la pagina de inicio de sesion
header("Location: login.php");
exit;
?>
