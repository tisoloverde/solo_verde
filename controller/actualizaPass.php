<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');

	session_start();

	if(count($_POST) > 0){
		$rut = '';
		if (array_key_exists('rutUser', $_SESSION)) {
			$rut = $_SESSION['rutUser'];
		}
		$pass = $_POST['pass'];

    	$row = actualizaPass($rut, md5($pass));

    	if($row == "Ok")
    	{
				echo "Ok";
			}
			else{
				echo "Sin datos";
			}
		}
		else{
    		echo "Sin datos";
  	}
?>
