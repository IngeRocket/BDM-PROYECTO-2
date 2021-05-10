<?php 
	
	include 'capaController.php';
	include 'sesion.php';


	function login($usuario, $pass, $tipo){
		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_Login(?,?,?)");
		$sentencia->bind_param('sss', $usuario, $pass, $tipo);
		$sentencia->execute();
		
		if($sentencia){
			$resultado = $sentencia->get_result();
					while( $r = $resultado->fetch_assoc()) {
					                $rows[] = $r;
					         }                    
					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
					$array = (array)json_decode($ValorRegresado);

					

					if($array[0]->Respuesta == 0){
						echo "por ahi no es";
						SetLoggeo($array[0]->Respuesta);	
					}else{
						echo "usuario real";
						SetLoggeo($array[0]->Respuesta);
						SetIdUsuario($array[0]->ID);
						SetNombreUsuario($array[0]->Nombre);
						SetFechaAlta($array[0]->FechaRegistro);
						SetRolUsuario($array[0]->Rol);
						SetFechaModificacion($array[0]->Modificacion);
						SetCorreoUsuario($array[0]->Correo);
						SetFotoUsuario($array[0]->Foto);

						if($array[0]->Rol == "Alumno"){
							header("Location: index.php");
						}else{
							header("Location: configuracion.php");
						}

					}
					//guardar id de usuario
					//$ClaveDeCurso = $array[0]->ClaveCurso; //siempre me regresa 1 solo valor
				}else{
					echo "error en la llamada";
				}
		
		$sentencia->close();
		$var->CerrarConexion();
	}
	function registro($usuario, $correo, $pass, $tipo){
		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_Registro(?,?,?,?)");
		$sentencia->bind_param('ssss', $usuario, $correo, $pass, $tipo);
		$sentencia->execute();
		
		if($sentencia){
			$resultado = $sentencia->get_result();
					while( $r = $resultado->fetch_assoc()) {
					                $rows[] = $r;
					         }                    
					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
					$array = (array)json_decode($ValorRegresado);				
					echo'<script type="text/javascript">
					    alert("'.$array[0]->Mensaje.'");
					    </script>';
					if($array[0]->Respuesta == 1){				
						header("Location: login.php");
					}

				}else{
					echo "error en la llamada";
				}
		
		$sentencia->close();
		$var->CerrarConexion();
	}
	function CrearCurso($titulo, $descripcion, $video, $imagen, $iextension){
		$autor = GetIdUsuario();
		$ClaveDeCurso;
		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_CrearCurso(?,?,?,?,?,?)");
		$sentencia->bind_param('ssssss',$titulo,$descripcion,$video,$autor,$imagen,$iextension);
		$sentencia->execute();
		
		if($sentencia){
			$resultado = $sentencia->get_result();
					while( $r = $resultado->fetch_assoc()) {
					                $rows[] = $r;
					         }                    
					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
					$array = (array)json_decode($ValorRegresado);
					$ClaveDeCurso = $array[0]->ClaveCurso; //siempre me regresa 1 solo valor
					SetClaveCurso($ClaveDeCurso);
					SetCantidadFase(0);
					header("Location: seleccion-categoria.php");
				}else{
					echo "error en la llamada";
				}
		
		$sentencia->close();
		$var->CerrarConexion();
		
		}

	function CrearFase($titulo, $descripcion, $video, $costo, $estadoPrecio, $pregunta){
			$curso = GetClaveCurso(); 

			$var = new Conexion;
			$mysqli = $var->getConexion();

			$sentencia = $mysqli->prepare("CALL SP_CrearFase(?,?,?,?,?,?)");
			$sentencia->bind_param('ssssss',$titulo,$descripcion,$video, $costo, $estadoPrecio, $curso);
			$sentencia->execute();
			
			if($sentencia){
				$resultado = $sentencia->get_result();
						while( $r = $resultado->fetch_assoc()) {
						                $rows[] = $r;
						         }                    
						$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
						$array = (array)json_decode($ValorRegresado);
						$ClaveFase = $array[0]->idFase; //siempre me regresa 1 solo valor
						SetIdFase($ClaveFase);
						AumentarContadorFase();

						if($pregunta == "SI"){
							header("Location: archivo-fase.php");
						}else{
							//recargar pagina para que aparezca boton
							header("Location: crear-fase.php");
						}
						
					}else{
						echo "error en la llamada";
					}
			
			$sentencia->close();
			$var->CerrarConexion();
	}
	function ArchivoFase($ruta){
		$Fase = GetIdFase();
		
		$var = new Conexion;
			$mysqli = $var->getConexion();

			$sentencia = $mysqli->prepare("CALL SP_ArchivoFase(?,?)");
			$sentencia->bind_param('ss',$ruta, $Fase);
			$sentencia->execute();
			
			if($sentencia){
				$resultado = $sentencia->get_result();
						while( $r = $resultado->fetch_assoc()) {
						                $rows[] = $r;
						         }                    
						$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
						$array = (array)json_decode($ValorRegresado);
						

						if($array[0]->Respuesta == "1"){
							echo'<script type="text/javascript">
					    	alert("'.$array[0]->Mensaje.'");
					    	</script>';
						}
						
					}else{
						echo "error en la llamada";
					}
			
			$sentencia->close();
			$var->CerrarConexion();
	}
	
	function ConsultaCurso($idCurso){
		$preguntaSesion = GetLoggeo();
		$idUsuario = 0;
		if($preguntaSesion == "0"){
			$idUsuario = 0;
		}else{
			$idUsuario = GetIdUsuario();
		}

		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_VerCurso(?,?)");
		$sentencia->bind_param('ss',$idCurso, $idUsuario);
		$sentencia->execute();
		
		if($sentencia){
			$resultado = $sentencia->get_result();
					while( $r = $resultado->fetch_assoc()) {
					                $rows[] = $r;
					         }

						$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
						$array = (array)json_decode($ValorRegresado);

						if ($array[0]->Respuesta == 0 ){
							echo'<script type="text/javascript">
							    alert("'.$array[0]->Mensaje.'");
							    </script>';
						}else{
							return $array;
						}				
						                  
					
				}else{
					echo "error en la llamada";
				}
		
		$sentencia->close();
		$var->CerrarConexion();
	}
 ?>