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
	<!-- perfil -->
	<link rel="stylesheet" href="perfil.css">

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
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logo.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->

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
			<div class="profile-container">
				<h1 class="profile-title">Editar perfil</h1>
				<form id="profileForm">
					<div class="input-group">
						<label for="name">Nuevo nombre:</label>
						<div class="input-wrapper">
							<input type="text" id="name" name="name" placeholder="Por favor, ingrese un nuevo nombre" disabled>
							<div class="button-group">
								<button type="button" class="edit-btn" onclick="editField('name')">Editar</button>
								<button type="button" class="save-btn" onclick="saveField('name')">Guardar</button>
							</div>
						</div>
					</div>
					<div class="input-group">
						<label for="email">Nuevo correo electrónico:</label>
						<div class="input-wrapper">
							<input type="email" id="email" name="email" placeholder="Por favor, ingrese un nuevo correo electrónico" disabled>
							<div class="button-group">
								<button type="button" class="edit-btn" onclick="editField('email')">Editar</button>
								<button type="button" class="save-btn" onclick="saveField('email')">Guardar</button>
							</div>
						</div>
					</div>
					<div class="input-group">
						<label for="password">Nueva contraseña:</label>
						<div class="input-wrapper">
							<input type="password" id="password" name="password" placeholder="Por favor, ingrese una nueva contraseña" disabled>
							<div class="button-group">
								<button type="button" class="edit-btn" onclick="editField('password')">Editar</button>
								<button type="button" class="save-btn" onclick="saveField('password')">Guardar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget" id="sobre-nosotros">
						<h2 class="widget-title">Sobre Nosotros</h2>
						<p>En feedbackfusion, nos dedicamos a la promoción y valorización de la cadena productiva de la gastronomía, que abarca desde la producción y 
							transformación de los alimentos hasta la oferta gastronómica formal y los establecimientos relacionados. </p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
				<h2 class="widget-title">Unete con nosotros</h2>
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
	<!-- perfil js -->
	<script src="perfil.js"></script>

</body>

</html>