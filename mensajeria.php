<!DOCTYPE html>
<html>
<head>
	<title>Mensajeria</title>
	<link rel="stylesheet" type="text/css" href="styles/mensajeria.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/mensajeria.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>	
	<div class="contenedor">
		<div class="boton">
				<button id="reload">Recargar</button>
			</div>
		<div class="pantalla">
			<div class="chats">
				<div class="mensajeria" elemento="1">
					<div class="curso"><label>Nombre de curso</label></div>
					<div class="nombre"><label>Profesor</label></div>
				<!--	<div class="ultimo"><label>ultimo mensaje</label></div> -->
				</div>
			</div>
			<div class="historial">
				<div class="mensajes" id="chat">
					<div class="m-envio">Como estas?</div>
					<div class="m-respuesta">Cansado, y tu?</div>
				</div>
				<div class="mensaje">
					<input type="text" id="caja-texto">
					<button id="EnviarMensaje">Enviar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>