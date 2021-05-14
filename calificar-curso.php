<!DOCTYPE html>
<html>
<head>
	<title>Calificar Curso</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/calificar-curso.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
<div class="contenedor">
	<header class="header">
		<div class="menu">
			<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
			<div class="categorias">
				<div class="categoria">Mas vendidos</div>
				<div class="categoria">Mas populares</div>
				<div class="categoria">Mas recientes</div>
				<div class="categoria">Mejor promediados</div>
			</div>
			<div class="categorias">
				<div class="categoria">Categorias</div>
			</div>
			<div class="opciones">
				<div class="opc">
					<?php $prueba = GetLoggeo(); ?>
					<label>
						<?php 
							if($prueba != "0"){
								$nombre = GetNombreUsuario();
								echo "<a href='configuracion.php'>".$nombre."</a>";
							}else{
								echo '<a href="login.php">Inicio de Sesion</a>';
							}
					 	?>	 	
					 </label>
				</div>
				<div class="opc">
					<label>
							<?php 
								if($prueba != "0"){
									echo '<a href="despedida.php">Cerrar Sesion</a>';
								}else{
									echo '<a href="registro.php">Registro</a>';
								}
						 	?>	
					</label>
				</div>
			</div>
		</div>
	</header>	
		<form method="post">
			<div class="titulo"><label>Puntuacion (0 - 100)</label></div>
			<div class="puntuacion">
				<input type="number" max="100" min="0" step="1" name="calificacion">
			</div>
			<div class="titulo"><label>Comentario / Opinion del curso</label></div>
			<div class="caja">
				<textarea required name="comentario" maxlength="300"></textarea>
			</div>
			<div class="boton">
				<button type="submit" name="submit">Calificar Curso</button>
			</div>
		</form>
		<div class="boton">
				<a href="vista-fases.php">Cancelar</a>
			</div>
</div>
</body>
</html>