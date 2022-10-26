<?php
	//ini_set('display_errors', 'ON');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$row = '';

		$rutUser = $_SESSION['rutUser'];

 	 	$nombre = $_POST['nombre'];
 	  $patente = $_POST['patente'];
  	$tarjeta = $_POST['tarjeta'];
  	$monto = $_POST['monto'];
  	$observacion = $_POST['observacion'];
  	$producto = $_POST['producto'];
  	$tipo = $_POST['tipo'];
  	$bodega = $_POST['bodega'];
  	$rutPersonal = $_POST['rutPersonal'];

    $row = ingresaTarjetaDevolucion( $tarjeta, $nombre, $rutUser,$patente, $monto, $observacion, $bodega, $producto, $tipo, $rutPersonal);

		if($row != "Error" )
    {
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
