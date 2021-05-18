<!DOCTYPE html>
<html>
<head>
	<title>Duda</title>
	<link rel="stylesheet" type="text/css" href="styles/navbar.css">
	<link rel="stylesheet" type="text/css" href="styles/curso-duda.css">
</head>
<body>
	<?php include 'php/capaModelo.php'; 
	$idCurso = GetClaveCurso();
	$ruta = "curso.php?Curso=".$idCurso;
	?>
	<div class="contenedor">
		<header class="header">
			<div class="menu">
				<div class="logo"><a href="index.php"><img src="img/navbar/escuela-logo.png"></a></div>
				<div class="categorias">
					<div class="categoria"><a href="buscador.php">Buscador</a></div>
				</div>
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
		<div class="renglon"><a href=<?php echo "'".$ruta."'"; ?>>Volver</a></div>
		<form method="post">
			<textarea name="duda" maxlength="300" placeholder="duda..." required></textarea>
			<div class="leyenda"><label>300 caracteres maximo</label></div>
			<button type="submit" name="enviar">Enviar duda</button>
		</form>
	</div>
	<?php 
		if (isset($_POST['enviar'])) {
			$duda = $_POST['duda'];
			echo $duda;
			$curso = GetClaveCurso();
			$usuario = GetIdUsuario();
			SubirDuda($usuario, $curso, $duda);
		}
	 ?>
</body>
</html>