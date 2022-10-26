<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $row = array();
        $row["status"] = true;
        $row["servicios"] = consultaServicioSelect();
        $row["clientes"] = consultaClienteSelect();
        $row["actividades"] = consultaActividadSelect();
        $row["areas"] = consultaAreaSelect();
        $row['sociedades'] = consultaSociedadSelect();
        echo json_encode($row);
	}
	else{
		echo "Sin datos";
	}
?>
