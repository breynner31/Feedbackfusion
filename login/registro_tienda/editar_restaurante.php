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
    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="editar.php";</script>';
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
        echo '<script>alert("Error: No se pudo obtener el correo electrónico del usuario."); window.location ="editar.php";</script>';
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
            echo '<script>alert("Por favor, selecciona una imagen válida para el restaurante."); window.location ="editar.php";</script>';
            exit; // Detener la ejecución del script
        }

    try {
        // Establecer conexión a la base de datos
        $pdo = new PDO("mysql:host=localhost;dbname=feedbackfusion", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction(); // Comenzar transacción

        // Consulta SQL para obtener el ID del restaurante asociado al usuario actual
        $query_id_restaurante = "SELECT id_restaurante FROM user WHERE email = ?";
        $stmt_id_restaurante = $pdo->prepare($query_id_restaurante);
        $stmt_id_restaurante->execute([$email_usuario]);
        $id_restaurante = $stmt_id_restaurante->fetchColumn();

        // Verificar si se encontró el ID del restaurante asociado al usuario
        if (!$id_restaurante) {
            echo '<script>alert("Error: No se encontró un restaurante asociado al usuario."); window.location ="editar.php";</script>';
            exit;
        }

        // Preparar la consulta SQL para actualizar la información del restaurante
        $query_actualizar_restaurante = "UPDATE restaurante SET nombre_restaurante = :nombre, direccion = :direccion, telefono = :telefono, descripcion = :descripcion, foto = :foto WHERE id_restaurante = :id_restaurante";
        $stmt_actualizar_restaurante = $pdo->prepare($query_actualizar_restaurante);
        $stmt_actualizar_restaurante->bindValue(':nombre', $nombre_restaurante);
        $stmt_actualizar_restaurante->bindValue(':direccion', $direccion);
        $stmt_actualizar_restaurante->bindValue(':telefono', $telefono);
        $stmt_actualizar_restaurante->bindValue(':descripcion', $descripcion);
        $stmt_actualizar_restaurante->bindValue(':foto', $foto_binaria, PDO::PARAM_LOB);
        $stmt_actualizar_restaurante->bindValue(':id_restaurante', $id_restaurante);
        $stmt_actualizar_restaurante->execute();

        // Confirmar transacción
        $pdo->commit();

        // Si todo sale bien, mostrar mensaje de éxito y redirigir
        echo '<script>alert("Información del restaurante actualizada exitosamente"); window.location ="editar.php";</script>';
    } catch (PDOException $e) {
        // Si hay algún error, cancelar transacción, mostrar mensaje de error y mensaje del error específico de PDO
        $pdo->rollBack();
        echo '<script>alert("Error al actualizar la información del restaurante: '.$e->getMessage().'"); window.location ="editar.php";</script>';
    }
} else {
    // Si no se ha enviado el formulario, mostrar un mensaje de error
    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="registro.php";</script>';
}
?>