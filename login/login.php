

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedbackFusion</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="contenedor">
        <form action="" method="POST">
            
            <div class="formulario">
                <div class="title-one"><h1>Iniciar sesión <i class="fa fa-user"></i></h1></div>
                <div class="campo">
                    <label for="email">Email: <i class="fa fa-envelope"></i></label>
                    <input type="email" id="email" name="email" class="input-text" placeholder="Ingrese su email">
                </div>
                <div class="campo">
                    <label for="password">Contraseña: <i class="fa fa-unlock"></i></label>
                    <input type="password" id="password" name="password" class="input-text" placeholder="Ingrese su contraseña" autocomplete="current-password">
                </div>
                <a href="index.php"> <input type="submit" class="boton" value="Sign in" name="sign-in"> </a>

                <div class="title-two"><p>No tienes una cuenta, <a href="sign-up.php" id="link">registrate <i class="fa fa-arrow-right"></i></a></p></div>
                <div class="title-two"><p> <a href="../reviews/index.html" id="link">Inicio  <i class="fa fa-home"></i></a></p></div>
                
            </div>
        </form>
    </div>
</body>
</html>
