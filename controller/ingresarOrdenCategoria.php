<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $tipo = $_POST['tipo'];
    $idestructura= $_POST['idestructura'];
    $categoria = $_POST['categoria'];

    $row = insertarCategoriaOrden($tipo, $idestructura, $categoria);

    if($row == "Ok" )
    {
        echo "OK";
    }
    else{
        echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
