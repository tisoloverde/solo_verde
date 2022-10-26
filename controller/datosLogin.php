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
				if($row['ESTADO'] === "Activo" && $row['LOGIN_2FA'] !== '1'){
					$token = md5($pass . $rut . rand());
					actualizaTokenLogin($rut, $token);
					$_SESSION['rutUser'] = $rut;
					setcookie("tk_w_o",$token,time()+300);
					$row['token'] = $token;
					if($gc == 1){
						$token_app = md5(rand());
						actualizaTokenApp($rut, $token_app);
						setcookie("token_app",$token_app,time()+15778800);
					}
				}
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
