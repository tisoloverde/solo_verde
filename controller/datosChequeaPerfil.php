<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$nombrePerfil = trim($_POST['nombrePerfil']);

		$row = chequeaPerfil($nombrePerfil);

		if(is_array($row)){
			echo $row['IDPERFIL'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>
