<?php
	// Conectando a la base de datos
	function conectar_api(){
		//GCP - Desarrollo
		// $user = openssl_decrypt($_SERVER['DB_USER_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		// $pass = openssl_decrypt($_SERVER['DB_PASS_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		// $db = "GENERICA";
		// $host = openssl_decrypt($_SERVER['DB_HOST_QA'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);

		$_SERVER['DB_HOST'] = 'GfD5FyT5IaW/yfUvHs0leg==';
		$_SERVER['DB_USER'] = 'DF918ru9PmuGsp1Num4j9Q==';
		$_SERVER['DB_PASS'] = 'JSciPp8ebWHm/6RcO4gfioauF+no7qcox395gz/gK7c=';
		$_SERVER['DB_CLAVE_EC'] = 'As233@sZ&eibhQZ#mIkV';
				
		// Producción
		$user = openssl_decrypt($_SERVER['DB_USER'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$pass = openssl_decrypt($_SERVER['DB_PASS'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);
		$db = "GENERICA";
		$host = openssl_decrypt($_SERVER['DB_HOST'], 'aes-256-cbc', $_SERVER['DB_CLAVE_EC'], 0, $_SERVER['DB_CLAVE_EC']);

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
