<?php
  require('../model/consultas.php');
  session_start();

	// if(count($_POST) >= 0){
    $idAuditoria = $_GET['idAuditoria'];
    $row = listadoFormularioEstructuras($idAuditoria);

    if(is_array($row)) {
      $results = array(
        "success" => true,
        "data" => $row
      );
      echo json_encode($results);
    } else {
      $results = array(
        "success" => true,
        "data" => []
      );
      echo json_encode($results);
    }
	/*} else{
		echo "Sin datos";
	}*/
?>
