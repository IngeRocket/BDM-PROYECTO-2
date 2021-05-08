<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="styles/general.css">
</head>
<body>
	<?php include 'php/sesion.php'; ?>
	<div class="contenedor">
		<header class="header">
			<div class="opciones">
				<div class="opc-1">
					<?php $nombre = GetNombreUsuario(); ?>
					<label>
						<?php 
							if($nombre != "0"){
								echo $nombre;
							}else{
								echo "Inicio de Sesion";
							}
					 	?>	 	
					 </label>
				</div>
				<div class="opc-2">
					<label>
							<?php 
								if($nombre != "0"){
									echo $nombre;
								}else{
									echo "Registro";
								}
						 	?>	
					</label>
				</div>
			</div>
		</header>
	</div>
</body>
</html>