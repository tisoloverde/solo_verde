<?php
require('../model/consultas.php');
session_start();

$pofs = consultaListaPersonalOfertados();
$fams = consultaListaFamilias();
$crgman = consultaListaCargoMandante();

$results = [
  "sEcho" => 1,
  "iTotalRecords" => 0,
  "iTotalDisplayRecords" => 0,
  "aaData" => [
    "personalOfertado" => $pofs,
    "familia" => $fams,
    "cargoMandante" => $crgman,
  ],
];

echo json_encode($results);
?>