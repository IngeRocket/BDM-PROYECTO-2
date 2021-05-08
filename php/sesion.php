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


	//GET
	function GetLoggeo(){
		return $_SESSION['Loggeo'];
	}
	function GetNombreUsuario(){
		return $_SESSION['Usuario'];
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
		return $_SESSION['RolUsuario'];
	}
	function GetFechaAlta(){
		return $_SESSION['UsuarioAlta'];
	}
	function GetFechaModificacion(){
		return $_SESSION['UsuarioModificacion'];
	}
	function GetIdUsuario(){
		return $_SESSION['IdUsuario'];
	}




	function CerrarSesion(){
		session_destroy();
		header("Location: index.php");
	}
 ?>