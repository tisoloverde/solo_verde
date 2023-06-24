<?php
  // //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0) {
    $rutPersonal = $_POST['rutPersonal'];
    $codCECO = $_POST['codCECO'];
    $fecIni = $_POST['fecIni'];
    $fecFin = $_POST['fecFin'];

    $lstRUTS = [];
    $lstRUTS_REEMPLAZADOS = [];
    $comps = consultaListaUsuariosTemporals_Comp($codCECO, $fecIni);
    foreach ($comps as $cm) {
      $lstRUTS[] = $cm["RUT"];
      $lstRUTS_REEMPLAZADOS[] = $cm["RUT_REEMPLAZADO"];
    }

    $row = consultaListaUsuariosTemporals($codCECO, $fecIni, $fecFin);

    $res = [];
    foreach ($row as $item) {
      if (in_array($item['RUT'], $lstRUTS)) {
        if (in_array($rutPersonal, $lstRUTS_REEMPLAZADOS)) {
          $res[] = $item;
        }
      } else {
        $res[] = $item;
      }
    }

    if(is_array($res)) {
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($res),
        "iTotalDisplayRecords" => count($res),
        "aaData"=>$res,
        "row" => $row,
        "aux" => $lstRUTS,
        "aux2" => $lstRUTS_REEMPLAZADOS,
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
