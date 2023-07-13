<?php
  require('../../model/consultas_dashboard.php');
  session_start();

	if($_GET['id'] == "QHhUYKGTAkX5aKWaUFtxFgNhQMXPS4"){
    if($_GET['informe'] == '1'){
      $row = datosDashboard1($_GET['mes'], $_GET['ano']);
      echo json_encode($row);
    }
  }
  else{
    echo "No autorizado";
  }
?>
