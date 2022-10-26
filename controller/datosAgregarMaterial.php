<?php
  //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_GET) >= 0){
    $idAgregarMat = $_GET['idAgregarMat'];
    $tipo = $_GET['tipo'];

    if($tipo == "Anticipo"){
        $row = datosAgregarMaterialAnticipo($idAgregarMat);
    }else{
        $row = datosAgregarMaterialPedido($idAgregarMat);
    }

    if(is_array($row))
    {
        $results = array(
          "success" => true,
          "data" => $row
        );
        echo json_encode($results);
    }
    else{
        $results = array(
          "success" => true,
          "data" => []
        );
        echo json_encode($results);
    }
	}
	else{
		echo "Sin datos";
	}
?>
