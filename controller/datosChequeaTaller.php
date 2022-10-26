<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$rutTaller = $_POST['rutIngreso'];

		$row = chequeaTaller($rutTaller);

		if(is_array($row)){
			echo $row['IDPATENTE_TALLER'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
