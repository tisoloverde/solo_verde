<?php
// //ini_set('display_errors', 'On');
require('../model/consultas.php');
session_start();

if(count($_GET) >= 0){
  $rut = $_SESSION['rutUser'];

  $row = imagenPersona($rut);

  if(is_array($row))
  {
    if($row[0][0] == ""){
      echo "Sin foto";
    }
    else{
      header("Content-type: image/png");
      echo $row[0][0];
    }
  }
  else{
    echo "Sin datos";
  }
}
else{
    echo "Sin datos";
}
?>
