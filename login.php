<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>

	<div class="contenedor">
		
		<form method="post">
		<label>Tipo de cuenta</label>
		<select name="u-cuenta">
			<option value="1">Alumno</option>
			<option value="2">Instructor</option>
		</select>
		<label>correo electronico</label>
		<input type="text" name="u-name" required placeholder="email@example.com">
		<label>clave de acceso</label>
		<input type="password" name="u-pass" required placeholder="password">
		<button type="submit" name="enviar">Enviar</button>
		</form>

	</div>
	<?php 
		if(isset($_POST['enviar'])){

			$cuenta = $_POST['u-cuenta'];
			$usuario = $_POST['u-name'];
			$clave = $_POST['u-pass'];

			//echo $cuenta ." ". $usuario." ". $clave;
			login($usuario, $clave, $cuenta);
		}
	 ?>
</body>
</html>