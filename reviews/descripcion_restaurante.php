<?php
include_once("../login/database.php");
// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">


	<title>Reviews</title>

</head>
<body onload="initMap()">



    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>

	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<!-- <div class="site-logo">
							<a href="index.html">
								<img src="img/logo.png" alt="">
							</a>
						</div> -->
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu"> 
							<ul>
								<!-- <li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul>
								</li>
								<li><a href="about.html">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="../login/login.php">LOGIN</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li>
								<li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li> -->
								<!-- <li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li> -->
								<li>

									
									<div class="header-icons">
										<a class="shopping-cart" href="../login/">INICIAR SESIÓN <i class="fa fa-user"></i></a>

										<!-- <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
									</div>
								</li>
							</ul>
						</nav> 
						<!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a> -->
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">RestRanking</p>
							<h1>Clasifica el restaurante </h1>
							<!-- <div class="hero-btns">
								<a href="shop.html" class="boxed-btn">Fruit Collection</a>
								<a href="contact.html" class="bordered-btn">Contact Us</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
	<section class="cart-banner pt-100 pb-100">
    	<div class="container">
        	<div class="row clearfix">
            	<!--Image Column-->
            	<div class="image-column col-lg-6">
                	<div class="image">
                        <div class="row">
						<?php
							// Verificar si se ha proporcionado un ID de restaurante en la URL
							if (isset($_GET['id'])) {
								// Obtener el ID del restaurante desde la URL
								$restaurante_id = $_GET['id'];

								// Conectar a la base de datos
								include_once("../login/database.php");
								$database = new Database();
								$conn = $database->connect();

								try {
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

									// Consultar la información del restaurante con el ID proporcionado
									$sql = "SELECT * FROM restaurante WHERE id_restaurante = ?";
									$stmt = $conn->prepare($sql);
									$stmt->execute([$restaurante_id]);

									// Verificar si se encontró un restaurante con el ID proporcionado
									if ($stmt->rowCount() > 0) {
										// Mostrar la información del restaurante
										$row = $stmt->fetch(PDO::FETCH_ASSOC);
										echo "<div class='restaurant-container'>";
										echo "<div class='restaurant-image'>";
										echo "<img src='data:image/jpeg;base64, " . base64_encode($row["foto"]) . "'' style='width:80%; height:auto;' alt='Imagen del Restaurante'><br>";
										echo "</div>"; // Cierre de restaurant-image
										
										echo "</div>"; // Cierre de restaurant-container
									} else {
										echo "No se encontró el restaurante.";
									}
								} catch (PDOException $e) {
									echo "Error de conexión: " . $e->getMessage();
								}

								// Cerrar la conexión a la base de datos
								$conn = null;
							} else {
								// Si no se proporcionó un ID de restaurante en la URL, mostrar un mensaje de error
								echo "No se proporcionó un ID de restaurante.";
							}
							?>

							<style>

.titulo h3 {
  font-size: 2rem;
  font-weight: 700;
  line-height: 2.25rem;
  color: #051922;
  text-align: center;

}

.score h6 {
  font-size: 2rem;
  font-weight: 700;
  line-height: 2.25rem;
  color: #051922;
  text-align: center;
}

.content h6 {
  font-size: 1rem;
  font-weight: 700;
  line-height: 1.5rem;
  margin: 0 0 1.25rem 0;
  color: #051922;
  text-align: center;
}	

.rating {

  text-align: center;
  margin-bottom: 5px; /* Reducir el espacio entre el conjunto de estrellas y el siguiente párrafo */
  display: flex;
  justify-content: center; /* Alinear las estrellas al centro */
}

.rating .fa-star {
  margin-top: 20px;
  font-size: 16px; /* Tamaño de las estrellas */
  color: #fff; /* Color interior de las estrellas */
  -webkit-text-stroke: 1px #000; /* Borde negro de las estrellas */
  margin-right: 5px; /* Espacio entre las estrellas */
  margin-bottom: 20px;
 
}

.rating .fa-star.checked {
  color: #ffd700; /* Color de las estrellas seleccionadas */
}

.rating-stars-container {
	margin-top: -65px;
  overflow-x: auto; /* Habilitar desplazamiento horizontal cuando el contenido excede el ancho del contenedor */
}

.rating > span {
  display: inline-block;
  position: relative;
  margin-right: 20px; /* Ajusta el espacio entre las estrellas */
  font-size: 16px; /* Reduce el tamaño de la fuente de las estrellas */
}

.rating > span:before {
  content: "\2605";
  position: absolute;
}
							</style>

			</div>
		</div>   
 	</div>
                <div class="content-column col-lg-6">
				<?php
	// Verificar si se ha proporcionado un ID de restaurante en la URL
	if (isset($_GET['id'])) {
		// Obtener el ID del restaurante desde la URL
		$restaurante_id = $_GET['id'];

    // Conectar a la base de datos
    include_once("../login/database.php");
    $database = new Database();
    $conn = $database->connect();

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consultar la información del restaurante con el ID proporcionado
        $sql = "SELECT * FROM restaurante WHERE id_restaurante = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$restaurante_id]);

        // Verificar si se encontró un restaurante con el ID proporcionado
        if ($stmt->rowCount() > 0) {
            // Mostrar la información del restaurante
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo "<img src='data:image/jpeg;base64," . base64_encode($row["foto"]) . "' style='width:100%; height:auto;'><br>";
             echo "<h1 class='text-h1'>" . $row["nombre_restaurante"] . "</h1>";
            // echo "<p>Dirección: " . $row["direccion"] . "</p>";
            // echo "<p>Teléfono: " . $row["telefono"] . "</p>";
            // echo "<p>Descripción: " . $row["descripcion"] . "</p>";
            // // Puedes mostrar la imagen del restaurante si es necesario
        } else {
            echo "No se encontró el restaurante.";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

			// Cerrar la conexión a la base de datos
			$conn = null;
		} else {
			// Si no se proporcionó un ID de restaurante en la URL, mostrar un mensaje de error
			echo "No se proporcionó un ID de restaurante.";
		}
		?>
                    <div class="text">
					<?php
	// Verificar si se ha proporcionado un ID de restaurante en la URL
	if (isset($_GET['id'])) {
		// Obtener el ID del restaurante desde la URL
		$restaurante_id = $_GET['id'];

    // Conectar a la base de datos
    include_once("../login/database.php");
    $database = new Database();
    $conn = $database->connect();

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consultar la información del restaurante con el ID proporcionado
        $sql = "SELECT * FROM restaurante WHERE id_restaurante = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$restaurante_id]);

        // Verificar si se encontró un restaurante con el ID proporcionado
        if ($stmt->rowCount() > 0) {
            // Mostrar la información del restaurante
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //echo "<img src='data:image/jpeg;base64," . base64_encode($row["foto"]) . "' style='width:100%; height:auto;'><br>";
            // echo "<h1>" . $row["nombre_restaurante"] . "</h1>";
             echo "<p class='text'>Dirección: " . $row["direccion"] . " ></p>";
             echo "<p class='text'>Teléfono: " . $row["telefono"] . "</p>";
			 echo "<p class='text'>Descripcion: " . $row['descripcion'] . "</p>";

        } else {
            echo "No se encontró el restaurante.";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }

			// Cerrar la conexión a la base de datos
			$conn = null;
		} else {
			// Si no se proporcionó un ID de restaurante en la URL, mostrar un mensaje de error
			echo "No se proporcionó un ID de restaurante.";
		}
		?>

<?php
							// Verificar si se ha proporcionado un ID de restaurante en la URL
							if (isset($_GET['id'])) {
								// Obtener el ID del restaurante desde la URL
								$restaurante_id = $_GET['id'];

								// Conectar a la base de datos
								include_once("../login/database.php");
								$database = new Database();
								$conn = $database->connect();

								try {
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

									// Consultar la información del restaurante con el ID proporcionado
									$sql = "SELECT * FROM restaurante WHERE id_restaurante = ?";
									$stmt = $conn->prepare($sql);
									$stmt->execute([$restaurante_id]);

									// Verificar si se encontró un restaurante con el ID proporcionado
									if ($stmt->rowCount() > 0) {
										// Mostrar la información del restaurante
										$row = $stmt->fetch(PDO::FETCH_ASSOC);

										echo "<h3 class='h3'>Rating";
										echo "</div>";
										echo "<div class='rating'>";
										echo "<div class='rating-stars-container'>";

										$sql_puntuacion = "SELECT AVG(CAST(puntuacion AS UNSIGNED)) AS promedio_puntuacion FROM commits WHERE id_restaurante = ?";
										$stmt_puntuacion = $conn->prepare($sql_puntuacion);
										$stmt_puntuacion->execute([$restaurante_id]);
										$row_puntuacion = $stmt_puntuacion->fetch(PDO::FETCH_ASSOC);
										$promedioPuntuacion = round($row_puntuacion['promedio_puntuacion']);

										// Mostrar estrellas llenas y vacías según la puntuación
										for ($i = 1; $i <= 5; $i++) {
											if ($i <= $promedioPuntuacion) {
												echo "<span class='fa fa-star checked'></span>";
											} else {
												echo "<span class='fa fa-star'></span>";
											}
										}

										echo "</div>";
										echo "</div>"; // Cierre de rating
										echo "<div class='score'>";
										echo "<h6>{$promedioPuntuacion}</h6>";
										echo "</div>";
										echo "</div>"; // Cierre de restaurant-container
									} else {
										echo "No se encontró el restaurante.";
									}
								} catch (PDOException $e) {
									echo "Error de conexión: " . $e->getMessage();
								}

								// Cerrar la conexión a la base de datos
								$conn = null;
							} else {
								// Si no se proporcionó un ID de restaurante en la URL, mostrar un mensaje de error
								echo "No se proporcionó un ID de restaurante.";
							}
							?>

<div class='titulo'>

<div style="position: relative; top:100px">
<div id="map" style="width: 90rem; height: 550px;   box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); margin-bottom: 30px;"></div>

</div>

					<?php
					// Verificar si se ha proporcionado un ID de restaurante en la URL
					if (isset($_GET['id'])) {
						// Obtener el ID del restaurante desde la URL
						$restaurante_id = $_GET['id'];

						// Conectar a la base de datos
						include_once("../login/database.php");
						$database = new Database();
						$conn = $database->connect();

						try {
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							// Consultar las coordenadas del restaurante con el ID proporcionado
							$sql = "SELECT coordenadas FROM restaurante WHERE id_restaurante = ?";
							$stmt = $conn->prepare($sql);
							$stmt->execute([$restaurante_id]);

							// Verificar si se encontró un restaurante con el ID proporcionado
							if ($stmt->rowCount() > 0) {
								// Obtener las coordenadas del resultado de la consulta
								$coordenadas = $stmt->fetch(PDO::FETCH_ASSOC)['coordenadas'];

								// Dividir las coordenadas en latitud y longitud
								$lat_lng = explode(',', $coordenadas);
								$latitud = $lat_lng[0];
								$longitud = $lat_lng[1];

								// Llamar a la función initMap con las coordenadas
								echo "<script>
                    var latitud = $latitud;
                    var longitud = $longitud;
                </script>";
							} else {
								echo "No se encontró el restaurante.";
							}
						} catch (PDOException $e) {
							echo "Error de conexión: " . $e->getMessage();
						}

						// Cerrar la conexión a la base de datos
						$conn = null;
					} else {
						// Si no se proporcionó un ID de restaurante en la URL, mostrar un mensaje de error
						echo "No se proporcionó un ID de restaurante.";
					}
					?>


<div class="content-column col-lg-6">





					
				</div>
			</div>

					</div>
                </div>
            </div>
        </div>
    </section>

	</div>
	<style>
.text {
position: relative;
left: 18px;
}

.text-h1 {
position: relative;
left: 35px;
}


header {

	text-align: center;
	margin-bottom: 20px;
}


.call-to-action {
	font-size: 1.2rem;
	color: #555;
	margin-top: 10px;
}

.call-to-action a {
	color: #007bff;
	text-decoration: none;
	font-weight: bold;
}

.call-to-action a:hover {
	text-decoration: underline;
}

.button-container {
display: flex;
justify-content: center;
}

.button {
display: inline-block;
padding: 10px 20px;
margin: 10px;
text-decoration: none;
color: #fff;
background-color: #F28123;
border-radius: 20px;
transition: background-color 0.3s ease;
}

.button:hover {
background-color: black;
}

h1 {
	font-size: 3.5rem;
	color: #333;
	text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

h2 {
	font-size: 2rem;
	color: #555;
}
</style>

<header>
		<h1>Comentarios de Restaurantes</h1>
		<p class="call-to-action">Para comentar el  restaurante, por favor <a href="../login/sign-up.php"  target="_blank">regístrese</a> en la plataforma.</p>
	</header>

		<div class="button-container">
			<a href="../login/" target="_blank" class="button">Iniciar sesión</a>
			<a href="../login/sign-up.php" target="_blank"  class="button">Registrarse</a>
		</div>



		


		<div class="comentario-section" id="comentarios-section">
			<!-- Aquí se insertarán dinámicamente los comentarios -->
		</div>

		

		<?php
	
		include_once("../login/database.php");
		include_once('../login/user.php');
		include_once('../login/user_session.php');




		$user = new User();

		$nombreUsuario = $user->getNombre(); // Obtener el nombre del usuario
		$idUser = $user->getid_user(); // Obtener el id_user del usuario actual

		// Obtener el id_restaurante del parámetro GET
		$idRestaurante = isset($_GET['id']) ? intval($_GET['id']) : null;

		if (!$idRestaurante) {
			echo "ID de restaurante no especificado.";
			exit;
		}

		$database = new Database();
		$conn = $database->connect();

		
		?>

<style>
    /* Estilos para la sección de comentarios */
    .comentario-section {
        margin-top: 20px;
    }

    /* Estilos para cada comentario individual */
    .comentario {
		position: relative;
		left: 135px;
        background-color: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra ligera */
		width: 90rem;
    }

    /* Estilos para la información del usuario */
    .user-info {
        display: flex;
        align-items: center;
    }

    .user-info .avatar {
        width: 40px;
        height: 40px;
        background-color: #ddd;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-info .details {
        flex: 1;
    }

    .user-info h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }

    .user-info h4 span {
        font-size: 12px;
        font-weight: normal;
        color: #888;
    }

    .user-info p {
        margin-top: 5px;
        font-size: 14px;
    }

    .user-info p:last-child {
        margin-bottom: 0;
    }
</style>

<div class="comentario-section" id="comentarios-section">
    <?php
    // Consulta SQL para obtener los comentarios asociados al restaurante específico
    $stmt = $conn->prepare("SELECT * FROM commits WHERE id_restaurante = :id_restaurante ORDER BY fecha_creacion DESC");
    $stmt->execute([':id_restaurante' => $idRestaurante]);

    // Verificar si hay comentarios para este restaurante
    if ($stmt->rowCount() > 0) {
        // Iterar sobre los resultados y mostrar cada comentario
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nombreUsuario = $row['name'];
            $comentario = $row['comentario'];
            $fechaCreacion = $row['fecha_creacion'];
			$puntuacion = $row['puntuacion'];

            echo '<div class="comentario">';
            echo '<div class="user-info">';
            echo '<div class="avatar"></div>'; // Aquí podrías mostrar un avatar si lo tienes
            echo '<div class="details">';
			echo "<h4>{$nombreUsuario} <span>on {$fechaCreacion}</span> ";
			for ($i = 1; $i <= 5; $i++) {
				if ($i <= $puntuacion) {
					echo '★'; // Estrella llena
				} else {
					echo '☆'; // Estrella vacía
				}
			}
			echo '</h4>'; // Cerrar el encabezado h4
            echo "<p>{$comentario}</p>";
            echo '</div>'; // .details
            echo '</div>'; // .user-info
            echo '</div>'; // .comentario
        }
    } else {
        echo '<p>No hay comentarios para este restaurante aún.</p>';
    }
    ?>

</div>

	

	<!-- end testimonail-section -->
	
	<!-- advertisement section -->


	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Sobre Nosotros</h2>
						<p>En feedbackfusion, nos dedicamos a la promoción y valorización de la cadena productiva de la gastronomía, que abarca desde la producción y 
							transformación de los alimentos hasta la oferta gastronómica formal y los establecimientos relacionados. </p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
				<h2 class="widget-title">Unate con nosotros</h2>
				<p>Te invitamos a unirte a nosotros en este proyecto y a redescubrir Cúcuta a través de sus restaurante
				. Ya seas un turista en busca de nuevas experiencias o un residente local deseoso de redescubrir su ciudad, 
				en feedbackfusion  encontrarás una guía confiable y apasionada por la excelencia gastronómica.</p>
				</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
						<h2 class="widget-title">Contacto</h2>
						<ul>
							<li>Breynner Jose Sierra Arias</li>
							<li>breinnersierra879@gmail.com</li>
							<li>+57 3132852740</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
						<h2 class="widget-title">Contacto</h2>
						<ul>
							<li>Diego Enrique Niño Rodriguez</li>
							<li>est_de_nino@fesc.edu.co</li>
							<li>+57 315 5278542</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
			<div class="container">
				<div class="row">
					<!-- <div class="col-lg-6 col-md-12">
						<p>Copyrights &copy; 2024 - <a href="https://imransdesign.com/">El veneco</a>, All Rights Reserved.<br>
							Distributed By - <a href="https://themewagon.com/">Petro</a>
						</p>
					</div> -->
					<div class="col-lg-6 text-right col-md-12">
						<div class="social-icons">
							<ul>
								<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
								<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	<script src="../login/mostrar_mapa.js"></script>

</body>
</html>