<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = [];
    $lst = $_POST['lst'];
    foreach ($lst as $item) {
      $idPersonalEstado = $item['idPersonalEstado'];
      $rutReemplazo = $item['rutReemplazo'];
      $row[] = actualizarPlanillaRutReemplazo($idPersonalEstado, $rutReemplazo);
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