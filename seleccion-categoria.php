<!DOCTYPE html>
<html>
<head>
	<title>Seleccion de categoria</title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
	<link rel="stylesheet" type="text/css" href="styles/seleccion-categoria.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/seleccion-categoria.js"></script>
</head>
<body>
	<?php 
	include 'php/sesion.php'; 
	?>
	<div class="contenedor">
		<div class="categorias">
			<div class="titulos">
		    		<label class="cat-nombre">Categorias existentes</label>
		    		<label class="cat-nombre">Categorias Seleccionadas</label>
		    	</div>
		    <div class="contenido-categoria">

		            <div id="lista" class="lista">
		            </div>
		            <div class="mi-lista">
		            </div>
		    </div>
		    <div class="anuncio">
		        <p>Si no esta una categoria que deseas para el curso, creala abajo y seleccionala, las categorias creadas no seran subidas si no se usan al menos 1 vez</p>
		        <input id="nombre-categoria" type="text" placeholder="Nueva categoria...">
		        <button id="crear-cat">Crear nueva categoria</button>
		    </div>
		    <div class="envio">
		    	<button id="ListaCompleta">Aplicar seleccion de categorias a curso</button>
		    </div>
		</div>
	</div>
		<?php 
			$auxiliar = GetClaveCurso();
		 ?>
	<script type="text/javascript">	
		CargarIdCurso( <?php echo "'".$auxiliar."'"; ?>);
	</script>
</body>
</html>