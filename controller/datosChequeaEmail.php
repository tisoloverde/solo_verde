<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$email = $_POST['email'];

		$row = chequeaEmail($email);

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
