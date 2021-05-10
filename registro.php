<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<link rel="stylesheet" type="text/css" href="styles/navbar.css">
<link rel="stylesheet" type="text/css" href="styles/registro.css">
<body>
	<?php include 'php/capaModelo.php'; ?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
				<div class="categorias">
					<div class="categoria">Mas vendidos</div>
					<div class="categoria">Mas populares</div>
					<div class="categoria">Mas recientes</div>
					<div class="categoria">Mejor promediados</div>
				</div>
				<div class="categorias">
					<div class="categoria">Categorias</div>
				</div>
			</div>
		</header>

		<div class="contenido">
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
		}
	 ?>
</body>
</html>