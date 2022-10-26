<?php
	require('conexion_api.php');
	session_start();

	// Conectando a la base de datos
	function conectar(){
		if (array_key_exists('userBD', $_SESSION) && $_SESSION['userBD'] !== NULL) {
			$user = $_SESSION['userBD'];
			$pass = $_SESSION['passBD'];
			$db = $_SESSION['dbBD'];
			$host = $_SESSION['hostBD'];
		}
		else{
			$row = datosHost($_SERVER['SERVER_NAME']);

			$_SESSION['userBD'] = $row[0]['user'];
			$_SESSION['passBD'] = $row[0]['pass'];
			$_SESSION['dbBD'] = $row[0]['db'];
			$_SESSION['hostBD'] = $row[0]['host'];
			$_SESSION['idEmpresaBD'] = $row[0]['idEmpresa'];

			$user = $_SESSION['userBD'];
			$pass = $_SESSION['passBD'];
			$db = $_SESSION['dbBD'];
			$host = $_SESSION['hostBD'];
		}

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
