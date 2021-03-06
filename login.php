<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/login.css">
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/select-memoria.js"></script>
</head>
<body>
	<?php include 'php/capaModelo.php'; ?>

	<div class="contenedor">
	<header class="header">
		<div class="menu">
			<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
			<div class="categorias">
				<div class="categoria"><a href="buscador.php">Buscador</a></div>
			</div>
		</div>
	</header>
		<div class="contenido">
			<form method="post">
			<label>Tipo de cuenta</label>
			<select id="cuenta" name="u-cuenta">
				<option value="1">Alumno</option>
				<option value="2">Instructor</option>
			</select>
			<label>correo electronico</label>
			<input type="email" name="u-name" required placeholder="email@example.com">
			<label>clave de acceso</label>
			<input type="password" name="u-pass" required placeholder="password" pattern="(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="La password debe contener al menos 1 caracter en mayuscula, 1 minuscula, 1 caracter especial y medir mas de 8 caracteres">
			<button type="submit" name="enviar">Iniciar Sesion</button>
			</form>
		</div>
		<div class="navegacion">
			<p>No tienes cuenta?. Oprime el boton de abajo para ir a crear una cuenta nueva</p>
			<a href="registro.php">Ir a registro</a>
		</div>
	</div>
	<?php 
		if(isset($_POST['enviar'])){

			$cuenta = $_POST['u-cuenta'];
			$usuario = $_POST['u-name'];
			$clave = $_POST['u-pass'];
			//echo $cuenta ." ". $usuario." ". $clave;
			login($usuario, $clave, $cuenta);
	?>
	<script type="text/javascript">
		Memoria(<?php echo $cuenta; ?>);
	</script>
	<?php		
		}
	 ?>
</body>
</html>