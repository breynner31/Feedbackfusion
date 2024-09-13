<?php
session_start();
include_once('user.php');
include_once('user_session.php');
include_once('database.php');

if (!isset($_SESSION['email'])) {
    echo "Error: La sesión no se ha iniciado correctamente.";
    exit;
}

// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

$userEmail = $_SESSION['email']; // Suponiendo que usas el email para identificar al usuario
$updateField = key($_POST);
$updateValue = $_POST[$updateField];

// Conectar a la base de datos usando la clase Database
$db = new Database();
$conn = $db->connect();

if ($conn) {
    // Actualizar el campo correspondiente
    $sql = "UPDATE user SET $updateField = :value WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':value', $updateValue);
    $stmt->bindParam(':email', $userEmail);

    if ($stmt->execute()) {
        echo "Campo actualizado correctamente";
    } else {
        echo "Error al actualizar el campo: " . $stmt->errorInfo()[2];
    }

    // Desconectar de la base de datos
    $db->disconnect();
} else {
    echo "Error de conexión a la base de datos.";
}
?>