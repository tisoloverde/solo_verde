<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$rutUsuario = $_POST['rutIngreso'];

		$row = chequeaUsuario($rutUsuario);

		if(is_array($row)){
			echo $row['IDUSUARIO'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
