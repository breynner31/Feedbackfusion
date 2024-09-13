<?php
session_start();
include_once('user.php');
include_once('user_session.php');
if (!isset($_SESSION['email'])) {
	echo "Error: La sesión no se ha iniciado correctamente.";
	exit;
}

// Deshabilitar el almacenamiento en caché
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado

// Establecer el número de elementos por página
$elementosPorPagina = 6;

// Determinar la página actual
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el inicio de la selección
$inicio = ($paginaActual - 1) * $elementosPorPagina;
?>




<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>feedbackfusion</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="../reviews/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="../reviews/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="../reviews/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="../reviews/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="../reviews/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="../reviews/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="../reviews/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="../reviews/assets/css/responsive.css">
	<!-- ver mas -->
	<link rel="stylesheet" href="ver_mas.css">

</head>

<body>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<!-- <div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div> -->
						<!-- logo -->

						<!-- menu start -->
						<!-- <nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
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
										<li><a href="cart.html">Cart</a></li>
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
								<li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li>
								<li>
									 <div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div> -->
								<!-- </li>
							</ul>
						</nav> -->
						<!-- <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div> -->
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
						</div> -->
	<!-- </div>
				</div>
			</div>
		</div>
	</div>  -->
	<!-- end search arewa -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Restaurantes</p>
						<h1>Bienvenidos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">

			<div class="row">

				<?php
				include_once("database.php");

				$database = new Database();
				$conn = $database->connect();

				try {
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; // Página actual, por defecto 1
					$elementosPorPagina = 9; // Número de elementos por página

					// Calcular el inicio para la consulta LIMIT
					$inicio = ($paginaActual - 1) * $elementosPorPagina;

					// Consulta para obtener los restaurantes paginados
					$sql = "SELECT * FROM restaurante LIMIT $inicio, $elementosPorPagina";
					$stmt = $conn->prepare($sql);
					$stmt->execute();

					if ($stmt->rowCount() > 0) {
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<div class='col-lg-4 col-md-6'>";
							echo "<div class='single-latest-news'>";
							echo "<div class='restaurant-info'>";
							echo "<a href='descripcion_restaurante_sesion.php?id=" . $row['id_restaurante'] . "'>";
							$imagen_base64 = base64_encode($row["foto"]);
							echo "<img src='data:image/jpeg;base64," . $imagen_base64 . "' style='width:100%; height:auto;'><br>";
							echo "<h3><a href='descripcion_restaurante_sesion.php?id=" . $row['id_restaurante'] . "'>" . $row["nombre_restaurante"] . "</a></h3>";
							echo "</a>";
							echo "<div class='rating'>";
							echo "<div class='rating-stars-container'>";

							// Consulta para obtener la puntuación promedio del restaurante
							$sql_puntuacion = "SELECT AVG(CAST(puntuacion AS UNSIGNED)) AS promedio_puntuacion FROM commits WHERE id_restaurante = ?";
							$stmt_puntuacion = $conn->prepare($sql_puntuacion);
							$stmt_puntuacion->execute([$row['id_restaurante']]);
							$promedioPuntuacion = round($stmt_puntuacion->fetch(PDO::FETCH_ASSOC)['promedio_puntuacion']);

							// Mostrar estrellas llenas y vacías según la puntuación promedio
							for ($i = 1; $i <= 5; $i++) {
								if ($i <= $promedioPuntuacion) {
									echo "<span class='fa fa-star checked'></span>";
								} else {
									echo "<span class='fa fa-star'></span>";
								}
							}

							echo "</div>";
							echo "</div>"; // Cierre de rating
							echo "<p>Dirección: " . $row["direccion"] . "</p>";
							echo "<p>Teléfono: " . $row["telefono"] . "</p>";
							echo "<p>Descripción: " . $row["descripcion"] . "</p>";
							echo "</div>"; // Cierre de restaurant-info
							echo "</div>"; // Cierre de single-latest-news
							echo "</div>"; // Cierre de col-lg-4 col-md-6
						}
					} else {
						echo "No se encontraron restaurantes";
					}

					// Calcular el número total de páginas
					$sql_total = "SELECT COUNT(*) AS total FROM restaurante";
					$stmt_total = $conn->prepare($sql_total);
					$stmt_total->execute();
					$totalResultados = $stmt_total->fetch(PDO::FETCH_ASSOC)['total'];
					$totalPaginas = ceil($totalResultados / $elementosPorPagina);

					// Mostrar los enlaces de paginación
					echo "<div class='col-lg-12 text-center'>";
					echo "<div class='pagination-wrap'>";
					echo "<ul>";

					if ($paginaActual > 1) {
						echo "<li><a href='?pagina=" . ($paginaActual - 1) . "'>Prev</a></li>";
					}

					for ($i = 1; $i <= $totalPaginas; $i++) {
						echo "<li><a " . ($paginaActual == $i ? "class='active'" : "") . " href='?pagina=$i'>$i</a></li>";
					}

					if ($paginaActual < $totalPaginas) {
						echo "<li><a href='?pagina=" . ($paginaActual + 1) . "'>Next</a></li>";
					}

					echo "</ul>";
					echo "</div>";
					echo "</div>";
				} catch (PDOException $e) {
					echo "Error de conexión: " . $e->getMessage();
				}

				$conn = null;
				?>
			</div>

		</div>
	</div>
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
	<script src="../reviews/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="../reviews/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="../reviews/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="../reviews/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="../reviews/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="../reviews/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="../reviews/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="../reviews/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="../reviews/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="../reviews/assets/js/main.js"></script>

</body>

</html>