<?php 

	session_start();
	//SET
	function SetLoggeo($estado){
		$_SESSION['Loggeo'] = $estado;
	}
	function SetNombreUsuario($nombre){
		$_SESSION['Usuario'] = $nombre;
	}
	function SetCorreoUsuario($correo){
		$_SESSION['CorreoUsuario'] = $correo;
	}
	function SetFotoUsuario($foto){
		$_SESSION['FotoUsuario'] = $foto;
	}
	function SetFotoUsuarioExtension($extension){
		$_SESSION['FotoUsuarioExtension'] = $extension;
	}
	function SetRolUsuario($rol){
		$_SESSION['RolUsuario'] = $rol;
	}
	function SetFechaAlta($fecha){
		$_SESSION['UsuarioAlta'] = $fecha;
	}
	function SetFechaModificacion($fecha){
		$_SESSION['UsuarioModificacion'] = $fecha;
	}
	function SetIdUsuario($id){
		$_SESSION['IdUsuario'] = $id;
	}
	function SetClaveCurso($idCurso){
		$_SESSION['IdCurso'] = $idCurso;
	}
	function SetIdFase($id){
		$_SESSION['CursoFaseId'] = $id;
	}
	function SetCantidadFase($cantidad){
		$_SESSION['CursoFase'] = $cantidad;
	}


	//GET
	function GetLoggeo(){
		if (isset($_SESSION['Loggeo']) != null) {
			return $_SESSION['Loggeo'];
		}else{
			return "0";
		}
	}
	function GetNombreUsuario(){
		if(isset($_SESSION['Usuario'])!= null){
			return $_SESSION['Usuario'];
		}else{
			return "0";
		}
		
	}
	function GetCorreoUsuario(){
		return $_SESSION['CorreoUsuario'];
	}
	function GetFotoUsuario(){
		return $_SESSION['FotoUsuario'];
	}
	function GetFotoUsuarioExtension(){
		return $_SESSION['FotoUsuarioExtension'];
	}
	function GetRolUsuario(){
		if(isset($_SESSION['RolUsuario']) != null){
			return $_SESSION['RolUsuario'];
		}else{
			return "0";
		}	
	}
	function GetFechaAlta(){
		return $_SESSION['UsuarioAlta'];
	}
	function GetFechaModificacion(){
		return $_SESSION['UsuarioModificacion'];
	}
	function GetIdUsuario(){
		if(isset($_SESSION['IdUsuario']) != null){
			return $_SESSION['IdUsuario'];
		}else{
			return "0";
		}
		
	}
	function GetClaveCurso(){
		return $_SESSION['IdCurso'];
	}
	function GetIdFase(){
		return $_SESSION['CursoFaseId'];
	}
	function GetCantidadFase(){
		return $_SESSION['CursoFase'];
	}


	function AumentarContadorFase(){
		$var = 1 + $_SESSION['CursoFase'];
		$_SESSION['CursoFase'] = $var;
	}
	function GetRutaFisica(){
		$ruta = "uploads/";
		return $ruta;
	}

	function CerrarSesion(){
		session_destroy();
		header("Location: index.php");
	}
 ?>