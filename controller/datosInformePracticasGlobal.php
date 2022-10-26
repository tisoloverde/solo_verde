<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
    $rut = '';
		if (array_key_exists('rutUser', $_SESSION)) {
			$rut = $_SESSION['rutUser'];
		}
		$path = $_POST['path'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $semana = $_POST['semana'];
    $auditoria = $_POST['auditoria'];
    $servicio = $_POST['servicio'];

    $row = consultaInformePracticasGlobal($rut,$path,$mes,$ano,$semana,$auditoria,$servicio);

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
