<!DOCTYPE html>
<html>
<head>
	<title>Comentarios</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/comentarios.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/comentarios.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
				<div class="categorias">
					<div class="categoria"><a href="buscador.php">Buscador</a></div>
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
		<div class="regreso">
			<?php echo '<a href="curso.php?Curso='.GetClaveCurso().'">Volver a la informacion del curso</a>'; ?>	
		</div>
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