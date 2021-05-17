<!DOCTYPE html>
<html>
<head>
	<title>Historial</title>
	<link rel="stylesheet" type="text/css" href="styles/buscador.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/buscador.js"></script>
</head>
<body>
	<div class="contenedor">
		<div class="pantalla">
			<div class="p-panel">
				<div class="capsula">
					<label class="salto">Seleccion Categorias:</label> 
					<select id="categorias">
						
					</select>
					<label class="salto">Orden</label>
					<select>
						<option value="1">Predeterminado</option>
						<option value="2">Mas Vendidos (Precio ascendente)</option>
						<option value="3">Mas Vendidos (Precio descendente)</option>
						<option value="4">Mejor Calificados</option>
						<option value="5">Mostar solo cursos gratis</option>
						<option value="6">Mostrar solo cursos de paga</option>
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
						<div class="t-progreso">progreso</div>
						<div class="t-estado">estado</div>
						<div class="t-e-compra">precio</div>
					</div>
				</div>
				<div class="r-contenido" id="respuesta">
					
					<div class="tarjeta">
						<div class="t-imagen"><img src="img/fondo.png"></div>
						<div class="t-titulo">
							<div class="titulo-nombre">Nombre del cuso</div>
							<div class="titulo-categoria">CSS</div>
						</div>
						<div class="t-progreso">progreso</div>
						<div class="t-estado">estado</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>