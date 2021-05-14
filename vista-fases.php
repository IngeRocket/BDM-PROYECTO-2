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
								echo 'Nombre del curso: '.$array[0]->Curso;
							}else{
								echo "Nombre del curso";
							}
						 ?>
					</label>
					<label>Fases</label>
				</div>

				<div class="cabecera">	
					<div class="l-nombre"><p>Nombre</p></div>
					<div class="l-descripcion"><p>Descripcion</p></div>
					<div class="l-archivos"><p>Cantidad archivos</p></div>
					<div class="l-estado"><p>Estado</p></div>
				</div>

					<?php 
						if($array[0]->Respuesta=="1"){
							for($i = 0; $i < count($array); $i++){
							
						if($array[$i]->Gratis == "1" || $array[$i]->Estado == "1" ){
									//significa que esta adquirido
						Adquirido($array[$i]->ID ,$array[$i]->Titulo, $array[$i]->Descripcion, $array[$i]->CantidadArchivos, $array[$i]->Progreso);

						}else{
									//el curso no ha sido comprado, solo se inscribió
						Bloqueado($array[$i]->Titulo, $array[$i]->Descripcion, $array[$i]->CantidadArchivos);
						
						}
				
							}//cierre de for						
						} //cierre de if
					 ?>
					
			</div>
		</div>
		<div class="centrado">
			<a href=<?php echo "'curso.php?Curso=".GetClaveCurso()."'"; ?> > Volver a la pantalla del curso</a>
		</div>
		<div class="centrado">
			<?php 
			if ($array[0]->Respuesta == "1"){
				$contador = 0;
				for ($i=0; $i < count($array) ; $i++) { 
				if($array[$i]->Progreso == "1"){
					$contador++;
					}
				}
				if($contador == count($array)){
					echo '<a class="calificar" href=calificar-curso.php?Curso='.GetClaveCurso().'>Calificar curso</a>';
				}
			}
			 ?>
		</div>
	</div>
</body>
</html>


<?php 
	function Adquirido($id, $titulo, $descripcion, $cantidad, $progreso){
		$aux = 'contenido-fase.php?Fase='.$id;
		if ($progreso == "0"){
			$progreso = " ";
		}else{
			$progreso = "Completado";
		}

		echo '<a class="fase-enlace" href="'.$aux.'">
		<div class="lista">	
			<div class="l-nombre"><p>'.$titulo.'</p></div>
			<div class="l-descripcion"><p>'.$descripcion.'</p></div>
			<div class="l-archivos"><p>'.$cantidad.'</p></div>
			<div class="l-estado"><p>'.$progreso.'</p></div>
		</div>
		</a>';
	} 

	function Bloqueado($titulo, $descripcion, $cantidad){
		echo'<div class="b-lista">	
				<div class="l-nombre"><p>'.$titulo.'</p></div>
				<div class="l-descripcion"><p>'.$descripcion.'</p></div>
				<div class="l-archivos"><p>'.$cantidad.'</p></div>
				<div class="l-estado"><p>Bloqueado</p></div>
				</div>';
	}

	
 ?>