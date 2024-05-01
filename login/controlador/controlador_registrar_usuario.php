<?php

include_once("database.php");

$database = new Database();

$conn = $database->connect();

if(!empty($_POST["sign-up"])){
    if(empty($_POST["name"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["fecha_registro"]) ) {
        echo "<script>alert('Uno de los campos está vacío');</script>";
    } else {
        $id_rol = 2;
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST['password'];
        $fecha_registro = $_POST["fecha_registro"];
    ;
        
        // Preparar la consulta con un marcador de posición
        $sql = "INSERT INTO user (id_rol, name, email, password, registration_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Vincular los valores a los marcadores de posición y ejecutar la consulta
        $stmt->execute([$id_rol, $name, $email, $password, $fecha_registro]);
        
        echo "<script>alert('Usuario registrado con éxito');</script>";
    }
}
?>
