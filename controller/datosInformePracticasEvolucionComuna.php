<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
    $rut = '';
		if (array_key_exists('rutUser', $_SESSION)) {
			$rut = $_SESSION['rutUser'];
		}
		$path = $_POST['path'];
    $inicio = $_POST['inicio'];
    $fin = $_POST['fin'];
    $auditoria = $_POST['auditoria'];
    $servicio = $_POST['servicio'];

    //Pendiente
    $jefatura = $_POST['jefatura'];
    $personal = $_POST['personal'];
    $comuna = $_POST['comuna'];
    $servicioPro = $_POST['servicioPro'];
    $clientePro = $_POST['clientePro'];
    $actividadPro = $_POST['actividadPro'];

    $row = consultaInformePracticasEvolucionComuna($rut,$path,$inicio,$fin,$auditoria,$servicio,$jefatura,$personal,$comuna,$servicioPro,$clientePro,$actividadPro);

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
