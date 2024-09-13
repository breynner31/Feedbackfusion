<?php
session_start();
include("../database.php");
include_once('../user.php');
include_once('../user_session.php');

// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

// Verificar si la sesión se ha iniciado correctamente
if (!isset($_SESSION['email'])) {
    echo "Error: La sesión no se ha iniciado correctamente.";
    exit;
}

// Obtener el correo electrónico del usuario desde la sesión
$email_usuario = $_SESSION['email'];
?>