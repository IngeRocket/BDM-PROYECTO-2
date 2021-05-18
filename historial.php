<!DOCTYPE html>
<html>
<head>
	<title>Historial</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/historial.css">
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
		<div class="pantalla">
			<div class="p-panel">
			 	<div class="panel">
			 		<label>Mostrar cursos:</label>
			 		<form method="post">
			 		<select name="opcion" id="opcion">
			 			<option value="1">Todos A - Z</option>
			 			<option value="2">Fecha de Compra (ascendente)</option>
			 			<option value="3">Fecha de Compra (descendente)</option>
			 			<option value="4">Fecha Inscripcion (ascendente)</option>
			 			<option value="5">Fecha Inscripcion (descendente)</option>
			 			<option value="6">Cursos Completados (Fecha ascendente)</option>
			 			<option value="7">Cursos Completados (Fecha descendente)</option>
			 			<option value="8">En curso (Inscritos)</option>
			 		</select>
			 		<button type="submit" name="filtro" >Aplicar</button>
			 		</form>
			 	</div>
			</div>
			<div class="p-resultado">
				<div class="r-contenido">
					<div class="cabecera">
						<div class="t-imagen"><label>Miniatura</label></div>
						<div class="t-titulo">
							<div class="titulo-nombre">Nombre del cuso</div>
							<div class="titulo-categoria"></div>
						</div>
						<div class="t-progreso">Progreso</div>
						<div class="t-estado">Estado</div>
						<div class="t-e-compra">Estado de compra</div>
					</div>
					<?php  
					if(isset($_POST['filtro'])){
						$filtro = $_POST['opcion'];
						$array 	= HistorialUsuario($filtro);
					?>
					<script type="text/javascript">
						SeleccionElemento(<?php echo $filtro; ?>);
					</script>
					<?php
							if($array[0]->Respuesta == "1"){
								for ($i=0; $i < count($array); $i++) { 
									$estado = "En curso";
									if($array[$i]->Progreso == $array[$i]->Fases){
										$estado = "Completado";
									}
									$obtenido ="Inscrito";
									if($array[$i]->Comprado == "1"){
										$obtenido = "Comprado";
									}											
									$ruta="curso.php?Curso=".$array[$i]->IDcurso;
									echo 	'<a class="a-tarjeta" href='.$ruta.'>
											<div class="tarjeta">
												<div class="t-imagen"><img src="'.$array[$i]->Foto.'"></div>
												<div class="t-titulo">
												<div class="titulo-nombre">'.$array[$i]->TituloCurso.'</div>
												<div class="titulo-categoria">Categorias: '.$array[$i]->Categorias.'</div>
												</div>
												<div class="t-progreso">'.$array[$i]->Progreso.'/'.$array[$i]->Fases.'</div>
												<div class="t-estado">'.$estado.'</div>
												<div class="t-e-compra">'.$obtenido.'</div>
											</div></a>';
							
								}
							}	
						}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>