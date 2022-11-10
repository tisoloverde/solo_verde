<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $last_id_dotacion = consultaLastIDDotacion();

  $row = consultaListaCentrosDeCosto();

  if (is_array($row)) {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "idLastDotacion" => $last_id_dotacion[0]['LAST_ID'],
      "aaData" => $row,
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