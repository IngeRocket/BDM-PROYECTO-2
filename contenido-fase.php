<!DOCTYPE html>
<html>
<head>
	<title>Contenido Fase</title>
	
	<link rel="stylesheet" type="text/css" href="styles/contenido-fase.css">
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<?php if (isset($_GET['Fase']) != null) {
		$var = $_GET['Fase'];
		$array = ConsultaFase($var);
		$archivos = ConsultaArchivo($var);
		//echo count($array);
	} ?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
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
		<div class="renglon"><label>
			<?php if($array[0]->Respuesta == "1"){
				echo $array[0]->Titulo;
			} ?>
		</label></div>
		
		<div class="contenido">

		<div class="video"> <?php if ($array[0]->Respuesta == "1"){ ?>
			<video controls src=<?php echo '"'.$array[0]->Video.'"' ?> >Video no soportado</video>
		<?php } ?>
		</div>
		<div class="informacion">
			<label>
				<?php 
					if($array[0]->Respuesta == "1"){
						echo $array[0]->Descripcion;
					}
				 ?>
			</label>
		</div>
		</div>
		<?php 
			if($archivos[0]->Respuesta == "1"){
					echo '<div class="renglon">
						<label>Archivos de la fase</label>
						</div>';
			}
		 ?>
			
		<div class="grupo">
			<div class="v-archivo">
				<?php 
					if($archivos[0]->Respuesta == "1"){
						for ($i=0; $i < count($archivos) ; $i++) { 
							$ruta = $archivos[$i]->Ruta;
							$ruta = pathinfo($ruta);
							$extension = $ruta['extension'];
							if($extension == "PNG" || $extension == "png" || $extension == "jpeg" || $extension == "JPEG" ||$extension == "bmp" ||$extension == "bmp"){
								Imagen($archivos[$i]->Ruta);
							}else{
								if($extension == "mp4" || $extension == "MP4" || $extension == "avi" || $extension == "AVI") {
									Video($archivos[$i]->Ruta);
								}else{
									Documento();
								}
							}
						}
					}
				 ?>
			</div>
		</div>

	
		<?php 
			if( $array[0]->Respuesta == "1"){
				if($array[0]->Completado == "0"){
		?>
			<div class="renglon">
				<form method="post">
				<button name="marcado">Marcar fase como completada</button>
				</form>
			</div>
		<?php			
				}
			}
		 ?>
		<div class="renglon">
			<a href="vista-fases.php">Volver a la lista de fases</a>
		</div>
	</div>
	<?php if ( isset($_POST['marcado']) ){
		CompletarFase($var);
	} ?>
</body>
<?php 
	function Imagen($ruta){
	$nombre = pathinfo($ruta);
	$nombre = $nombre['filename']; 
	echo 	'<a class="personalizado" href="'.$ruta.'" download><div class="elemento">
				<div class="a-icono"><img src="img/iconos/i-imagen.png"></div>
				<div class="a-nombre">'.$nombre.'</div>
			</div></a>';
	}
	function Video($ruta){
	$nombre = pathinfo($ruta);
	$nombre = $nombre['filename']; 
	echo 	'<a class="personalizado" href="'.$ruta.'" download><div class="elemento">
				<div class="a-icono"><img src="img/iconos/i-video.png"></div>
				<div class="a-nombre">'.$nombre.'</div>
			</div></a>';
	}
	function Documento($ruta){
		$nombre = pathinfo($ruta);
		$nombre = $nombre['filename']; 
		echo 	'<a class="personalizado" href="'.$ruta.'" download><div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-documento.png"></div>
					<div class="a-nombre">'.$nombre.'</div>
				</div></a>';
	}

 ?>
 
</html>

		
<!--
	<div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-web.png"></div>
					<div class="a-nombre">pagina web</div>
				</div>
				<div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-documento.png"></div>
					<div class="a-nombre">documento</div>
				</div>
				<div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-contenedor.png"></div>
					<div class="a-nombre">contenedor</div>
				</div>
				<div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-imagen.png"></div>
					<div class="a-nombre">imagen</div>
				</div>
				<div class="elemento">
					<div class="a-icono"><img src="img/iconos/i-video.png"></div>
					<div class="a-nombre">video</div>
				</div>

				-->