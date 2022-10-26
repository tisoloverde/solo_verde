<?php
  //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_GET) >= 0){
    $idz = $_GET['idobra'];

    if (strpos($idz,' / ') !== false) {
        $idobra = explode(" / ",$idz)[0];
        $idobra2 = explode(" / ",$idz)[1];
        $row = datosDetalleCubObra2($idobra,$idobra2);
    }else{
      $row = datosDetalleCubObra($idz);
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
