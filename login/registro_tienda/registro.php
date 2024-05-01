<?php
session_start();
include_once('../user.php');
include_once('../user_session.php');

// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Restaurante</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Restaurante</h1>
        <form action="registro_restaurante.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Restaurante:</label>
                <input type="text" id="nombre" name="nombre_restaurante" required placeholder="EL nombre del restaurante">
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required placeholder="Agregue la direccion del restaunrante que esta ubicado">
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono"  placeholder="Formato: 10 dígitos numéricos"> 
           
            </div>

       
            
            <div class="form-group">
                <label for="foto">Foto </label>
                <small>Agregar el logo del restaurante </small><br>
                <input type="file" id="foto" name="foto" required >
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción del restaurante:</label><br>
                <textarea id="descripcion" name="descripcion" rows="6" cols="65" required placeholder="Comente pacificamente sobre el restaurante y hazlo saber  todo el mundo lo q contiene."></textarea><br>
                <!-- Podrías agregar más campos de formulario aquí según tus necesidades -->
            </div>
            
            <div class="form-group">
                <input type="submit" value="Registrar">
            

                
            </div>
        </form>
    </div>
</body>


</html>
