<?php
header("Content-type: image/png");
require('../model/consultas.php');

session_start();

if(count($_GET) > 0){
  $dni = $_GET['dni'];

  $row = imgPersonal($dni);

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
