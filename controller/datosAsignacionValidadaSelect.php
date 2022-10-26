<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $rut = '';
        $rutPer = $_POST['rut'];
        $patente = $_POST['patente'];
        $row = consultaAsignacionValidadaSeleccionada($rutPer, $patente);

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
