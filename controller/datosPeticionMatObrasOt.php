<?php
  //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_GET) >= 0){
    $idOt = $_GET['idOt'];

    $row = datosPeticionMatObrasOt($idOt);

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
