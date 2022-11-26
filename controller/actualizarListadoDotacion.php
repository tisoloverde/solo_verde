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
      $news['dotacionIds'][] = ingresarDotacion(
        $item['DEFINICION_ESTRUCTURA_OPERACION'],
        $item['IDPERSONAL_OFERTADOS'],
        $item['IDCARGO_MANDANTE'],
        $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'],
        $item['IDREFERENCIA2']
      );
      $periodo = $item['PERIODO'];
      $news['periodoIds'][] = ingresaPeriodo(
        $periodo['ANHO'],
        $periodo['ENERO'], $periodo['FEBRERO'], $periodo['MARZO'], $periodo['ABRIL'], $periodo['MAYO'], $periodo['JUNIO'], $periodo['JULIO'], $periodo['AGOSTO'], $periodo['SETIEMBRE'], $periodo['OCTUBRE'], $periodo['NOVIEMBRE'], $periodo['DICIEMBRE']
      );
    }

    foreach ($dataUpd as $item) {
      $row = actualizarDotacion(
        $item['id'],
        $item['personalOfertado'],
        $item['cargoMandante'],
        $item['cargoGenericoUnificado'],
        $item['familia'],
        $item['jeasGeas'],
        $item['ref1'],
        $item['ref2'],
        $item['ene22'], $item['feb22'], $item['mar22'], $item['abr22'], $item['may22'], $item['jun22'], $item['jul22'], $item['ago22'], $item['set22'], $item['oct22'], $item['nov22'], $item['dic22']
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