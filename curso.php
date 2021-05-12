<!DOCTYPE html>
<html>
<head>
	<title>Curso</title>
	<link rel="stylesheet" type="text/css" href="styles/curso.css">
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<?php 
		if(isset($_GET['Curso'])){
			$identificador = $_GET['Curso'];
			$respuesta = ConsultaCurso($identificador);
			//echo $respuesta[0]->Respuesta;

		}else{
			echo 	'<script type="text/javascript">
					alert("Acceso invalido");
					</script>';
			} 
	 ?>
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
			<div class="izq">
				<div class="video">
					
					<?php 
						if($respuesta[0]->Respuesta=="0"){
					?>
					<video controls src="" poster="img/fondo.png">no soportado</video>
					<?php
						}else{
					?>
					<video controls poster= <?php echo "'".$respuesta[0]->Miniatura."'" ?> >
					<source type="video/mp4" src=<?php echo "'".$respuesta[0]->EnlaceVideo."'"; ?> >
					</video>
					<?php		
						}
					 ?>
				</div>
			</div>
			<div class="der">
				<div class="titulo">
					<?php 
						if($respuesta[0]->Respuesta=="0"){
					?>
						<label>Titulo del curso</label>
					<?php		
						}else{
							?>
							<label><?php echo $respuesta[0]->Titulo; ?></label>
					<?php		
						}
					 ?>
					
				</div>
				<div class="descripcion">

					<?php 
						if ($respuesta[0]->Respuesta =="0"){
					?>
						<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
					<?php
						}else{
					?>
						<p><?php echo $respuesta[0]->Descripcion; ?></p>
					<?php
						}
					 ?>

					
				</div>
				<div class="botones">
					<button class="btn-estilo1">Comprar Curso</button>
					<button class="btn-estilo2">Inscribirme al contenido gratuito</button>
					<button class="btn-estilo3">Acceder al contenido</button>
					<button class="btn-estilo2">Escribir duda</button>
				</div>
			</div>
		</div>
		
		<div class="informacion">
			<label class="negritas">Informacion</label>
			<div class="caja">
				<div class="fila">
					<label class="negritas">Autor del curso:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "Nombre del autor";
							}else{
							echo $respuesta[0]->NombreAutor;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Costo:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "$0.00";
							}else{
								if($respuesta[0]->Precio == "0.00"){
									echo "Gratis";
								}else{
									echo "$".$respuesta[0]->Precio;
								}						
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Numero de fases:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "#";
							}else{
							echo $respuesta[0]->Fases;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Numero de fases gratuitas:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "#";
							}else{
							echo $respuesta[0]->FasesGratuitas;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Calificacion:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "Sin calificacion";
							}else{
								if($respuesta[0]->Calificacion = "0.00"){
									echo "Sin Calificar";
								}else{
									echo $respuesta[0]->Calificacion;
								}					
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Alumnos inscritos:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "#";
							}else{
							echo $respuesta[0]->Alumnos;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Categorias:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "0"){
							echo "#";
							}else{
							echo $respuesta[0]->Categorias;
							}
						 ?>
					</label>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

