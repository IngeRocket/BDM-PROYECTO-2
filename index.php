<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/pagina-finalizado.css">
	<link rel="stylesheet" type="text/css" href="styles/tarjeta-cuadro.css">
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
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
		<div class="contenido">
			<div class="separador"><label>Seccion 1</label></div>
			<div class="grupo">
				<div class="tarjeta-cuadro">
				<div class="t-imagen"> <img src="img/fondo.png"></div>
				<div class="t-titulo"><label>Titulo</label></div>
				<div class="t-descripcion"><p>Descripcion del articulo</p></div>
				<div class="t-categoria"><p>Lista de categorias</p></div>
				<div class="t-enlace"><a href="curso.php?Curso=1">Ver curso</a></div>
				</div>

				<div class="tarjeta-cuadro">
				<div class="t-imagen"> <img src="img/fondo.png"></div>
				<div class="t-titulo"><label>Titulo</label></div>
				<div class="t-descripcion"><p>Descripcion del articulo</p></div>
				<div class="t-categoria"><p>Lista de categorias</p></div>
				<div class="t-enlace"><a href="curso.php?Curso=2">Ver curso</a></div>
				</div>
			
				<div class="tarjeta-cuadro">
				<div class="t-imagen"> <img src="img/fondo.png"></div>
				<div class="t-titulo"><label>Titulo</label></div>
				<div class="t-descripcion"><p>Descripcion del articulo</p></div>
				<div class="t-categoria"><p>Lista de categorias</p></div>
				<div class="t-enlace"><a href="curso.php?Curso=3">Ver curso</a></div>
				</div>

			</div>
			
		</div>
	</div>
</body>
</html>
				<!--

					<div class="tarjeta-cuadro">
					<div class="t-imagen"> <img src="img/fondo.png"></div>
					<div class="t-titulo"><label>Titulo</label></div>
					<div class="t-descripcion"><p>Descripcion del articulo</p></div>
					<div class="t-categoria"><p>Lista de categorias</p></div>
					<div class="t-enlace"><a href="#">Ver curso</a></div>
					</div>

					-->