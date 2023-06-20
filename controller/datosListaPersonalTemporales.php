<?php
  // //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0) {
    $codCECO = $_POST['codCECO'];
    $reemplazosYaAsignados = $_POST['reemplazosYaAsignados'];

    $row = consultaListaUsuariosTemporals($codCECO);

    $res = [];
    foreach ($row as $item) {
      // if (!in_array($item['RUT'], $reemplazosYaAsignados)) {
        $res[] = $item;
      // }
    }

    if(is_array($res)) {
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($res),
        "iTotalDisplayRecords" => count($res),
        "aaData"=>$res
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
