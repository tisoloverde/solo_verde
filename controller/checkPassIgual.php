<?php
	// ini_set('display_errors', 'On');
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
	  $rut = '';
	  if (array_key_exists('rutUser', $_SESSION)) {
	    $rut = $_SESSION['rutUser'];
	  }
		$pass = $_POST['pass'];

    $row = consultaPass($rut, md5($pass));

		if($row[0] != '0'){
				echo "Igual";
    	}
    	else{
    		echo "Ok";
    	}
	}
	else{
		echo "Sin datos";
	}
?>
