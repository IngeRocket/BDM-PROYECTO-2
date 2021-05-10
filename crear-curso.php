<!DOCTYPE html>
<html>
<head>
	<title>Crear Curso</title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
	<link rel="stylesheet" type="text/css" href="styles/crear-curso.css">
</head>
<body>
<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<form method="post" enctype="multipart/form-data">
			<label>Nombre del curso</label>
			<input type="text" name="c-name" maxlength="90" placeholder="Titulo del curso" required>
			<label>Descripcion del curso</label>
			<textarea name="c-desc" maxlength="150" placeholder="Descripcion del curso..." required></textarea>
			<label>Miniatura del curso (Imagen)</label>
			<input type="file" name="c-img" accept=".bmp, .png, .jpg" required>
			<label>Video del curso</label>
			<input type="file" name="c-video" accept=".mp4" required>
			<button type="submit" name="enviar">Crear Curso</button>
		</form>
	</div>
	<?php 
	if(isset($_POST['enviar'])){
		$nombreCurso = $_POST['c-name'];
		$descripcionCurso = $_POST['c-desc'];

		$rutaVideo 		= 	$_FILES['c-video']['name'];
		$rutaMiniatura 	= 	$_FILES['c-img']['name'];
		$rutaFisica = GetRutaFisica();


		$rutaAbsolutaMiniatura	 	= $rutaFisica.$rutaMiniatura;
		$rutaAbsolutaVideo 			= $rutaFisica.$rutaVideo;

	

		move_uploaded_file($_FILES['c-video']['tmp_name'], $rutaAbsolutaVideo);


		CrearCurso($nombreCurso, $descripcionCurso, $rutaAbsolutaVideo, $rutaAbsolutaMiniatura);

		echo $nombreCurso.'<br>';
		echo $descripcionCurso.'<br>';
		echo $rutaAbsolutaVideo.'<br>';
	}	

	 ?>
</body>
</html>