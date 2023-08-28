<?php
  require('../../model/consultas_dashboard_cubo.php');
  session_start();

    /*DAtos para aumentar el tiempo de repuesta ya que se cae porque la consulta dura mas de 1 minuto */
    set_time_limit(180); // 3 minutos (en segundos)
  
	if($_GET['id'] == "QHhUYKGTAkX5aKWaUFtxFgNhQMXPS4"){
    if($_GET['informe'] == '2'){
        $ceco=$_GET['ceco'];
        $mesAno=$_GET['mesAno'];
      $row = datosDashboardCubo($ceco,$mesAno);
      echo json_encode($row);
    }
    
  }
  else{
    echo "No autorizado";
  }
  
?>
