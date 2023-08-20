<?php
	// Conectando a la base de datos
	function conectar_api(){
		//GCP - Desarrollo
		$user = $_ENV['DB_USER_QA'];
		$pass = $_ENV['DB_PASS_QA'];
		$db = "SOLO_VERDE";
		$host = $_ENV['DB_HOST_QA'];

		// Producción
		// $user = "AppConnect";
		// $pass = "TCw4etVPjEcqTRkGOqG8";
		// $db = "GENERICA";
		// $host = "10.0.0.8";

		mysqli_report(MYSQLI_REPORT_STRICT);
		try
		{
			$mysqli = new mysqli($host, $user, $pass, $db, 3306);
			if ($mysqli->connect_errno) {
		   		// echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
				return "No conectado";
			}
			else{
				$mysqli->set_charset("utf8");
				return $mysqli;
			}
		}
		catch(Exception $e){
			return "No conectado";
		}
	}
?>
