<?php
function verificarSesion() {
    session_start();

    // Definir el tiempo máximo de inactividad en segundos (por ejemplo, 300 segundos = 5 minutos)
    $tiempoMaximoInactividad = 30;

    // Verificar si la última actividad ha ocurrido dentro del tiempo permitido
    if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > $tiempoMaximoInactividad)) {
        // Destruir la sesión y redirigir al usuario al inicio de sesión
        session_unset();
        session_destroy();
        header('Location: index.html');
        exit();
    }

    // Actualizar el tiempo de la última actividad
    $_SESSION['ultimo_acceso'] = time();
}
?>
