<?php
  //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $datos  = $_POST['datos'];
    $folio = $_POST['folio'];

    $datos1 = json_decode($datos, true);
    foreach ($datos1 as $value){
        $id = $value['id'];
        $bodega = $value['bodega'];
        $row = estadoPreparadoSolicitudMateriales($id,$folio,$bodega);
    }

    $rowEstatus = estadosMaterialesEnAnticipo($folio);

    $cantidad = 0;
    $idHijo = 0;
    for($i = 0; $i < count($rowEstatus); $i++){
      if($i == 0){
        $idHijo = $rowEstatus[$i]['IDOBRA_SOL_MAT_ESTADO'];
      }
      $cantidad++;
      if($cantidad == 2){
        break;
      }
    }

    $rowActAnt = actualizaEstadoAnticipo($folio, $cantidad, $idHijo);

    if ($row != "Error" && $rowActAnt != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
