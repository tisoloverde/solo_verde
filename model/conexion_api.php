<?php
	// Conectando a la base de datos
	function conectar_api(){
		//GCP - Desarrollo
		// $user = openssl_decrypt($_SERVER['DB_USER_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		// $pass = openssl_decrypt($_SERVER['DB_PASS_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		// $db = "GENERICA";
		// $host = openssl_decrypt($_SERVER['DB_HOST_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);

		// Producción
		$user = openssl_decrypt($_SERVER['DB_USER'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$pass = openssl_decrypt($_SERVER['DB_PASS'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$db = "GENERICA";
		$host = openssl_decrypt($_SERVER['DB_HOST'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);

		// $user = "AppConnect";
		// $pass = "TCw4etVPjEcqTRkGOqG8";
		// $db = "SOLO_VERDE";
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
