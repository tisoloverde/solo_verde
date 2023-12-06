<?php
  require('../../model/consultas_dashboard.php');
  session_start();

    /*DAtos para aumentar el tiempo de repuesta ya que se cae porque la consulta dura mas de 1 minuto */
    set_time_limit(1200); // 10 minutos (en segundos)
  
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
