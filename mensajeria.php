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
			<div class="chats" id="grupo-chats">

			</div>
			<div class="historial">
				<div class="mensajes" id="chat"> <!-- AQUI SE INSERTAN LOS MENSAJES, ¡NO BORRAR! -->
				</div>
				<div class="mensaje">
						<input type="text" name="caja" id="caja-texto">
						<button name="enviar" id="EnviarMensaje">Enviar</button>
				</div>
			</div>
		</div>
	</div>
	<?php 
		if(GetRolUsuario()=="Alumno"){
			echo "Estas en el rol de alumno";
		//siempre mandas el id del alumno
		$var = GrupoChat();	
		for ($i=0; $i < count($var); $i++) { 
			echo '<script type="text/javascript">
			NuevoGrupoInstructor("'.$var[$i]->IdCurso.'","'.$var[$i]->IdUsuario.'","'.$var[$i]->Curso.'","'.$var[$i]->Nombre.'","'.$var[$i]->Mensaje.'");
				</script>';
			}
		}else{
			echo "Estas en el rol de instructor";
		//debo guardar el id del alumno
		$var = GrupoChat();
		for ($i=0; $i < count($var); $i++) { 
			echo '<script type="text/javascript">
			NuevoGrupoAlumno("'.$var[$i]->IdCurso.'","'.$var[$i]->IdUsuario.'","'.$var[$i]->Curso.'","'.$var[$i]->Nombre.'","'.$var[$i]->Mensaje.'");
				</script>';
			}
		}
	?>
	<script type="text/javascript">
		SetRolJS(<?php echo "'".GetRolUsuario()."'"; ?>);
	</script>
</body>
</html>
