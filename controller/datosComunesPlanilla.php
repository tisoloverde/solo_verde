<?php
require('../model/consultas.php');
session_start();

$cons = consultaListaPersonalEstadoConcepto();
$crgman = consultaListaCargoMandante();
$refs2 = consultaListaReferencia2();

$results = [
  "sEcho" => 1,
  "iTotalRecords" => 0,
  "iTotalDisplayRecords" => 0,
  "aaData" => [
    "estadoConcepto" => $cons,
    "cargoGenericoUnificado" => $crgman,
    "referencia2" => $refs2,
  ],
];

echo json_encode($results);
?>