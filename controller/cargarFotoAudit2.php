<?php
require('../model/consultas.php');

session_start();

if(count($_GET) > 0){
  $row = fotoAudit($_GET['idFORMULARIO'], $_GET['TEXTOFAMILIA'], $_GET['CATEGORIA'], $_GET['TIPOAUDITORIAid']);

  if(is_array($row))
  {
    echo $row[1][0];
  }
  else{
    echo "Sin datos";
  }
}
else{
    echo "Sin datos";
}
?>
