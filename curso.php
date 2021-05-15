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
		<?php if($respuesta[0]->Respuesta == "1"){  ?>
			<div class="izq">
				<div class="video">				
					<?php 	if($respuesta[0]->Respuesta == "1"){ ?>
					<video controls poster= <?php echo "'".$respuesta[0]->Miniatura."'" ?> >
					<source type="video/mp4" src=<?php echo "'".$respuesta[0]->EnlaceVideo."'"; ?> >
					</video>
					<?php	}	?>
				</div>
			</div>
			<div class="der">
				<div class="titulo"><label>
					<?php 
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->Titulo;
						}
					 ?>
					</label>
				</div>
				<div class="descripcion">
					<p>
					<?php 
						if ($respuesta[0]->Respuesta == "1"){			
						echo $respuesta[0]->Descripcion; 
						}
					 ?>
					</p>
				</div>
				<div class="botones">
					<?php if(GetLoggeo() != "0"){ 
						if (GetRolUsuario() == "Alumno"){
					?>					
					<form method="post">
						<?php 
							if ($respuesta[0]->Precio == "0.00"){
								//lo puedo comprar
								if($respuesta[0]->Comprado == "0"){
									//boton de registro
								echo '<button class="btn-estilo1" type="submit" name="comprar-curso">Comprar Curso</button>';
								}
								if($respuesta[0]->Comprado == "1"){
								echo '<button class="btn-estilo3" type="submit" name="ver-contenido">Acceder al contenido</button>';
								}
							}else{
								//no es gratis, falta saber si tiene fases gratis
								if ($respuesta[0]->Comprado == "0"){
								echo '<button class="btn-estilo1" type="submit" name="comprar-curso">Comprar Curso</button>';
								}
								if($respuesta[0]->Registrado == "0" && $respuesta[0]->FasesGratuitas != "0"){
								echo '<button class="btn-estilo2" type="submit" name="alta-curso">Inscribirme al contenido gratuito</button>';
								}
								if($respuesta[0]->Registrado == "1"){
								echo '<button class="btn-estilo3" type="submit" name="ver-contenido">Acceder al contenido</button>';
								}
							}
						 ?>
						<button class="btn-estilo2" type="submit" name="crear-mensaje">Escribir duda</button>
					</form>
					<?php
						}else{
							echo '<h2>Solo los alumnos pueden acceder a las acciones del curso</h2>';
						}
					}else{ 
						echo "Inicia sesion para acceder a las acciones del curso";
					}
					 ?>
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
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->NombreAutor;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Costo:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "1"){

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
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->Fases;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Numero de fases gratuitas:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->FasesGratuitas;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Calificacion:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "1"){
								if($respuesta[0]->Calificacion == "0.00"){
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
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->Alumnos;
							}
						 ?>
					</label>
				</div>
				<div class="fila">
					<label class="negritas">Categorias:</label>
					<label>
						<?php 
						if($respuesta[0]->Respuesta == "1"){
							echo $respuesta[0]->Categorias;
							}
						 ?>
					</label>
				</div>
			</div>
		</div>
		<?php  		}else{	?>	
		 <h1>ACCESO INVALIDO A TRAVES DE URL</h1>
		<?php 			} 	?>
	</div>
	<?php 
		if(isset($_POST['ver-contenido'])){
			header("Location: vista-fases.php");
		}
		if(isset($_POST['alta-curso'])){
			//mandar a llamar una funcion para inscribir y recargar pagina
			AdquirirCurso(1);
		}
		if(isset($_POST['comprar-curso'])){
			//mandar a llamar funcion para comprar y recargar pagina
			AdquirirCurso(2);
		}
		if(isset($_POST['crear-mensaje'])){
			//ir a otra pagina para crear el mensaje de dua sobre el curso
		}
	 ?>
</body>
</html>

