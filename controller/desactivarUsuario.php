<?php
  //header('Access-Control-Allow-Origin: *');
  require('../model/consultas.php');
  session_start();

	if(count($_POST) > 0){
    $rutUsuario = $_POST['rutUsuario'];

    $row = desactivarUsuario($rutUsuario);

    // var_dump($row);

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
