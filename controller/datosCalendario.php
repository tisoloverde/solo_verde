<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $row = [];
  switch ($_POST['type']) {
    case 'yyyy':
      $row = consultaListaAnhos();
      break;
    case 'mm';
      $row = consultaListaMesesPorAnho($_POST['anho']);
      break;
    case 'ss':
      $row = consultaListaSemanasPorMesesAnho($_POST['anho'], $_POST['mes']);
      break;
    case 'dd':
      $row = consultaListaDiasPorSemanaMesAnho($_POST['anho'], $_POST['mes'], $_POST['semana']);
      break;
    default:
      break;
  }

  if (is_array($row)) {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
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