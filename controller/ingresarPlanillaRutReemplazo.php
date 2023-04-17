<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = [];
    $lst = $_POST['lst'];
    foreach ($lst as $item) {
      $rut_personal = $item['rut_personal'];
      $rut_reemplazo = $item['rut_reemplazo'];
      $fecha = $item['fecha'];
      $row[] = ingresarPlanillaRutReemplazo(
        $rut_personal,
        $rut_reemplazo,
        $fecha
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