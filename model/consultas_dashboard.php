<?php
	 // ini_set('display_errors', 'On');
	require('conexion.php');

  function datosDashboard1(){
      $con = conectar();
      if($con != "No conectado"){

//          $sql = "CALL DASHBOARD_1_SOLO_VERDE()";
            $sql = "SELECT * FROM DOTACION_EQUIVALENTE_REPORTE ";
          if ($row = $con->query($sql)) {
          $return = array();
          while ($array = $row->fetch_array(MYSQLI_ASSOC)) {
              $return[] = $array;
          }
              return $return;
          } else {
              return "Error";
          }
      } else {
          return "Error";
      }
  }
?>
