<!DOCTYPE html>
<html>
<head>
	<title>Historial Ventas</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/venta.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/historial.js"></script>
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
		<div class="controles">
			<form method="post">
				<label>Filtro:</label>
				<select id="opcion" name="filtro">
					<option value="1">Ganancias (mayor - menor)</option>
					<option value="2">Mejor Calificado</option>
					<option value="3">Cantidad de alumnos</option>
				</select>
				<button type="submit" name="aplicar" class="boton-aplicar">Aplicar</button>
			</form>	
		</div>
		<div class="resultado">
		<!--	<a class="enlace" href="#"> -->
				<div class="tarjeta">
					<div class="t-img"><label>Miniatura</label></div>
					<div class="info">
						<label>Titulo</label>
					</div>
					<div class="t-precio"><label>Precio</label></div>
					<div class="t-alumnos"><label>Alumnos</label></div>
					<div class="t-calificacion"><label>Calificacion</label></div>
					<div class="t-fases"><label>Fases</label></div>
					<div class="t-ventas"><label>Ventas</label></div>
					<div class="t-ganancias"><label>Ganancias</label></div>
				</div>
		<!--	</a> -->
				<?php 
				if(isset($_POST['aplicar'])){
					$opcion = $_POST['filtro'];
					$array = HistorialInstructor($opcion);
					if ($array[0]->Respuesta == "1"){
						for ($i=0; $i < count($array) ; $i++) { 
							 $precio = "Gratis";
							 if ($array[$i]->Precio != "0.00"){
							 	$precio = $array[$i]->Precio;
							 } 
							echo 	'<a class="enlace-lista" href="lista-alumnos.php?Curso='.$array[$i]->ID.'">
									<div class="tarjeta">
										<div class="t-img"><img src="'.$array[$i]->Miniatura.'"></div>
										<div class="info">
											<div class="t-titulo"><p>'.$array[$i]->Titulo.'</p></div>
											<div class="t-categoria"><p>'.$array[$i]->Categorias.'</p></div>
										</div>
										<div class="t-precio"><label>'.$precio.'</label></div>
										<div class="t-alumnos"><label>'.$array[$i]->Alumnos.'</label></div>
										<div class="t-calificacion"><label>'.$array[$i]->Calificacion.'</label></div>
										<div class="t-fases"><label>'.$array[$i]->Fases.'</label></div>
										<div class="t-ventas"><label>'.$array[$i]->Ventas.'</label></div>
										<div class="t-ganancias"><label>'.$array[$i]->Ganancias.'</label></div>
									</div></a>'; 
							}	
						}
					?>
					<script type="text/javascript">
						SeleccionElemento(<?php echo $opcion; ?>);
					</script>
				<?php	
					}
				?>

		</div>
	</div>
</body>
</html>
