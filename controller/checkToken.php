<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) == 0){
		if (array_key_exists('token_app', $_COOKIE)) {
			$row = checkTokenApp($_COOKIE['token_app']);
			if($row !== NULL && $row !== "Error"){

			}
			else{
				$row = checkToken($_COOKIE['tk_w_o']);
			}
		}
		else{
			$row = checkToken($_COOKIE['tk_w_o']);
		}
		// var_dump($row);
		if($row !== NULL && $row !== "Error"){
			echo "TOKEN_SI";
		}
		else{
			borraTokenLogin($_SESSION['rutUser']);
			session_destroy();
			echo "TOKEN_NO";
		}
	}
	else{
		echo "Sin datos";
	}
?>
