<?php
// //ini_set('display_errors', 'On');
require('../model/consultas.php');
session_start();

if(count($_GET) >= 0){
  $rut = $_GET['rut'];

  $row = imagenPersona($rut);

  if(is_array($row))
  {
    echo $row[0][0];
  }
  else{
    echo 0;
  }
}
else{
    echo 0;
}
?>
