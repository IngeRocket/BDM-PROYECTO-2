<!DOCTYPE>
<html>
<head>
	<title>Archivos de fase</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/archivo-fase.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/archivo-fase.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo">
					<img src="img/navbar/escuela-logo.png">
				</div>
			</div>
		</header>
		<div class="contenido">
			<form method="post" enctype="multipart/form-data">
				<label class="titulo">Archivo:</label>
				<input type="file" name="archivo" required>
				<button type="submit" name="enviar">Agregar archivo a fase</button>
			</form>
		</div>
		<div class="centrado"><button id="volver">Regresar a creacion de fases</button></div>
	</div>
	<?php 

		if (isset($_POST['enviar'])) {
			$ruta = GetRutaFisica();
			$nombreArchivo = $_FILES['archivo']['name'];
			$rutaCompleta =  $ruta.$nombreArchivo;
			move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaCompleta);
			ArchivoFase($rutaCompleta);
		}

	 ?>
</body>
</html>