<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$rutAseguradora = $_POST['rutIngreso'];

		$row = chequeaRutAseguradora($rutAseguradora);

		if(is_array($row)){
			echo $row['IDPATENTE_ASEGURADORA'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>