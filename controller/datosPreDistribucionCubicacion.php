<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $idobra = $_POST['idobra'];
        $idcubicacion = $_POST['idcubicacion'];

        $row = datosPreDistribucionCubicacion($idobra,$idcubicacion);

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
          $results = array(
              "sEcho" => 1,
              "iTotalRecords" => count([]),
              "iTotalDisplayRecords" => count([]),
              "aaData"=>[]
          );
          echo json_encode($results);
        }
	}
	else{
		echo "Sin datos";
	}
?>
