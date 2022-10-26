<?php
	////ini_set('display_errors', 'On');
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$numeroTarjeta = $_POST['numero'];

		$row = chequeaTarjetaCombustible($numeroTarjeta);
		//var_dump($row);
		if(is_array($row)){
			echo $row['IDTARJETACOMBUSTIBLE'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
