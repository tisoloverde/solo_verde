<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
    $rut = $_GET['rutUser'];
    $path = $_GET['path'];
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];

    $row = datosAvanceMetasPractica($rut,$path,$mes,$ano);

    if(is_array($row))
    {
        echo json_encode($row);
    }
    else{
        echo json_encode([]);
    }
	}
	else{
		echo "Sin datos";
	}
?>
