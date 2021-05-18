<!DOCTYPE html>
<html>
<head>
	<title>Lista</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/lista-alumnos.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<?php 
		$curso = 0;
		if(isset($_GET['Curso'])){
			$curso = $_GET['Curso'];
			SetClaveCurso($curso);
		}
	 ?>
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
		<div class="volver">
			<a href="ventas.php">Volver</a>
		</div>
		<div class="renglon">
			<label class="titulo">Lista de alumnos</label>
		</div>
		<div class="renglon">
			<div class="tarjeta">
				<div class="t-nombre"><p>Nombre de Alumno</p></div>
				<div class="t-calificacion"><label>Calificacion</label></div>
				<div class="t-comentario"><p>Comentario</p></div>
				<div class="t-progreso"><label>Progreso</label></div>
				<div class="t-e-compra"><p>Estado de Compra</p></div>
				<div class="t-fecha-compra"><p>Fecha de Compra</p></div>
			</div>
		</div>
		<div class="area">
			<?php 
			if($curso != 0){
				$array = ListaAlumnos();
				if($array[0]->Respuesta == "1"){
					for ($i=0; $i < count($array) ; $i++) {
						$calificado = "Sin calificar";
						$comentario = "";
						$FechaCompra = "Sin comprar";
						$estado = "Inscrito"; 
						if($array[$i]->Calificado == "1"){
							$calificado = $array[$i]->Calificacion;
							$comentario = $array[$i]->Comentario;
						}
						if($array[$i]->Comprado == "1"){
							$estado = "Comprado";
							$FechaCompra = $array[$i]->FechaCompra;
						}
						echo '<div class="tarjeta">
							<div class="t-nombre"><p>'.$array[$i]->Alumno.'</p></div>
							<div class="t-calificacion"><label>'.$calificado.'</label></div>
							<div class="t-comentario"><p>'.$comentario.'</p></div>
							<div class="t-progreso"><label>'.$array[$i]->Progreso.'/'.$array[$i]->Fases.'</label></div>
							<div class="t-e-compra"><label>'.$estado.'</label></div>
							<div class="t-fecha-compra"><label>'.$FechaCompra.'</label></div>
							</div>';
					}
				}else{
				echo 	'<script type="text/javascript">
						alert('.$array[0]->Mensaje.');
						</script>';	
				} 	
			}
			?>
		</div>
	</div>
</body>
</html>