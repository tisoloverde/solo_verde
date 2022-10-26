<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$sucursal = $_POST['sucursalIngreso'];

		$row = chequeaSucursal($sucursal);

		if(is_array($row)){
			echo $row['IDSUCURSAL'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
