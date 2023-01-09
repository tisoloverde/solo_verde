<?php
  require('../model/consultas.php');
  session_start();

  $news = [
    "dotacionIds" => [],
    "periodoIds" => [],
  ];

  $res = [];
  if (count($_POST) > 0) {
    $dataAdd = $_POST['dataAdd'];
    $dataUpd = $_POST['dataUpd'];

    foreach ($dataAdd as $item) {
      $periodo = $item['PERIODO'];
      $res[] = ingresarDotacionPeriodo(
        $item['DEFINICION_ESTRUCTURA_OPERACION'],
        $item['IDPERSONAL_OFERTADOS'] ?? 'null',
        $item['IDCARGO_MANDANTE'] ?? 'null',
        $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] ?? 'null',
        $item['IDREFERENCIA1'] ?? 'null',
        $item['IDREFERENCIA2'] ?? 'null',
        $periodo['ANHO'],
        $periodo['ENERO'], $periodo['FEBRERO'], $periodo['MARZO'], $periodo['ABRIL'], $periodo['MAYO'], $periodo['JUNIO'], $periodo['JULIO'], $periodo['AGOSTO'], $periodo['SETIEMBRE'], $periodo['OCTUBRE'], $periodo['NOVIEMBRE'], $periodo['DICIEMBRE']
      );
    }

    foreach ($dataUpd as $item) {
      $periodo = $item['PERIODO'];
      actualizarDotacionPeriodo(
        $item['IDDOTACION'] ?? 'null',
        $item['IDPERSONAL_OFERTADOS'] ?? 'null',
        $item['IDCARGO_MANDANTE'] ?? 'null',
        $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] ?? 'null',
        $item['IDREFERENCIA1'] ?? 'null',
        $item['IDREFERENCIA2'] ?? 'null',
        $periodo['ENERO'], $periodo['FEBRERO'], $periodo['MARZO'], $periodo['ABRIL'], $periodo['MAYO'], $periodo['JUNIO'], $periodo['JULIO'], $periodo['AGOSTO'], $periodo['SETIEMBRE'], $periodo['OCTUBRE'], $periodo['NOVIEMBRE'], $periodo['DICIEMBRE']
      );
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => [],
      "res" => $res,
    ];
    echo json_encode($results);
  } else {
    echo "Sin datos";
  }
?>