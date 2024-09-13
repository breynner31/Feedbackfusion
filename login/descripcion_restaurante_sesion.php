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
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
	<link rel="shortcut icon" type="image/png" href="../reviews/assets/img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../reviews/assets/css/all.min.css">
	<link rel="stylesheet" href="../reviews/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../reviews/assets/css/owl.carousel.css">
	<link rel="stylesheet" href="../reviews/assets/css/magnific-popup.css">
	<link rel="stylesheet" href="../reviews/assets/css/animate.css">
	<link rel="stylesheet" href="../reviews/assets/css/meanmenu.min.css">
	<link rel="stylesheet" href="../reviews/assets/css/main.css">
	<link rel="stylesheet" href="../reviews/assets/css/responsive.css">
	<link rel="stylesheet" href="descripcion.css">


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
								<li><a href="contact.html">Contact</a></li>
								<li> <a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul> -->

								<!-- </li>


							</ul>
						</nav>  -->
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
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
							<p class="subtitle">FeedBackFusion</p>
							<h1>Clasifica el restaurante </h1>
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
				include_once("database.php");
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
								include_once("database.php");
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
										echo "<h1 class='text-h1'>" . $row["nombre_restaurante"] . "</h1>";
									
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



				<!--Content Column-->
				<?php
	// Verificar si se ha proporcionado un ID de restaurante en la URL
	if (isset($_GET['id'])) {
		// Obtener el ID del restaurante desde la URL
		$restaurante_id = $_GET['id'];

    // Conectar a la base de datos
    include_once("database.php");
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
             echo "<p class='text'>Dirección: " . $row["direccion"] . " </p>";
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
<div id="map" style="width: 80rem; height: 550px;   box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5); margin-bottom: 30px;"></div>

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



			</div>

					</div>
                </div>
            </div>
        </div>
    </section>

	</div>



			<div class="comentario-section" id="comentarios-section">
				<!-- Aquí se insertarán dinámicamente los comentarios -->
			</div>

			<!-- Otros elementos HTML de tu página -->

			<?php
// Incluir archivos necesarios y establecer la conexión a la base de datos
include_once("database.php");
include_once('user.php');
include_once('user_session.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['email'])) {
    echo "Usuario no logueado.";
    exit;
}

$user = new User();
$user->setUser($_SESSION['email']); // Establecer el usuario actual basado en el email de la sesión
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

// Bloque PHP para guardar el comentario en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;
        date_default_timezone_set('America/Bogota'); // Establecer zona horaria de Bogotá
        $fechaCreacion = date('Y-m-d H:i:s'); // Fecha y hora actuales en Bogotá

        $puntuacion = isset($_POST['puntuacion']) ? intval($_POST['puntuacion']) : null;

        $stmt = $conn->prepare("INSERT INTO commits (id_user, id_restaurante, comentario, fecha_creacion, name, puntuacion) VALUES (:id_user, :id_restaurante, :comentario, :fecha_creacion, :name, :puntuacion)");
        $stmt->execute([
            ':id_user' => $idUser,
            ':id_restaurante' => $idRestaurante,
            ':comentario' => $comentario,
            ':fecha_creacion' => $fechaCreacion,
            ':name' => $nombreUsuario,
            ':puntuacion' => $puntuacion
        ]);

        echo "Su comentario y calificación fueron guardados exitosamente.<br>";
        echo "Comentario: " . htmlspecialchars($comentario) . "<br>";
        echo "Calificación del restaurante: " . htmlspecialchars($puntuacion) . "<br>";

        // Opcional: Puedes devolver una respuesta JSON si es necesario
        $response = [
            'success' => true,
            'message' => 'Comentario guardado correctamente.',
            'comentario' => $comentario,
            'puntuacion' => $puntuacion
        ];
        echo json_encode($response);
    } catch (PDOException $e) {
        echo "Error al guardar comentario: " . $e->getMessage();
    }
}
?>

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

            // Crear un objeto DateTime para la fecha de creación en UTC
            $dateTime = new DateTime($fechaCreacion, new DateTimeZone('UTC'));
            
            // Convertir a la zona horaria de Bogotá
            $dateTime->setTimezone(new DateTimeZone('America/Bogota'));

            // Formatear la fecha y hora en el formato deseado
            $fechaFormateada = $dateTime->format('Y-m-d H:i:s');

            echo '<div class="comentario">';
            echo '<div class="user-info">';
            echo '<div class="avatar22222"></div>'; // Aquí podrías mostrar un avatar si lo tienes
            echo '<div class="details">';

            // Imprimir el encabezado con nombre de usuario, fecha y estrellas
            echo "<h4>{$nombreUsuario} <span>on {$fechaFormateada}</span> ";
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



			<div class="leave-comentario">
    <h3>Deja un comentario</h3>
    <div class="form-container">
        <form id="comentario-form" method="POST">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" id="name" value="<?php echo htmlspecialchars($user->getNombre()); ?>" readonly>
            </div>

            <div class="form-group-email">
                <label for="email">Email</label>
                <input type="email" id="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>
                <input type="hidden" id="id_user" name="id_user" value="<?php echo htmlspecialchars($user->getid_user()); ?>">
                <input type="hidden" id="id_restaurante" name="id_restaurante" value="<?php echo htmlspecialchars($idRestaurante); ?>">
                <input type="hidden" id="name" name="name" value="<?php echo htmlspecialchars($nombreUsuario); ?>">
            </div>

            <div class="form-group-rating">
                <label for="puntuacion">Rating</label>
                <div class="star-rating">
                    <input type="radio" name="puntuacion" value="5" id="5"><label for="5" class="star">&#9733;</label>
                    <input type="radio" name="puntuacion" value="4" id="4"><label for="4" class="star">&#9733;</label>
                    <input type="radio" name="puntuacion" value="3" id="3"><label for="3" class="star">&#9733;</label>
                    <input type="radio" name="puntuacion" value="2" id="2"><label for="2" class="star">&#9733;</label>
                    <input type="radio" name="puntuacion" value="1" id="1"><label for="1" class="star">&#9733;</label>
                </div>
            </div>

            <div class="form-group">
                <label for="comentario">Comment</label>
                <textarea id="comentario" name="comentario" rows="4" placeholder="Write your comment..." maxlength="200"></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</div>


			<!-- footer -->
			<div class="logo-carousel-section">
		<div class="container">
			<!-- <div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="../reviews/assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../reviews/assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../reviews/assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../reviews/assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="../reviews/assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>	

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
			<!-- mostrar mapa js -->
			<script src="mostrar_mapa.js"></script>
			<!-- descripcion js -->
			<script src="descripcion.js"></script>
			<script src="../api/src/commit.js"></script>


</body>

</html>