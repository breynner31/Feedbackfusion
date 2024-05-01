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
    <title>Polvora</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <div class="container">
        <h1>Editar informacion del restaurante</h1>
        <form action="editar_restaurante.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre del Restaurante:</label>
                <input type="text" id="nombre" name="nombre_restaurante" placeholder="Actualiza el nombre del restaurante">
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" placeholder="Actualiza la ubicacion del restaurante">
            </div>
            
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono"  placeholder="Actualiza el numero telefonico"> 
           
            </div>

       
            
            <div class="form-group">
                <label for="foto">Foto </label>
                <small>Actualizar el logo del restaurante </small><br>
                <input type="file" id="foto" name="foto" >
            </div>
            
            <div class="form-group">
                <label for="descripcion"> Actualizar la descripción del restaurante:</label><br>
                <textarea id="descripcion" name="descripcion" rows="6" cols="65" placeholder="Actualice la descripcion del restaurante"></textarea><br>
                <!-- Podrías agregar más campos de formulario aquí según tus necesidades -->
            </div>
            
            <div class="form-group">
                <input type="submit" value="Actualizar">
            

                
            </div>
        </form>
    </div>
</body>


</html>
