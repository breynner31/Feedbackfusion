<?php

include_once("database.php");
include_once("controlador/controlador_registrar_usuario.php");
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBackFusion</title>
    <link rel="stylesheet" href="sign-up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="contenedor">
        <form action="" method="POST">
            <div class="formulario">
                <div class="title-one"><h1>Registrarse</h1></div>
                <div class="campo">
                    <label for="nombre">Nombre: <i class="fa fa-user"></i></label>
                    <input type="text" id="nombre" name="name" class="input-text" placeholder="Ingrese su nombre">
                </div>
                <div class="campo">
                    <label for="email">Email: <i class="fa fa-envelope"></i></label>
                    <input type="email" id="email" name="email" class="input-text" placeholder="Ingrese su email">
                </div>
                <div class="campo">
                    <label for="password">Contraseña: <i class="fa fa-unlock"></i></label>
                    <input type="password" id="password" name="password" class="input-text" placeholder="Ingrese su contraseña">
                </div>
                <div class="campo">
                    <label for="fecha_registro">Fecha de registro: <i class="fa fa-calendar"></i></label>
                    <input type="date" id="fecha_registro" name="fecha_registro" class="input-text">
                </div>
                <input type="submit" class="boton" value="Sign up" name="sign-up">

                <div class="title-two"><p>Ya tienes una cuenta, <a href="login.php" id="link">Inicia sesion</a></p></div>
                <div class="title-two"><p><a href="../reviews/index-copy.php" id="link">Inicio   <i class="fa fa-home"></i></a></p></div>
            </div>
        </form>
    </div>
</body>
</html>
