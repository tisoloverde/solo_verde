<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$rut = $_POST['rutIngreso'];

		$row = chequeaSubcontratista($rut);

		if(is_array($row)){
			echo $row['IDSUBCONTRATO'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
