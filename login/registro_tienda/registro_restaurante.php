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

// Verificar si se ha enviado el formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Resto del código...
} else {
    // Si no se ha enviado el formulario, mostrar un mensaje de error
    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="registro.php";</script>';
    exit; // Detener la ejecución del script
}

// Verificar si se ha enviado el formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Aquí puedes verificar la información del formulario y guardarla en la base de datos
    // Por ejemplo:
    $nombre_restaurante = isset($_POST['nombre_restaurante']) ? $_POST['nombre_restaurante'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';

    // Obtener el correo electrónico del usuario existente desde la sesión
    $email_usuario = $_SESSION['email']; // Suponiendo que el correo electrónico del usuario existente está almacenado en la sesión

    // Verificar si se obtuvo correctamente el correo electrónico del usuario
    if (!$email_usuario) {
        echo '<script>alert("Error: No se pudo obtener el correo electrónico del usuario."); window.location ="registro.php";</script>';
        exit;
    }

    // Obtener la información del archivo de imagen
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];

    // Verificar si se proporcionó una imagen y si se subió correctamente
    if (!empty($foto_tmp) && is_uploaded_file($foto_tmp)) {
        // Leer el contenido de la imagen
        $foto_binaria = file_get_contents($foto_tmp);
    } else {
        // Si no se proporcionó una imagen válida, mostrar un mensaje de error
        echo '<script>alert("Por favor, selecciona una imagen válida para el restaurante."); window.location ="registro.php";</script>';
        exit; // Detener la ejecución del script
    }

    try {
        // Establecer conexión a la base de datos
        $pdo = new PDO("mysql:host=localhost;dbname=feedbackfusion", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction(); // Comenzar transacción

        // Preparar la consulta SQL para insertar el restaurante
        $query_restaurante = "INSERT INTO restaurante (nombre_restaurante, direccion, telefono, descripcion, foto) VALUES (?, ?, ?, ?, ?)";
        $stmt_restaurante = $pdo->prepare($query_restaurante);
        $stmt_restaurante->bindParam(1, $nombre_restaurante);
        $stmt_restaurante->bindParam(2, $direccion);
        $stmt_restaurante->bindParam(3, $telefono);
        $stmt_restaurante->bindParam(4, $descripcion);
        $stmt_restaurante->bindParam(5, $foto_binaria, PDO::PARAM_LOB);
        $stmt_restaurante->execute();

        // Obtener el ID del restaurante recién insertado
        $id_restaurante = $pdo->lastInsertId();

        // Actualizar el campo id_restaurante en la tabla user utilizando el correo electrónico del usuario
        $query_actualizar_usuario = "UPDATE user SET id_restaurante = ? WHERE email = ?";
        $stmt_actualizar_usuario = $pdo->prepare($query_actualizar_usuario);
        $stmt_actualizar_usuario->bindParam(1, $id_restaurante);
        $stmt_actualizar_usuario->bindParam(2, $email_usuario);
        $stmt_actualizar_usuario->execute();

        // Confirmar transacción
        $pdo->commit();

        // Si todo sale bien, mostrar mensaje de éxito y redirigir
        echo '<script>alert("Restaurante registrado exitosamente"); window.location ="registro.php";</script>';
    } catch (PDOException $e) {
        // Si hay algún error, cancelar transacción, mostrar mensaje de error y mensaje del error específico de PDO
        $pdo->rollBack();
        echo '<script>alert("Error al registrar el restaurante: '.$e->getMessage().'"); window.location ="registro.php";</script>';
    }
} else {
    // Si no se ha enviado el formulario, mostrar un mensaje de error
    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="registro.php";</script>';
}
?>
