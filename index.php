<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/pagina-finalizado.css">
	<link rel="stylesheet" type="text/css" href="styles/tarjeta-cuadro.css">
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
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
		<div class="contenido">
			<div class="separador"><label>Cursos Mejor Calificados</label></div>
				<div class="grupo">
					<?php  
						$array = ContenidoPrincipal(1);
						if ($array[0]->Respuesta == "1") {
							for($i = 0; $i < count($array); $i++){
									$precio = "0";
									if($array[$i]->Precio == "0.00"){
										$precio = "Gratis";
									}else{
										$precio = '$ '.$array[$i]->Precio;
									}
								echo 	'<div class="tarjeta-cuadro">
											<div class="t-imagen"> <img src="'.$array[$i]->Miniatura.'"></div>
											<div class="t-titulo"><label>'.$array[$i]->Titulo.'</label></div>
											<div class="t-categoria"><p>Categorias: '.$array[$i]->Categorias.'</p></div>
											<div class="t-precio"><p>'.$precio.'</p></div>
											<div class="t-enlace"><a href="curso.php?Curso='.$array[$i]->ID.'">Ver curso</a></div>
										</div>';
							}
						}
					?>
				</div>
			<div class="separador"><label>Cursos Mas Vendidos</label></div>
				<div class="grupo">
					<?php  
						$array = ContenidoPrincipal(2);
						if ($array[0]->Respuesta == "1") {
							for($i = 0; $i < count($array); $i++){
									$precio = "0";
									if($array[$i]->Precio == "0.00"){
										$precio = "Gratis";
									}else{
										$precio = '$ '.$array[$i]->Precio;
									}
								echo 	'<div class="tarjeta-cuadro">
											<div class="t-imagen"> <img src="'.$array[$i]->Miniatura.'"></div>
											<div class="t-titulo"><label>'.$array[$i]->Titulo.'</label></div>
											<div class="t-categoria"><p>Categorias: '.$array[$i]->Categorias.'</p></div>
											<div class="t-precio"><p>'.$precio.'</p></div>
											<div class="t-enlace"><a href="curso.php?Curso='.$array[$i]->ID.'">Ver curso</a></div>
										</div>';
							}
						}
					?>
				</div>
			<div class="separador"><label>Cursos Nuevos</label></div>
			<div class="grupo">
				<?php  
					$array = ContenidoPrincipal(3);
					if ($array[0]->Respuesta == "1") {
						for($i = 0; $i < count($array); $i++){
								$precio = "0";
								if($array[$i]->Precio == "0.00"){
									$precio = "Gratis";
								}else{
									$precio = '$ '.$array[$i]->Precio;
								}
							echo 	'<div class="tarjeta-cuadro">
										<div class="t-imagen"> <img src="'.$array[$i]->Miniatura.'"></div>
										<div class="t-titulo"><label>'.$array[$i]->Titulo.'</label></div>
										<div class="t-categoria"><p>Categorias: '.$array[$i]->Categorias.'</p></div>
										<div class="t-precio"><p>'.$precio.'</p></div>
										<div class="t-enlace"><a href="curso.php?Curso='.$array[$i]->ID.'">Ver curso</a></div>
									</div>';
						}
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>