<?php
  require('../model/consultas.php');
  session_start();

  if (count($_POST) > 0) {
    $row = "";

    $data = $_POST['data'];
    foreach ($data as $item) {
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

    if ($row != "Error" ) {
      echo "Ok";
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>