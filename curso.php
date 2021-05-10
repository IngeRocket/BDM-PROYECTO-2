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
					
					<video controls src="uploads/FLEXBOX.mp4">no soportado</video>
				</div>
			</div>
			<div class="der"><label>adios</label></div>
		</div>
	</div>
</body>
</html>

