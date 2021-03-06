<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/registro.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/select-memoria.js"></script>
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
			</div>
		</header>

		<div class="contenido">
			<form method="post">
				<label>Tipo de cuenta</label>
				<select id="cuenta" name="cuenta">
					<option value="1">Alumno</option>
					<option value="2">Instructor</option>
				</select>
				<label>Nombre completo</label>
				<input type="text" name="u-nombre" required placeholder="Nombre Completo">
				<label>correo electronico</label>
				<input type="text" name="u-correo" required placeholder="example@correo.com">
				<label>clave de acceso</label>
				<input type="password" name="u-pass" required placeholder="password" pattern="(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="La password debe contener al menos 1 caracter en mayuscula, 1 minuscula, 1 caracter especial y medir mas de 8 caracteres">
				<button type="submit" name="registro">Registrame!</button>
			</form>
		</div>
		<div class="navegacion">
			<a href="login.php">Ir Inicio de Sesion</a>
		</div>
	</div>
	<?php 
		if(isset($_POST['registro'])){
			
			$nombre = $_POST['u-nombre'];
			$correo = $_POST['u-correo'];
			$pass = $_POST['u-pass'];
			$cuenta = $_POST['cuenta'];
			registro($nombre,$correo,$pass,$cuenta);
	?>
	<script type="text/javascript">
		Memoria(<?php echo $cuenta; ?>);
	</script>
	<?php
		}
	 ?>
</body>
</html>