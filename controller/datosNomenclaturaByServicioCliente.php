<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $idServicio = $_POST['idServicio'];
        $idCliente = $_POST['idCliente'];
        $idActividad = $_POST['idActividad'];
        $idSociedad = $_POST['idSociedad'];
        $row = consultaNomenclaturaByServicioCliente($idServicio, $idCliente, $idActividad, $idSociedad);
        if($row != "Error"){
            echo json_encode($row);
        }else{
            echo "Error";
        }
	}
	else{
		echo "Error";
	}
?>
