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
      $days = $item['DIAS'];
      $daysPlanilla = $item['DIAS_PLANILLA'];

      /* Begin - Iniciar Semana */
      $resCont = validWeekForPersonal($idPersonal, $days[0], $days[count($days)-1]);
      $cont = (int) $resCont[0]['N'];
      if ($cont <= 0) {
        foreach ($days as $day) {
          iniciarSemanaPlanilla(
            $idPersonal,
            1,
            1,
            $idCargoGenericoUnificadoB,
            $idReferencia2B,
            $day,
            $rut
          );
        }
      }
      /* End - Iniciar Semana */

      /* Begin - Actualizar Semana */
      foreach ($daysPlanilla as $day) {
        actualizarSemanaPlanilla(
          $idPersonal,
          $idCargoGenericoUnificadoB,
          $idReferencia2B,
          $day['id'],
          $day['fecha'],
          $rut
        );
      }
      /* End - Actualizar Semana */
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