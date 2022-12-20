<?php
require('../model/consultas.php');
session_start();

$cons = consultaListaPersonalEstadoConcepto();

$results = [
  "sEcho" => 1,
  "iTotalRecords" => 0,
  "iTotalDisplayRecords" => 0,
  "aaData" => [
    "estadoConcepto" => $cons,
  ],
];

echo json_encode($results);
?>