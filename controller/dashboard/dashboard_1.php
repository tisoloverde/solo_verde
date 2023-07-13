<?php
  require('../../model/consultas_dashboard.php');
  session_start();

	if($_GET['id'] == "QHhUYKGTAkX5aKWaUFtxFgNhQMXPS4"){
    if($_GET['informe'] == '1'){
      $row = datosDashboard1();
      echo json_encode($row);
    }
  }
  else{
    echo "No autorizado";
  }
?>
