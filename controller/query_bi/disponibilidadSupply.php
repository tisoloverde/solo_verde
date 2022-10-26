<?php
  require('../../model/consultas.php');
  session_start();

	if($_GET['id'] == "QHhUYKGTAkX5aKWaUFtxFgNhQMXPS4"){
    if($_GET['informe'] == '1'){
      $row = datosDisponibilidadSupply();
      echo json_encode($row);
    }
    else if($_GET['informe'] == '2'){
      $row = datosBaseConsumoCeco();
      echo json_encode($row);
    }
  }
  else{
    echo "No autorizado";
  }
?>
