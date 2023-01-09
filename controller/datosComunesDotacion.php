<?php
require('../model/consultas.php');
session_start();

$pofs = consultaListaPersonalOfertados();
$fams = consultaListaFamilias();
$crgman = consultaListaCargoMandante();
$refs1 = consultaListaReferencia1();
$refs2 = consultaListaReferencia2();

$results = [
  "sEcho" => 1,
  "iTotalRecords" => 0,
  "iTotalDisplayRecords" => 0,
  "aaData" => [
    "personalOfertado" => $pofs,
    "familia" => $fams,
    "cargoMandante" => $crgman,
    "referencia1" => $refs1,
    "referencia2" => $refs2,
  ],
];

echo json_encode($results);
?>