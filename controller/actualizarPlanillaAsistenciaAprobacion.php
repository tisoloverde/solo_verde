<?php
  require('../model/consultas.php');
  session_start();

  if (count($_POST) > 0) {
    $tipo = $_POST['tipo'];

    $codigoEstructuraOperacion = $_POST['codigoEstructuraOperacion'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFin = $_POST['fechaFin'];
    $rutCierreOAprobacion = $_SESSION['rutUser'];
    $estadoAprobacion = $_POST['estadoAprobacion'];

    $row;

    $resEstructuraOperacion = datosEstructuraOperacion($codigoEstructuraOperacion);
    $idEstructuraOperacion = $resEstructuraOperacion[0]['IDESTRUCTURA_OPERACION'];

    if ($tipo == 'cierre') {
      $row = cierrePersonalEstadoAprobacion(
        $idEstructuraOperacion,
        $fechaInicio,
        $fechaFin,
        $rutCierreOAprobacion
      );
    }
    if ($tipo == 'aprobacion') {
      $row = apruebaPersonalEstadoAprobacion(
        $idEstructuraOperacion,
        $fechaInicio,
        $fechaFin,
        $rutCierreOAprobacion,
        $estadoAprobacion
      );
    }

    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "aaData"=>$row
    );
    echo json_encode($results);
  } else {
    echo "Sin datos";
  }
?>