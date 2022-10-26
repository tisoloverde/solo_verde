<?php
    // //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $rutAuditor = $_SESSION['rutUser'];
    $idIncidencia = $_POST['idIncidencia'];
    $idOperacion = $_POST['idOperacion'];
    $idSucursal = $_POST['idSucursal'];
    $idPersonal = $_POST['idPersonal'];
    $idPatente = $_POST['idPatente'];
    $observaciones = $_POST['observaciones'];

    $row = ingresarIncidencia($rutAuditor, $idIncidencia, $idOperacion, $idSucursal, $idPersonal, $idPatente, $observaciones, '');

    ingresarHistorialIncidencia($row[0][0], $rutAuditor, $observaciones);

    echo json_encode($row);
  } else{
    echo "Sin datos";
  }
?>
