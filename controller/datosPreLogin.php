<?php
  	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) >= 0){
		$rut = $_POST['rut'];
		$pass = $_POST['pass'];
		$url = $_POST['url'];
		$gc = $_POST['gc'];

		$row = checkUsuario($rut, md5($pass));

		if(is_array($row))
    {
				$_SESSION['rutUser'] = $rut;
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
