<?php
	// Conectando a la base de datos
	function conectar_auto(){
		$user = "tumundoa_sistema";
		$pass = "{1%3cbu-9PXJ";
		$db = "tumundoa_operaciones";
		$host = "200.63.97.63";

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
