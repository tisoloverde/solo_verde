<?php
header("Content-type: image/png");
// //ini_set('display_errors', 'On');
require('../model/consultas.php');

if(count($_GET) > 0){
  $url = $_GET['url'];

  $row = imagenLogin($url);

  if(is_array($row))
  {
    echo $row[0][1];
  }
  else{
    echo "Sin datos";
  }
}
else{
    echo "Sin datos";
}
?>
