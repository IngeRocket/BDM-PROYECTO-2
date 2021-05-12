<!DOCTYPE html>
<html>
<head>
	<title>Vista Fases</title>
	<link rel="stylesheet" type="text/css" href="styles/vista-fases.css">
</head>
<body>
	<?php include 'php/capaModelo.php';
		$var = GetClaveCurso();
		$array = ListaDeFases($var);
	 ?>
	<div class="contenedor">
		<div class="contenido">
			
			<div class="elementos">
				<div class="titulos">
					<label>
						<?php 
							if($array[0]->Respuesta=="1"){
								echo $array[0]->Curso;
							}else{
								echo "Titulo del curso";
							}
						 ?>
					</label>
					<label>Fases </label>
				</div>
					<?php 
						if($array[0]->Respuesta=="1"){
							for($i = 0; $i < count($array); $i++){
					?>
						<div class="lista">	
							<div class="l-nombre"><p><?php echo $array[$i]->Titulo; ?></p></div>
							<div class="l-descripcion"><p><?php echo $array[$i]->Descripcion; ?></p></div>
							<div class="l-archivos"><p><?php echo $array[$i]->CantidadArchivos; ?></p></div>
							<div class="l-estado"><p> Visto </p></div>
						</div>
					<?php
							}//cierre de for
						
						} //cierre de if
					 ?>
					

			</div>
		</div>
		<div class="centrado">
			<a href=<?php echo "'curso.php?Curso=".GetClaveCurso()."'"; ?> > Volver a la pantalla del curso</a>
		</div>
	</div>
</body>
</html>