<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $tipo = $_POST['tipo'];
    $idestructura= $_POST['idestructura'];
    $idclasificacion = $_POST['idclasificacion'];
    $minutos = $_POST['minutos'];
    $folio = $_POST['folio'];

    $row = editarOrdenTipo($tipo, $idestructura, $idclasificacion, $minutos, $folio);

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
