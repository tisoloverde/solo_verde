<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $last_id_dotacion = consultaLastIDDotacion();

  $idEmpresa = $_POST['idsubcontrato'];

  $row = consultaListaCentrosDeCosto();

  if (is_array($row)) {
    $res = [];
    if (strval($idEmpresa) != '0') {
      foreach ($row as $itm) {
        if (strval($itm['IDSUBCONTRATO']) == strval($idEmpresa)) {
          $res[] = $itm;
        }
      }
    } else {
      $res = $row;
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($res),
      "iTotalDisplayRecords" => count($res),
      "idLastDotacion" => $last_id_dotacion[0]['LAST_ID'],
      "aaData" => $res,
    ];
    echo json_encode($results);
  } else {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => [],
    ];
    echo json_encode($results);
  }
} else {
  echo "Sin datos";
}

?>