<?php
	include 'capaController.php';

	$action = $_POST['action'];

	switch ($action) {

		case 'Categoria':
			Categoria();
		break;

		case 'CursoCategoria':
			CursoCategoria();
		break;

		case 'Historial':
			Historial();
		break;
		case 'ResponderMensaje':
			ResponderMensaje();
		break;
	}

	function Categoria(){
		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_VerCategoria()");
		$sentencia->execute();
		
		$resultado = $sentencia->get_result();
				while( $r = $resultado->fetch_assoc()) {
				                $rows[] = $r;
				         }                    
				echo json_encode($rows,JSON_UNESCAPED_UNICODE); 
		$sentencia->close();
		$var->CerrarConexion();
	}
	
	function CursoCategoria(){
		$curso = $_POST['curso'];
		$categoria = $_POST['categoria'];

		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_CursoCategoria(?,?)");
		$sentencia->bind_param('ss', $curso, $categoria);
		$sentencia->execute();
		
		$resultado = $sentencia->get_result();
				while( $r = $resultado->fetch_assoc()) {
				                $rows[] = $r;
				         }                    
				echo json_encode($rows,JSON_UNESCAPED_UNICODE); 
		$sentencia->close();
		$var->CerrarConexion();
	}
	function Historial(){
		$curso = $_POST['curso'];
		$usuario = $_POST['alumno'];

		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_ConsultaChat(?,?)");
		$sentencia->bind_param('ss', $curso, $usuario);
		$sentencia->execute();
		
		$resultado = $sentencia->get_result();
				while( $r = $resultado->fetch_assoc()) {
				                $rows[] = $r;
				         }                    
				echo json_encode($rows,JSON_UNESCAPED_UNICODE); 
		$sentencia->close();
		$var->CerrarConexion();
	}
	function ResponderMensaje(){
		$curso = $_POST['curso'];
		$usuario = $_POST['alumno'];
		$mensaje = $_POST['mensaje'];
		$opcion = $_POST['opcion'];

		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_NuevoMensaje(?,?,?,?)");
		$sentencia->bind_param('ssss', $usuario, $curso, $mensaje, $opcion);
		$sentencia->execute();
		
		$resultado = $sentencia->get_result();
				while( $r = $resultado->fetch_assoc()) {
				                $rows[] = $r;
				         }                    
				echo json_encode($rows,JSON_UNESCAPED_UNICODE); 
		$sentencia->close();
		$var->CerrarConexion();
	}
?>
