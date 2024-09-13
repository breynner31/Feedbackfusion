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
	<link rel="stylesheet" href="assets/css/index.css">


	<title>Reviews</title>

</head>

<body >



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
								<li class="current-list-item"><a href="#">Home</a>
									<!-- <ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul> -->
								</li>
								
								<li><a href="#restaurante-destacado">Restaurantes Destacados</a>
									<!-- <ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul> -->
								</li>
								<li><a href="#restaurantes">Restaurantes</a></li>
								<!-- <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="../login/login.php">LOGIN</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li> -->

								<li><a href="#sobre-nosotros">Sobre Nosotros</a></li>
								<!-- <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="../login/login.php">LOGIN</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li> -->
								<!-- <li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li> -->
								<li>


									<div class="header-icons">
										<a class="shopping-cart" href="../login/">Iniciar Sesion <i class="fa fa-user"></i></a>

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
	<!-- end header -->

	<!-- search area -->
	<!-- <div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- end search area -->

	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">FeedBackFusion</p>
							<h1>Descubre, evalúa y disfruta: Tu guía completa de restaurantes</h1>
							<!-- <div class="hero-btns">
								<a href="shop.html" class="boxed-btn">About us</a>
								<a href="contact.html" class="bordered-btn">Contact Us</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Publica tu restaurante</h3>
							<p>Hazlo saber a toda la comunidad sobre tu restaurante.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Soporte</h3>
							<p>Comunicate con nosotros <br>+57 3132852740</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Nuevos restaurantes</h3>
							<p>No te  pierdas de nuestra gastronomia cucuteña. </p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title" id="restaurante-destacado">
						<h3> Restaurantes <span class="orange-text">Destacados</span></h3>
						<p>Aqui puedes encontrar todo tipo de restaurantes del mas calificado al menor calificado.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
				// Incluir archivos necesarios y establecer la conexión a la base de datos
				include_once("../login/database.php");
				try {
					$database = new Database();
					$conn = $database->connect();

					// Consulta SQL para obtener los 3 restaurantes con mayor puntuación
					$sql = "
            SELECT r.id_restaurante, r.nombre_restaurante, r.direccion, r.telefono, r.descripcion, r.foto, AVG(CAST(c.puntuacion AS UNSIGNED)) as promedio_puntuacion
            FROM restaurante r
            JOIN commits c ON r.id_restaurante = c.id_restaurante
            GROUP BY r.id_restaurante
            ORDER BY promedio_puntuacion DESC
            LIMIT 3
        ";

					$stmt = $conn->prepare($sql);
					$stmt->execute();

					// Verificar si hay resultados
					if ($stmt->rowCount() > 0) {
						echo "<div class='row'>";

						// Iterar sobre los resultados y mostrar cada restaurante
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							$idRestaurante = $row['id_restaurante'];
							$nombreRestaurante = $row['nombre_restaurante'];
							$direccion = $row['direccion'];
							$telefono = $row['telefono'];
							$descripcion = $row['descripcion'];
							$foto = $row['foto'];
							$promedioPuntuacion = round($row['promedio_puntuacion']); // Redondear la puntuación al entero más cercano

							echo "<div class='col-lg-4 col-md-6'>";
							echo "<div class='single-latest-news'>";
							echo "<div class='restaurant-info'>";
							echo "<img src='data:image/jpeg;base64," . base64_encode($foto) . "' style='width:100%; height:auto;' alt='Imagen del Restaurante'><br>";
							echo "<h3><a href='descripcion_restaurante.php?id=" . $row['id_restaurante'] . "'>" . $row["nombre_restaurante"] . "</a></h3>";
							echo "<div class='rating'>";
							echo "<div class='rating-stars-container'>";

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
							echo "<p><strong>Dirección:</strong> {$direccion}</p>";
							echo "<p><strong>Teléfono:</strong> {$telefono}</p>";
							echo "<p class='descripcion'><strong>Descripción:</strong> {$descripcion}</p>";
							echo "</div>"; // Cierre de restaurant-info
							echo "<a href='descripcion_restaurante.php?id=" . $row['id_restaurante']  . "' class='ver-mas-btn' >" . "</  >Ver Más</a>";
							echo "</div>"; // Cierre de single-latest-news
							echo "</div>"; // Cierre de col-lg-4
						}

						echo "</div>"; // Cierre de row
					} else {
						echo "<p>No hay restaurantes para mostrar.</p>";
					}
				} catch (PDOException $e) {
					echo "Error al conectar con la base de datos: " . $e->getMessage();
				}
				?>
			</div>
		</div>
		<!-- end product section -->

		<!-- cart banner section -->
		<section class="cart-banner pt-100 pb-100">
			<div class="container">
				<div class="row clearfix">
					<!--Image Column-->
					<div class="image-column col-lg-6">
						<div class="image">
							<!-- <div class="price-box">
								<div class="inner-price">
									<span class="price">
										<strong>30%</strong> <br> off per kg
									</span>
								</div>
							</div> -->
							<img src="assets/img/a.jpg" alt="">
						</div>
					</div>
					<!--Content Column-->
					<div class="content-column col-lg-6">
						<h3><span class="orange-text">Registrate </span> o inicia sesion </h3>
						<!-- <h4>Hikan Strwaberry</h4> -->
						<div class="text">Tu opinión cuenta. Regístrate o inicia sesión para compartir tus experiencias y contribuir a la comunidad gastronómica. ¡Tu voz hace la diferencia en la calidad y reputación de los restaurantes! </div>
						<!--Countdown Timer-->
						<!-- <div class="time-counter"><div class="time-countdown clearfix" data-countdown="2020/2/01"><div class="counter-column"><div class="inner"><span class="count">00</span>Days</div></div> <div class="counter-column"><div class="inner"><span class="count">00</span>Hours</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Mins</div></div>  <div class="counter-column"><div class="inner"><span class="count">00</span>Secs</div></div></div></div> -->
						<a href="../login/login.php" class="cart-btn mt-3"><i class="fas fa-sign-in-alt"></i>Inicia sesion</a>
						<a href="../login/sign-up.php" class="cart-btn mt-3"><i class="fas fa-user-plus"></i>Registrate</a>
					</div>
				</div>
			</div>
		</section>
		<!-- end cart banner section -->

		<!-- testimonail-section -->
		<div class="testimonail-section mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1 text-center">
						<div class="testimonial-sliders">
							<div class="single-testimonial-slider">
								<div class="client-avater">
									<img src="assets/img/avaters/diego2.png" alt="">
								</div>
								<div class="client-meta">
									<h3>Diego Enrique Niño Rodriguez <span>develop</span></h3>
									<p class="testimonial-body">
										" Tiene experiencia en desarrollo web frontend y backend con HTML, 
CSS, JavaScript y PHP, y manejo de bases de datos SQL. Es una 
persona responsable, organizada y con capacidad de trabajar en 
equipo. Le apasiona la tecnología y está en constante aprendizaje de 
nuevas herramientas y metodologías. 
Programador con capacidad de aprendizaje continuo y disposición para 
trabajar en equipo y aportar conocimientos y habilidades en proyectos 
tecnológicos. "
									</p>
									<div class="last-icon">
										<i class="fas fa-quote-right"></i>
									</div>
								</div>
							</div>
							<div class="single-testimonial-slider">
								<div class="client-avater">
									<img src="assets/img/avaters/brey2.png" alt="">
								</div>
								<div class="client-meta">
									<h3> Breynner Jose Sierra Arias <span>develop</span></h3>
									<p class="testimonial-body">
										" siempre manteniendo una actitud positiva con habilidades para realizar pruebas y mejoras en el rendimiento de actualizaciones software y desarrollo de nuevas funcionalidades. Me agrada solucionar los problemas y orientar a mis compañeros de trabajo. 
										PHP (Composer, Pdo, Poo), JavaScript, HTML/CSS(Bootstrap), SQL, GIT, manejo de API."
									</p>
									<div class="last-icon">
										<i class="fas fa-quote-right"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end testimonail-section -->

		<!-- advertisement section -->
	
		<!-- end advertisement section -->

		<!-- shop banner -->
		<!-- <section class="shop-banner">
			<div class="container">
				<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
				<div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
				<a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
			</div>
		</section> -->
		<!-- end shop banner -->

		<!-- latest news -->
		<div class="latest-news pt-150 pb-150">
			<div class="container">

				<div class="container">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="section-title" id="restaurantes">
								<h3><span class="orange-text"></span>Restaurantes</h3>
								<p>Descubre los restaurantes más destacados según las valoraciones y opiniones de nuestra comunidad</p>
							</div>
						</div>
					</div>

					<div class="row">

						<?php
						include_once("../login/database.php");

						$database = new Database();
						$conn = $database->connect();

						try {
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

							// Consulta SQL para obtener 3 restaurantes al azar
							$sql = "
								SELECT r.id_restaurante, r.nombre_restaurante, r.direccion, r.telefono, r.descripcion, r.foto,
									   AVG(CAST(c.puntuacion AS UNSIGNED)) AS promedio_puntuacion
								FROM restaurante r
								LEFT JOIN commits c ON r.id_restaurante = c.id_restaurante
								GROUP BY r.id_restaurante
								ORDER BY RAND()
								LIMIT 3
							";

							$stmt = $conn->prepare($sql);
							$stmt->execute();

							if ($stmt->rowCount() > 0) {
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									echo "<div class='col-lg-4 col-md-6'>";
									echo "<div class='single-latest-news'>";
									echo "<div class='restaurant-info'>";
									echo "<a href='descripcion_restaurante.php?id=" . $row['id_restaurante'] . "'>";
									$imagen_base64 = base64_encode($row["foto"]);
									echo "<img src='data:image/jpeg;base64," . $imagen_base64 . "' style='width:100%; height:auto;'><br>";
									echo "<h3><a href='descripcion_restaurante.php?id=" . $row['id_restaurante'] . "'>" . $row["nombre_restaurante"] . "</a></h3>";
									echo "</a>";
									echo "<div class='rating'>";
									echo "<div class='rating-stars-container'>";

									// Calcular número de estrellas llenas y vacías
									$promedioPuntuacion = round($row['promedio_puntuacion']); // Redondear el promedio de puntuación
									for ($i = 1; $i <= 5; $i++) {
										if ($i <= $promedioPuntuacion) {
											echo "<span class='fa fa-star checked'></span>";
										} else {
											echo "<span class='fa fa-star'></span>";
										}
									}

									echo "</div>";
									echo "</div>"; // Cierre de rating
									echo "</div>"; // Cierre de restaurant-info
									echo "</div>"; // Cierre de single-latest-news
									echo "</div>"; // Cierre de col-lg-4 col-md-6
								}
							} else {
								echo "No se encontraron resultados";
							}
						} catch (PDOException $e) {
							echo "Error de conexión: " . $e->getMessage();
						}

						$conn = null;
						?>
					</div>

				</div>
				<div class="row">
					<div class="col-lg-12 text-center">
					<a href="ver_mas_restaurante.php" class="boxed-btn">Mas restaurantes</a>
					</div>
				</div>
			</div>
		</div>
		<!-- end latest news -->

		<!-- footer -->
		<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget" id="sobre-nosotros">
						<h2 class="widget-title" >Sobre Nosotros</h2>
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
		<!-- end footer -->

		<!-- copyright -->
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
		<!-- index js -->
		<script src="assets/js/index.js"></script>

</body>

</html>