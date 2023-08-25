<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $last_id_dotacion = consultaLastIDDotacion();
  $rut = '';
  if (array_key_exists('rutUser', $_SESSION)) {
    $rut = $_SESSION['rutUser'];
  }
  $path = $_POST['path'];
  $idEmpresa = $_POST['idsubcontrato'];

  $row = consultaListaCentrosDeCostoPerfil($rut, $path);

  $res = [];
  if (strval($idEmpresa) != '0') {
    foreach ($row as $itm) {
      if (strval($itm['IDSUBCONTRATO']) == strval($idEmpresa)) {
        $res[] = $itm;
      }
    }
  } else {
    $res = $row;
  }

  if (is_array($row)) {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($res),
      "iTotalDisplayRecords" => count($res),
      "idLastDotacion" => $last_id_dotacion[0]['LAST_ID'],
      "aaData" => $res,
    ];
    echo json_encode($results);
  } else {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => [],
    ];
    echo json_encode($results);
  }
} else {
  echo "Sin datos";
}

?>
