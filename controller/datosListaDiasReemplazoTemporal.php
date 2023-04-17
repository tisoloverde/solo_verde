<?php
  // //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0) {
    $idPersonal = $_POST['idPersonal'];
    $rutPersonal = $_POST['rutPersonal'];
    $dias = $_POST['dias'];
    $fecIni = $_POST['fecIni'];
    $fecFin = $_POST['fecFin'];
    
    $fechaTermino = consultaFechaDSR($idPersonal);
    $res = consultaListaDiasReemplazoModal($idPersonal, $fecIni, $fecFin);

    $row = [];
    foreach ($dias as $dia) {
      if (isset($fechaTermino[0]['FECHA_TERMINO'])) {
        if ($dia['fecha'] >= $fechaTermino[0]['FECHA_TERMINO']) {

          $found;
          foreach ($res as $item) {
            if ($dia['fecha'] == $item['FECHA']) {
              $found = $item;
            }
          }

          if ($dia['fecha'] == $found['FECHA']) {
            $row[] = array(
              "FECHA_INICIO" => $dia['fecha'],
              "RUT" => $rutPersonal,
              "REEMPLAZO" => $found['REEMPLAZO'],
              "RUT_REEMPLAZO" => $found['DNI_REEMPLAZO'],
            );
          } else {
            $row[] = array(
              "FECHA_INICIO" => $dia['fecha'],
              "RUT" => $rutPersonal,
              "REEMPLAZO" => null,
              "RUT_REEMPLAZO" => null,
            );
          }
        }
      }
    }
    
    if(is_array($row)) {
      $results = array(
        "res" => $res,
        "fechaTermino" => $fechaTermino,
        "sEcho" => 1,
        "iTotalRecords" => count($row),
        "iTotalDisplayRecords" => count($row),
        "aaData"=>$row
      );
      echo json_encode($results);
    } else {
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        "aaData"=>[]
      );
      echo json_encode($results);
    }
	} else{
		echo "Sin datos";
	}
?>
