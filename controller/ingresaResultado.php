<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $idtipoauditoria = $_POST['idtipoauditoria'];
    $idformulario = $_POST['idformulario'];
    $cadenas = $_POST['cadenas'];

    $row = ingresarResultado($idtipoauditoria, $idformulario, $cadenas);
    if ($row != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
