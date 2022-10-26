<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$nombre = $_POST['nombre'];
        $licencia = $_POST['licencia'];

		$row = chequeaTipoVehiculo($nombre, $licencia);

		if(is_array($row)){
			echo $row['IDPATENTE_TIPOVEHICULO'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
