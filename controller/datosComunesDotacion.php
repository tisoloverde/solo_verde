<?php
require('../model/consultas.php');
session_start();

$pofs = consultaListaPersonalOfertados();

$results = [
  "sEcho" => 1,
  "iTotalRecords" => 0,
  "iTotalDisplayRecords" => 0,
  "aaData" => [
    "personalOfertado" => $pofs,
  ],
];

echo json_encode($results);
?>