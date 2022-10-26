<?php
	// Conectando a la base de datos
	function conectar_api(){
		//QA - Desarrollo
		// $user = "AppConnect";
		// $pass = 'Dde**M!xevr#Eh$Xrmw3VLA';
		// $db = "EQUANS_GENERICA";
		// $host = "10.214.70.161";

		//Producción
		$user = "AppConnect";
		$pass = 'Dde**M!xevr#Eh$Xrmw3VLA';
		$db = "EQUANS_GENERICA";
		$host = "10.214.70.160";

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

	conectar_api();
?>
