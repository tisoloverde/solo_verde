<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
      $anho = $_POST['anho'];
      $row = ingresaAnhoAperturado($anho);
      if ($row != "Error" ) {
        echo "OK";
      } else {
        echo "Sin datos";
      }
    } else {
      echo "Sin datos";
    }
?>