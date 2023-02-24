<?php
  // //ini_set('display_errors', 'On');
	require('../model/consultas.php');
  session_start();

  require_once 'gat/vendor/autoload.php';

  $ga = new PHPGangsta_GoogleAuthenticator();

  $secret = $_POST['secret'];

  $oneCode = $_POST['codigo'];

  // echo "Checking Code '$oneCode' and Secret '$secret'<br><br><br>";

  $checkResult = $ga->verifyCode($secret, $oneCode, 0);    // 2 = 2*30sec clock tolerance

  if ($checkResult) {
    $rut = $_POST['rut'];
		$pass = $_POST['pass'];
		$url = $_POST['url'];
		$gc = $_POST['gc'];

    $row = checkUsuario($rut, md5($pass));

    if(is_array($row))
    {
				if($row['ESTADO'] === "Activo" && $row['LOGIN_2FA'] === '1'){
					$token = md5($pass . $rut . rand());
					actualizaTokenLogin($rut, $token);
					$_SESSION['rutUser'] = $rut;
					setcookie("tk_w_o",$token,time()+900);
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
  } else {
    $results = array(
        "sEcho" => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        "aaData"=>[]
    );
    echo json_encode($results);
  }
?>
