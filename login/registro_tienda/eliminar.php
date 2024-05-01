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

try {
    // Establecer conexión a la base de datos
    $pdo = new PDO("mysql:host=localhost;dbname=feedbackfusion", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta SQL para obtener el ID del restaurante asociado al usuario actual
    $query_id_restaurante = "SELECT id_restaurante FROM user WHERE email = ?";
    $stmt_id_restaurante = $pdo->prepare($query_id_restaurante);
    $stmt_id_restaurante->execute([$email_usuario]);
    $id_restaurante = $stmt_id_restaurante->fetchColumn();

    // Verificar si se encontró el ID del restaurante asociado al usuario
    if (!$id_restaurante) {
        echo "<script>alert('No se encontro restaurante asociado al usuario');</script>";
        exit;
    }

    // Preparar la consulta SQL para eliminar el restaurante
    $query_eliminar_restaurante = "DELETE FROM restaurante WHERE id_restaurante = ?";
    $stmt_eliminar_restaurante = $pdo->prepare($query_eliminar_restaurante);
    $stmt_eliminar_restaurante->execute([$id_restaurante]);

    echo "<script>alert('Restaurante eliminado exitosamente');</script>";

} catch (PDOException $e) {
    // Mostrar mensaje de error si hay algún problema con la base de datos
    echo "<script>alert('Error al eliminar el restaurante');</script>" . $e->getMessage();
}
?>
