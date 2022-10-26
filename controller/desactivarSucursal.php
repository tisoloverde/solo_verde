<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) > 0){
    $id_Sucursal = $_POST['idSucursal'];
    $estado = $_POST['estado'];
    if ($estado == "Activo"){
      $nuevoEstado = 'Desactivado';
    }
    else {
      $nuevoEstado = 'Activo';
    }

    $row = desactivarSucursal($id_Sucursal, $nuevoEstado);


    if($row == "Ok")
    {
      echo "Ok";
    }
    else{
      echo "Sin datos";
    }
	}
	else{
		echo "Sin datos";
	}
?>
