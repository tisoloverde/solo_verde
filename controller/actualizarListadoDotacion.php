<?php
  require('../model/consultas.php');
  session_start();

  $news = [
    "dotacionIds" => [],
    "periodoIds" => [],
  ];

  if (count($_POST) > 0) {
    $dataAdd = $_POST['dataAdd'];
    $dataUpd = $_POST['dataUpd'];
    foreach ($dataAdd as $item) {
      $periodo = $item['PERIODO'];
      $res = ingresarDotacionPeriodo(
        $item['DEFINICION_ESTRUCTURA_OPERACION'],
        $item['IDPERSONAL_OFERTADOS'],
        $item['IDCARGO_MANDANTE'],
        $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'],
        $item['IDREFERENCIA2'],
        $periodo['ANHO'],
        $periodo['ENERO'], $periodo['FEBRERO'], $periodo['MARZO'], $periodo['ABRIL'], $periodo['MAYO'], $periodo['JUNIO'], $periodo['JULIO'], $periodo['AGOSTO'], $periodo['SETIEMBRE'], $periodo['OCTUBRE'], $periodo['NOVIEMBRE'], $periodo['DICIEMBRE']
      );
    }

    foreach ($dataUpd as $item) {
      $row = actualizarDotacion(
        $item['IDDOTACION'],
        $item['DEFINICION_ESTRUCTURA_OPERACION'],
        $item['IDPERSONAL_OFERTADOS'],
        $item['IDCARGO_MANDANTE'],
        $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'],
        $item['IDREFERENCIA2']
      );
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => $news,
    ];
    echo json_encode($results);
  } else {
    echo "Sin datos";
  }
?>