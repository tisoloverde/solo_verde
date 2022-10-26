<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $datos  = $_POST['datos'];
    $idSolMatPed = $_POST['idSolMatPed'];

    $datos1 = json_decode($datos, true);
    foreach ($datos1 as $value){
        $id = $value['id'];
        $row = ingresaPedirMaterialesObrasOt($id,$idSolMatPed);
    }

    if ($row != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
