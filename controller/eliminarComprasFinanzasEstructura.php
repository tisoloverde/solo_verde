<?php
  // ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();
  if(count($_POST) > 0){
    $row = '';

    $idFinanzasEstructura = $_POST['idFinanzasEstructura'];

    $row = eliminarMantFinanzasEstructura($idFinanzasEstructura);

    if($row == "Ok" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
