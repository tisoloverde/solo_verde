<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $idz = $_POST['idObras'];

        if (strpos($idz, '/') !== false) {
            $idObras = explode(" / ",$idz)[0];
            $idObras2 = explode(" / ",$idz)[1];
            $row = datosCaratulaObras2($idObras,$idObras2);
        }else{
          $row = datosCaratulaObras($idz);
        }

        if(is_array($row))
        {
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($row),
                "iTotalDisplayRecords" => count($row),
                "aaData"=>$row
            );
            echo json_encode($results);
        }
        else{
            echo "Sin datos";
        }
	}
	else{
		echo "Sin datos";
	}
?>
