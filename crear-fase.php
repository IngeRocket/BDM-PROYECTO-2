<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
	<link rel="stylesheet" type="text/css" href="styles/crear-fase.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/fase.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
			<div class="titulo">
		    	<label>CREACION DE FASE</label>
			</div>
			<?php 
				$final = GetCantidadFase();

				if($final > 0){
			?>
						<div class="renglon">
							<button id="cancelar" name="final">Cerrar Creador de Fases</button>	
						</div>
			<?php
							 }
			 ?>

		<div class="fase">
			<form method="post" enctype="multipart/form-data">		
				<label>Titulo de fase</label>
				<input type="text" name="nombre-fase" placeholder="Nombre de la fase...">
				<label>Descripcion de la fase</label>
				<textarea name="descripcion-fase" maxlength="150" placeholder="Descripcion de la fase..."></textarea>
				<label>Costo de la fase</label>
				<div class="renglon">
					<label><input type="radio" id="precio-gratis" 	value="1" name="costo" checked>Gratis</label>
					<label><input type="radio" id="precio-paga" 	value="0" name="costo">De paga</label>
				</div>
				<input type="number" name="precio" id="costo" min="0" max="9999.99" value="0.00" step="0.25" readonly>
				
				<label>Video de la fase</label>
				<input type="file" name="video" accept=".mp4">
				<label>Esta fase va a contener archivos?</label>
				<div class="renglon">
				<label><input type="radio" name="pregunta" value="SI" checked="">Si </label>
				<label><input type="radio" name="pregunta" value="NO" checked="">No </label>
				</div>
				
				<button type="submit" name="enviar">Crear Fase</button>
			</form>	
		</div>
	</div>
		<?php 
			if(isset($_POST['enviar'])){

				$titulo = $_POST['nombre-fase'];
				$descripcion = $_POST['descripcion-fase'];

				$valor = $_POST['precio'];	
				$preguntaArchivo 	= $_POST['pregunta']; 	// Tendra archivos extra?
				$preguntaPrecio 	= $_POST['costo'];		// Cual es el precio de la fase?

				$rutaNueva = GetRutaFisica();
	        	$nombreVideo = $_FILES['video']['name'];
	        	$rutaCompletaVideo = $rutaNueva.$nombreVideo;

	        	move_uploaded_file($_FILES['video']['tmp_name'], $rutaCompletaVideo);

	        	CrearFase($titulo, $descripcion, $rutaCompletaVideo, $valor, $preguntaPrecio, $preguntaArchivo); //el id de la fase de guarda en el modelo
	    }
	    ?>
</body>
</html>