<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/configuracion.css">
</head>
<body>
	<?php include 'php/capaModelo.php' ?>
	<div class="contenedor">
		<header class="header">
					<div class="menu">
						<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
						<?php if( GetRolUsuario() != "0" && GetRolUsuario() == "Instructor"){
							?>
						<div class="panel">
							<div class="panel-opc"> <a href="crear-curso.php">Crear Curso</a></div>
							<div class="panel-opc"> <a href="#">Mis cursos</a></div>
							<div class="panel-opc"> <a href="#">Ventas</a></div>
						</div>
						<?php 
							}
						 ?>
						<?php if( GetRolUsuario() != "0" && GetRolUsuario() == "Alumno"){
							?>
						
						<div class="panel">
							<div class="panel-opc"> <a href="historial.php">Mis Cursos</a></div>
							<div class="panel-opc"> <a href="#">Mensajes</a></div>
						</div>
						<?php 
							}
						 ?>
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
		<div class="area">
			<div class="panel-izq">
				<div class="informacion">
					<div class="mi-foto">
						<?php 
							if(GetLoggeo() != "0"){
							$ruta =	GetFotoUsuario();
						?>
							<img src= <?php echo "'".$ruta."'";  ?> >	
						<?php
							}else{
						 ?>
							<img src="img/perfil.png">
						<?php 
							}
						 ?>
					</div>
					<div class="datos">
						<label class="i-panel">Rol</label>
						<label class="i-panel-u"><?php 
							if(GetLoggeo() != "0"){
								echo GetRolUsuario();
							}
						 ?></label>
						<label class="i-panel">Nombre</label>
						<label class="i-panel-u"><?php 
							if(GetLoggeo() != "0"){
								echo GetNombreUsuario();
							}
						 ?></label>
						<label class="i-panel">Correo electronico</label>
						<label class="i-panel-u"><?php 
							if(GetLoggeo() != "0"){
								echo GetCorreoUsuario();
							}
						 ?></label>
						<label class="i-panel">Fecha de alta</label>
						<label class="i-panel-u"><?php 
							if(GetLoggeo() != "0"){
								echo GetFechaAlta();
							}
						 ?></label>
						<label class="i-panel">Fecha de Modificacion</label>
						<label class="i-panel-u"><?php 
							if(GetLoggeo() != "0"){
								echo GetFechaModificacion();
							}
						 ?></label>
					</div>
					<div class="botones">
						<button>Cambiar foto de usuario</button>
						<button>Cambiar clave de acceso</button>
					</div>
				</div>
			</div>
			<div class="panel-der"><label>Panel 2</label></div>
		</div>
	</div>
	<?php 

	 ?>
</body>
</html>

