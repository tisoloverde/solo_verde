<?php
  require('../model/consultas.php');
  session_start();

  if (count($_POST)) {
    $rut = $_SESSION['rutUser'];
    $dataUpd = $_POST['dataUpd'];

    $res = [];

    foreach ($dataUpd as $item) {
      $idPersonal = $item['IDPERSONAL'];
      $idCargoGenericoUnificadoB = $item['IDCARGO_GENERICO_UNIFICADO_B'];
      $idReferencia2B = $item['IDREFERENCIA2_B'];
      $daysPlanilla = (array)$item['DIAS_PLANILLA'];
      $fechaBase = $item['FECHA_BASE'];
      $he50 = $item['HE50'] ?? 'null';
      $he100 = $item['HE100'] ?? 'null';
      $atraso = $item['ATRASO'] ?? 'null';

      if (sizeof($daysPlanilla) > 0) {
        foreach ($daysPlanilla as $day) {
          $res[] = actualizarSemanaPlanilla(
            $idPersonal, $idCargoGenericoUnificadoB, $idReferencia2B,
            $day['id'], $day['fecha'],
            $he50, $he100, $atraso, $rut
          );
        }
      } else {
        $res[] = actualizarSemanaPlanillaBasic(
          $idPersonal, $idCargoGenericoUnificadoB, $idReferencia2B,
          $fechaBase,
          $he50, $he100, $atraso, $rut
        );
      }
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => $cont,
      "res" => $res,
    ];
    echo json_encode($results);
  } else {
    echo "Sin datos";
  }
?>