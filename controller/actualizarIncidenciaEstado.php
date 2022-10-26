<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');

	session_start();

	if(count($_POST) > 0){
		$rutUsuario = $_SESSION['rutUser'];
    $idIncidencia = $_POST['idIncidencia'];
    $idEstado = $_POST['idEstado'];
    $idUsuarioDerivado = $_POST['idUsuarioDerivado'];
    $observaciones = $_POST['observaciones'];

    $row = actualizarIncidenciaEstado($rutUsuario, $idIncidencia, $idEstado, $idUsuarioDerivado);

    ingresarHistorialIncidencia($idIncidencia, $rutUsuario, $observaciones);

    if($row == "Ok") {
      $row = consultaIncidencia($idIncidencia);
			if(is_array($row)) {
        $results = array(
          "sEcho" => 1,
          "iTotalRecords" => count($row),
          "iTotalDisplayRecords" => count($row),
          "aaData"=>$row
        );
        echo json_encode($results);
      } else {
        $results = array(
          "sEcho" => 1,
          "iTotalRecords" => 0,
          "iTotalDisplayRecords" => 0,
          "aaData"=>[]
        );
        echo json_encode($results);
      }
		} else {
			echo "Sin datos";
		}
	} else {
    echo "Sin datos";
  }
?>
