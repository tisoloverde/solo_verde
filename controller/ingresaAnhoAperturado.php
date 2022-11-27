<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
      $anho = $_POST['anho'];
      $already = consultaAnhoAperturado($anho);
      if (count($already) > 0) {
        echo "¡Este año ya fue registrado!";
      } else {
        $row = ingresaAnhoAperturado($anho);
        if ($row != "Error" ) {
          echo "OK";
        } else {
          echo "Sin datos";
        }
      }
    } else {
      echo "Sin datos";
    }
?>