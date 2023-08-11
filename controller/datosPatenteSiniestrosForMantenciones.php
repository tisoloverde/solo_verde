<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $patente = $_POST['patente'];
        $row = consultaPatenteSiniestrosFormMantenciones($patente);

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
