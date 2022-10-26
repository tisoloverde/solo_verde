<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$marca = $_POST['marca'];
        $modelo = $_POST['modelo'];

		$row = chequeaMarcaModelo($marca, $modelo);

		if(is_array($row)){
			echo $row['IDPATENTE_MARCAMODELO'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>