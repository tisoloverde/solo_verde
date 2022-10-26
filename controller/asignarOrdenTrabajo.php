<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';
    $row2 = '';
    $datos  = $_POST['datos'];
    $otAsignar = $_POST['otAsignar'];

    $datos1 = json_decode($datos, true);
    foreach ($datos1 as $value){
        $id = $value['id'];
        $row = eliminarCubicaionObra($id);   
        $row2 = asignarOrdenTrabajo($id,$otAsignar);   
    }   

    if ($row2 != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
