<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();

	if(count($_POST) > 0){
		$id_Sucursal = $_POST['idSucursal'];

		$row = sucursalPersonal($id_Sucursal);

		if(is_array($row)){
			echo $row['IDPERSONAL'];
		}
		else{
			echo "Sin datos";
		}
}
else{
	echo "Sin datos";
}
?>