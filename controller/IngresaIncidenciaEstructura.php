<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $item = $_POST['item'];
    $elemento = $_POST['elemento'];
    $anomalia = $_POST['anomalia'];

    $idItem = ingresarItem($item); // Agregar validador existencia
    $idElemento = ingresarElemento($elemento); // Agregar validador existencia
    $idAnomalia = ingresarAnomalia($anomalia); // Agregar validador existencia

    echo $row;
  } else{
    echo "Sin datos";
  }
?>
