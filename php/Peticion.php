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

		case 'Principal':
			Principal();
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

	function Principal(){

		$var = new Conexion;
		$mysqli = $var->getConexion();

		$sentencia = $mysqli->prepare("CALL SP_Principal()");
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
