<!DOCTYPE>
<html>
<head>
	<title>Archivos de fase</title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
	<link rel="stylesheet" type="text/css" href="styles/archivo-fase.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/archivo-fase.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<form method="post" enctype="multipart/form-data">
			<label class="titulo">Archivo:</label>
			<input type="file" name="archivo" required>
			<button type="submit" name="enviar">Agregar archivo a fase</button>
		</form>
		<button id="volver">Regresar a creacion de fases</button>
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