<?php
session_start();
include("../database.php");
include_once('../user.php');
include_once('../user_session.php');

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

if (!isset($_SESSION['email'])) {
    echo "Error: La sesión no se ha iniciado correctamente.";
    exit;
}

$email_usuario = $_SESSION['email'];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
} else {

    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="registro.php";</script>';
    exit; 
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre_restaurante = isset($_POST['nombre_restaurante']) ? $_POST['nombre_restaurante'] : '';
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $coordenadas = isset($_POST['coordenadas']) ? $_POST['coordenadas'] : '';


    $email_usuario = $_SESSION['email']; 


    if (!$email_usuario) {
        echo '<script>alert("Error: No se pudo obtener el correo electrónico del usuario."); window.location ="registro.php";</script>';
        exit;
    }


    $foto_name = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];


    if (!empty($foto_tmp) && is_uploaded_file($foto_tmp)) {
        $imagen_info = getimagesize($foto_tmp);
        $ancho = $imagen_info[0];
        $alto = $imagen_info[1];
        
        $dimensiones_permitidas = array("ancho" => 1199, "alto" => 1153);

        if ($ancho != $dimensiones_permitidas["ancho"] || $alto != $dimensiones_permitidas["alto"]) {
            echo '<script>alert("La imagen debe tener dimensiones exactas de 1119x1153."); window.location ="registro.php";</script>';
            exit;
        }
      
        $foto_binaria = file_get_contents($foto_tmp);
   
    } else {
      
        echo '<script>alert("Por favor, selecciona una imagen válida para el restaurante."); window.location ="registro.php";</script>';
    }

    try {
      
        $pdo = new PDO("mysql:host=localhost;dbname=feedbackfusion", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction(); // Comenzar transacción

        // Preparar la consulta SQL para insertar el restaurante
        $query_restaurante = "INSERT INTO restaurante (nombre_restaurante, direccion, telefono, descripcion, foto, coordenadas) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_restaurante = $pdo->prepare($query_restaurante);
        $stmt_restaurante->bindParam(1, $nombre_restaurante);
        $stmt_restaurante->bindParam(2, $direccion);
        $stmt_restaurante->bindParam(3, $telefono);
        $stmt_restaurante->bindParam(4, $descripcion);
        $stmt_restaurante->bindParam(5, $foto_binaria, PDO::PARAM_LOB);
        $stmt_restaurante->bindParam(6, $coordenadas);
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

    echo '<script>alert("No se ha enviado el formulario correctamente."); window.location ="registro.php";</script>';
}
?>
