<!DOCTYPE html>
<html>
<head>
	<title>Comentarios</title>
	<link rel="stylesheet" type="text/css" href="styles/comentarios.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/comentarios.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<div class="renglon">
			<select name="opcion" id="opcion">
				<option value="1">Predefinido</option>
				<option value="2">Mayor calificacion primero</option>
				<option value="3">Menor calificacion primero</option>
			</select>
			<button id="filtro" name="filtro">Aplicar</button>
		</div>
		<div class="area">
			<div class="tarjeta">
				<div class="nombre"><label>Alumno</label></div>
				<div class="comentario"><label>Comentario</label></div>
				<div class="calificacion"><label>Calificacion</label></div>
			</div> 
		</div>
		<div class="area" id="area">
			<!-- LUGAR PARA CONTENIDO CON AJAX-->
		</div>	
	</div>
	<script type="text/javascript">
		ClaveDeCurso(<?php echo GetClaveCurso(); ?>);
	</script>
</body>
</html>

<!--
	<div class="tarjeta">
			<div class="nombre"><label>Mi nombre</label></div>
			<div class="comentario"><label>Comentario</label></div>
			<div class="calificacion"><label>Calificacion</label></div>
		</div> -->