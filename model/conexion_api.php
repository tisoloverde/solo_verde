<?php
	// Conectando a la base de datos
	function conectar_api(){
		//GCP - Desarrollo
		// $user = $_SERVER['DB_USER_QA'];
		// $pass = $_SERVER['DB_PASS_QA'];
		// $db = "GENERICA";
		// $host = $_SERVER['DB_HOST_QA'];

		// Producción
		$user = $_SERVER['DB_USER'];
		$pass = $_SERVER['DB_PASS'];
		$db = "GENERICA";
		$host = $_SERVER['DB_HOST'];

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
