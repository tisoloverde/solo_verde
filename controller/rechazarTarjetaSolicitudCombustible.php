<?php
	//ini_set('display_errors', 'ON');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$row = '';

		$rutUser = $_SESSION['rutUser'];

        $idSolicitud = $_POST['idSolicitud'];
        $estado = $_POST['estado'];
        $montoValidado = $_POST['monto'];
        $observacionValidacion = $_POST['observacion'];
        
        $row = rechazarTarjetaSolicitudCombustible($idSolicitud, $estado, $montoValidado, $observacionValidacion, $rutUser);

    	if($row != "Error" ){
          echo "OK";
        }
        else{
            echo "Sin datos";
        }
	}
	else{
        echo "Sin datos";
    }

?>