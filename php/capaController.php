<?php 

	class Conexion{

		private $mysqli;
		private $databasehost = "127.0.0.1";	
		private $databaseuser = "root";
		private $databasepass = "root";
		private $databasename = "bdm_proyecto";

		public function __construct(){
			try {
				$this->mysqli = new mysqli( $this->databasehost, $this->databaseuser, $this->databasepass, $this->databasename, 3306);
				} catch (Exception $e) {
				echo "Error en conexion con la base de datos";
				}
			}

		public function getConexion(){
			return $this->mysqli;
		}

		public function CerrarConexion(){
			$this->mysqli->close();
		}

	} //cierre de clase

 ?>