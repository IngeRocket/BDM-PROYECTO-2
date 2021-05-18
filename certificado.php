<!DOCTYPE html>
<html>
<head>
	<title>
		certificado
	</title>
	<link rel="stylesheet" type="text/css" href="styles/certificado.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/certificado.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<div class="volver"><button id="volver">Volver lista de fases</button></div>
	<div class="contenedor-certificado">
		<div class="certificado">
		<div class="contenido">
			<div class="titulo">
				<img class="logotipo" src="img/logo.png">
				<label>CERTIFICADO</label>
			</div>
		<div class="sub-titulo"><label>NOS COMPLACE OTROGAR EL SIGUIENTE CERTIFICADO A:</label></div>
		<div class="nombre"><?php echo strtoupper( GetNombreUsuario() ); ?></div>
			<div class="cuerpo">			
					POR HABER CONCLUIDO SATISFACTORIAMENTE EL CURSO DE: <label class="nombre-curso"><?php echo strtoupper( GetCertificadoNombreCurso() );?></label>
					DENTRO DE LA PLATAFORMA CAMBRI DE CURSOS EN LINEA
			</div>
			<div class="firma">
				<img src="img/navbar/escuela.png">
			</div>
		</div>
		</div>
	</div>
	<div class="renglon">
		<button id="imprimir">Guardar Certificado PDF</button>
	</div>
	</div>
</body>
</html>
