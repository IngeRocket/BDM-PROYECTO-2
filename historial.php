<!DOCTYPE html>
<html>
<head>
	<title>Historial</title>
	<link rel="stylesheet" type="text/css" href="styles/historial.css">
</head>
<body>
	<div class="contenedor">
		<div class="pantalla">
			<div class="p-panel">
			 	<div class="panel">
			 		<label>Mostrar cursos:</label>
			 		<select>
			 			<option value="1">Todos A - Z</option>
			 			<option value="2">Fecha de Compra (ascendente)</option>
			 			<option value="3">Fecha de Compra (descendente)</option>
			 			<option value="4">Fecha Inscripcion (ascendente)</option>
			 			<option value="5">Fecha Inscripcion (descendente)</option>
			 			<option value="6">Cursos Completados (Fecha ascendente)</option>
			 			<option value="7">Cursos Completados (Fecha descendente)</option>
			 			<option value="8">Progreso (ascendente)</option>
			 		</select>
			 		<button>Aplicar</button>
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
					<div class="tarjeta">
						<div class="t-imagen"><img src="img/fondo.png"></div>
						<div class="t-titulo">
							<div class="titulo-nombre">Nombre del cuso</div>
							<div class="titulo-categoria">CSS</div>
						</div>
						<div class="t-progreso">progreso</div>
						<div class="t-estado">estado</div>
						<div class="t-e-compra">Obtenido</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>