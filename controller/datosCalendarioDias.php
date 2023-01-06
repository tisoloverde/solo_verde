<?php
require('../model/consultas.php');
session_start();

$anho = $_POST['anho'];
$nsemana = $_POST['nsemana'];

$row = consultaListaDiasPorSemana($anho, $nsemana);
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

?>