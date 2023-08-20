<?php
	require('conexion_api.php');
	session_start();

	// Conectando a la base de datos
	function conectar(){
		// GCP - Desarrollo
		$user = openssl_decrypt($_SERVER['DB_USER_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$pass = openssl_decrypt($_SERVER['DB_PASS_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$db = "SOLO_VERDE";
		$host = openssl_decrypt($_SERVER['DB_HOST_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);

		// Producción
		// $user = $_SERVER['DB_USER'];
		// $pass = $_SERVER['DB_PASS'];
		// $db = "SOLO_VERDE";
		// $host = $_SERVER['DB_HOST'];

		mysqli_report(MYSQLI_REPORT_STRICT);
		try
		{
			$mysqli = new mysqli($host, $user, $pass, $db, 3306);
			if ($mysqli->connect_errno) {
		   		echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
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