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
      $daysPlanilla = $item['DIAS_PLANILLA'];
      $he50 = $item['HE50'] ?? 'null';
      $he100 = $item['HE100'] ?? 'null';
      $atraso = $item['ATRASO'] ?? 'null';

      foreach ($daysPlanilla as $day) {
        actualizarSemanaPlanilla(
          $idPersonal, $idCargoGenericoUnificadoB, $idReferencia2B,
          $day['id'], $day['fecha'],
          $he50, $he100, $atraso, $rut
        );
        $res[] = [
          "idPersonal" => $idPersonal,
          "idCargoGenericoUnificadoB" => $idCargoGenericoUnificadoB,
          "idReferencia2B" => $idReferencia2B,
          "idPersonalEstadoConcepto" => $day['id'],
          "fecha" => $day['fecha'],
          "he50" => $he50,
          "he100" => $he100,
          "atraso" => $atraso,
          "rutUsuario" => $rut,
        ];
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