<!-- PASO AWS -->
<?php 

	class Conexion{

		private $mysqli;
		private $databasehost = "aws-bdm-db.cwotpk0fvwu5.us-west-2.rds.amazonaws.com";	
		private $databaseuser = "admin";
		private $databasepass = "IngeRocket00";
		private $databasename = "BDM_PROYECTO";

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