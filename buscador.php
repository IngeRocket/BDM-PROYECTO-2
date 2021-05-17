<!DOCTYPE html>
<html>
<head>
	<title>Historial</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/buscador.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/buscador.js"></script>
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
				<div class="capsula">
					<label class="salto">Seleccion Categorias:</label> 
					<select id="categorias">
						
					</select>
					<label class="salto">Orden</label>
					<select id="opcion">
						<option value="1">Predeterminado</option>
						<option value="2">Mas Vendidos (Precio ascendente)</option>
						<option value="3">Mas Vendidos (Precio descendente)</option>
						<option value="4">Mejor Calificados</option>
						<option value="5">Mostar solo cursos gratis (A - Z)</option>
						<option value="6">Mostrar solo cursos de paga (A - Z)</option>
					</select>
				</div>
			</div>
			<div class="p-resultado">
				<div class="buscador">
					<div class="caja">
						<input type="text" id="titulo" name="" placeholder="titulo de curso...">
					</div>
					<div class="boton"><button id="buscar">buscar</button></div>
				</div>
				<div class="r-contenido">
					<div class="cabecera">
						<div class="t-imagen"><label>Miniatura</label></div>
						<div class="t-titulo">
							<div class="titulo-nombre">Nombre del cuso</div>
						</div>
						<div class="t-progreso">Fases Gratuitas</div>
						<div class="t-estado">Fases Totales</div>
						<div class="t-e-compra">Precio</div>
					</div>
				</div>
				<div class="r-contenido" id="respuesta">
				<!-- AQUI VAN LOS RESULTADOS CON JAVASCRIPT -->
				</div>
			</div>
		</div>
	</div>
</body>
</html>