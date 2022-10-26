<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $rutUser = $_SESSION['rutUser'];

        $row = consultaCalendar($_GET['start'],$_GET['end']);

        if(is_array($row))
        {
            echo json_encode($row);
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
