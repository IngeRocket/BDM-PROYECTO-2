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
						echo'<script type="text/javascript">
					    alert("'.$array[0]->Mensaje.'");
					    </script>';
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
	function CrearCurso($titulo, $descripcion, $video, $imagen){
		$autor = GetIdUsuario();
		$ClaveDeCurso;
		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_CrearCurso(?,?,?,?,?)");
		$sentencia->bind_param('sssss',$titulo,$descripcion,$video,$autor,$imagen);
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
		//gurdar el curso que vio para acceder a el en la de fases
		SetClaveCurso($idCurso);

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
							return $array;
						}else{
							return $array;
						}				
						                  
					
				}else{
					echo "error en la llamada";
				}
		
		$sentencia->close();
		$var->CerrarConexion();
	}
 	function ListaDeFases($idCurso){
 		$idUsuario = GetIdUsuario();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();

 		$sentencia = $mysqli->prepare("CALL SP_CursoListaFase(?,?)");
 		$sentencia->bind_param('ss',$idUsuario, $idCurso);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);

 					if($array[0]->Respuesta == "1"){
 						return $array;
 					}else{
 						echo 'El curso no contiene fases o alguien esta jugando con los parametros';
 					}
 					
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function CompletarFase($idFase){
 		$idUsuario = GetIdUsuario();
 		$idCurso = GetClaveCurso();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();

 		$sentencia = $mysqli->prepare("CALL SP_FaseCompletada(?,?,?)");
 		$sentencia->bind_param('sss', $idFase, $idCurso, $idUsuario);
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
 						header("Location: vista-fases.php");
 					}else{
 						echo 'El curso no contiene fases o alguien esta jugando con los parametros';
 					}
 					
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function AdquirirCurso($opcion){
 		$idUsuario = GetIdUsuario();
 		$idCurso = GetClaveCurso();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
	
 		$sentencia = $mysqli->prepare("CALL SP_ComprarCurso(?,?,?)");
 		$sentencia->bind_param('sss',$idUsuario, $idCurso, $opcion);
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
 					
 					$ruta = "Location: curso.php?Curso=".$idCurso;
 					header($ruta);
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function ConsultaFase($idFase){
 		 $idUsuario = GetIdUsuario();
 		 $idCurso = GetClaveCurso();
 		 $var = new Conexion;
 		 $mysqli = $var->getConexion();
 	
 		 $sentencia = $mysqli->prepare("CALL SP_ContenidoFase(?,?,?)");
 		 $sentencia->bind_param('sss',$idUsuario, $idCurso, $idFase);
 		 $sentencia->execute();
 		 
 		 if($sentencia){
 		 	$resultado = $sentencia->get_result();
 		 			while( $r = $resultado->fetch_assoc()) {
 		 			                $rows[] = $r;
 		 			         }                    
 		 			$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 		 			$array = (array)json_decode($ValorRegresado);
 					return $array;
 		 		}else{
 		 			echo "error en la llamada";
 		 		}
 		 
 		 $sentencia->close();
 		 $var->CerrarConexion();
 	}
 	function ConsultaArchivo($idFase){
 		$var = new Conexion;
 		$mysqli = $var->getConexion();
	
 		$sentencia = $mysqli->prepare("CALL SP_ObtenerArchivoFase(?)");
 		$sentencia->bind_param('s', $idFase);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function ContenidoPrincipal($opcion){
 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_Principal(?)");
 		$sentencia->bind_param('s', $opcion);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function HistorialUsuario($opcion){
 		$idUsuario = GetIdUsuario();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_HistorialUsuario(?,?)");
 		$sentencia->bind_param('ss', $idUsuario, $opcion);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					if($array[0]->Respuesta == "0"){
 						echo'<script type="text/javascript">
 							 alert("'.$array[0]->Mensaje.'");
 							 </script>';
 					}
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function HistorialInstructor($opcion){
 		$idUsuario = GetIdUsuario();
 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_HistorialInstructor(?,?)");
 		$sentencia->bind_param('ss', $idUsuario, $opcion);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					if($array[0]->Respuesta == "0"){
 						echo'<script type="text/javascript">
 							 alert("'.$array[0]->Mensaje.'");
 							 </script>';
 					}
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function PreguntaCalificado(){
 		$idUsuario = GetIdUsuario();
 		$idCurso = GetClaveCurso();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_CursoCalificado(?,?)");
 		$sentencia->bind_param('ss', $idUsuario, $idCurso);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					if ($array[0]->Respuesta == "0"){
 						return false;
 					}else{
 						return true;
 					}
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function CalificarCurso($comentario, $puntuacion){
 		$idUsuario = GetIdUsuario();
 		$idCurso = GetClaveCurso();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_CalificarCurso(?,?,?,?)");
 		$sentencia->bind_param('ssss', $idUsuario, $idCurso, $comentario, $puntuacion);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					if ($array[0]->Respuesta == "1"){
 						echo'<script type="text/javascript">
 							 alert("'.$array[0]->Mensaje.'");
 							 </script>';
 						header("Location: vista-fases.php");
 					}
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function GrupoChat(){
 		$opcion = 0;
 		if(GetRolUsuario()=="Alumno"){
 			$opcion = 1;
 		}
 		$idUsuario = GetIdUsuario();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_ListaMensajes(?,?)");
 		$sentencia->bind_param('ss', $idUsuario, $opcion);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function SubirDuda($idUsuario, $idCurso, $mensaje){
 		$rol = 0;
 		if(GetRolUsuario()=="Alumno"){
 			$rol = 1;
 		}

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_NuevoMensaje(?,?,?,?)");
 		$sentencia->bind_param('ssss', $idUsuario, $idCurso, $mensaje, $rol);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					if ($array[0]->Resultado == "1"){
 						echo'<script type="text/javascript">
 							 alert("Duda realizada con exito!");
 							 </script>';
 							 $string = "Location: curso.php?Curso=".GetClaveCurso();
 						header($string);
 					}
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function ListaAlumnos(){
 	
 		$curso = GetClaveCurso();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_ListaAlumnos(?)");
 		$sentencia->bind_param('s', $curso);
 		$sentencia->execute();
 		
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					return $array;
 				}else{
 					echo "error en la llamada";
 				}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 	function CambiarFotoUsuario($ruta){
 		$idAlumno = GetIdUsuario();

 		$var = new Conexion;
 		$mysqli = $var->getConexion();
 		
 		$sentencia = $mysqli->prepare("CALL SP_UsuarioNuevaFoto(?,?)");
 		$sentencia->bind_param('ss', $idAlumno, $ruta);
 		$sentencia->execute();
 		if($sentencia){
 			$resultado = $sentencia->get_result();
 					while( $r = $resultado->fetch_assoc()) {
 					                $rows[] = $r;
 					         }                    
 					$ValorRegresado = json_encode($rows,JSON_UNESCAPED_UNICODE);
 					$array = (array)json_decode($ValorRegresado);
 					
 					if($array[0]->Respuesta == "1"){
 						SetFotoUsuario($ruta);
 						echo'<script type="text/javascript">
 							 alert("'.$array[0]->Mensaje.'");
 							 </script>';
 						SetFechaModificacion($array[0]->FechaModificacion);
 						header("Location: configuracion.php");
 					}
 		}else{
 					echo "error en la llamada";
 		}
 		
 		$sentencia->close();
 		$var->CerrarConexion();
 	}
 ?>
