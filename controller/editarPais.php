<?php
  ////ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){

    $row = '';
    $abreviaturaPais = $_POST['abreviaturaPais'];
    $nombrePais = $_POST['nombrePais'];
    $idPais = $_POST['idPais'];

    $row = editarPais($abreviaturaPais, $nombrePais, $idPais);

    if($row == "Ok" )
    {
        echo "OK";
    }
    else{
        echo "Sin datos";
    }
  }
  else{
      echo "Sin datos";
  }
?>
