<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        /*$rut = '';
		if (array_key_exists('rutUser', $_SESSION)) {
			$rut = $_SESSION['rutUser'];
		}
		$path = $_POST['path'];*/

        $row = consultaRutForMantencion();

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
                "iTotalRecords" => 0,
                "iTotalDisplayRecords" => 0,
                "aaData"=>[]
            );
            echo json_encode($results);
        }
	}
	else{
		echo "Sin datos";
	}
?>