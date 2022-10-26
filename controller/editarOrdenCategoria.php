<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $tipo = $_POST['tipo'];
    $categoria= $_POST['categoria'];
    $folio = $_POST['folio'];

    $row = editarOrdenCategoria($tipo, $categoria, $folio);

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
