<?php
header("Content-type: image/png");
// //ini_set('display_errors', 'On');
require('../model/consultas.php');
session_start();

if(count($_GET) >= 0){
  $folio = $_GET['folio'];

  $row = imgSucursal($folio);

  if(is_array($row))
  {
    echo $row[0][0];
  }
  else{
    echo "Sin datos";
  }
}
else{
    echo "Sin datos";
}
?>
