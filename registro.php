<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<link rel="stylesheet" type="text/css" href="styles/general.css">
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<form method="post">
			<label>Tipo de cuenta</label>
			<select name="cuenta">
				<option value="1">Alumno</option>
				<option value="2">Instructor</option>
			</select>
			<label>Nombre completo</label>
			<input type="text" name="u-nombre" required placeholder="Nombre Completo">
			<label>correo electronico</label>
			<input type="text" name="u-correo" required placeholder="example@correo.com">
			<label>clave de acceso</label>
			<input type="password" name="u-pass" required placeholder="password">
			<button type="submit" name="registro">Registro</button>
		</form>
		<a href="login.php">Ir a Inicio de Sesion</a>
	</div>
	<?php 
		if(isset($_POST['registro'])){
			
			$nombre = $_POST['u-nombre'];
			$correo = $_POST['u-correo'];
			$pass = $_POST['u-pass'];
			$cuenta = $_POST['cuenta'];

			registro($nombre,$correo,$pass,$cuenta);
		}
	 ?>
</body>
</html>