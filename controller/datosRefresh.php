<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) == 0){
		if (array_key_exists('token_app', $_COOKIE)) {
			$row = checkUsuarioSinPassApp($_COOKIE['token_app']);
			if(is_array($row)){
				// $token = md5($_SESSION['rutUser'] . rand());
				// actualizaTokenLogin($_SESSION['rutUser'], $token);
			}
			else{
				$row = checkUsuarioSinPass($_COOKIE['tk_w_o']);
			}
		}
		else{
			$row = checkUsuarioSinPass($_COOKIE['tk_w_o']);
		}
		$_SESSION['rutUser'] = $row['RUT'];

		if(is_array($row))
    {
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($row),
            "iTotalDisplayRecords" => count($row),
            "aaData"=>$row
        );
        echo json_encode($results);
    }
    else{
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData"=>[]
        );
        echo json_encode($results);
    }
	}
	else{
		echo "Sin datos";
	}
?>
