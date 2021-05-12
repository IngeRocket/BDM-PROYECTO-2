<!DOCTYPE html>
<html>
<head>
	<title>Contenido Fase</title>
	
	<link rel="stylesheet" type="text/css" href="styles/contenido-fase.css">
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
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
		<div class="renglon"><label>Fase</label></div>
		
		<div class="contenido">

		<div class="video"><video controls src="uploads/FLEXBOX.mp4"></video></div>
		<div class="informacion">
			<label>descripcion</label>
		</div>
		</div>
	
		<div class="renglon">
			<label>Archivos de la fase</label>
		</div>
			
		<div class="grupo">
			<div class="v-archivo">
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
			</div>
		</div>

		<div class="renglon">
			<button>Marcar fase como completada</button>
		</div>

		<div class="renglon">
			<button>Volver a la lista de fases</button>
		</div>
	</div>
</body>
</html>

		
