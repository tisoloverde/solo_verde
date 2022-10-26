<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $dim = $_POST['dim'];

    $row = '';

    if ($dim == '1') {
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      ingresarMantFinanzasDim1($codigo, $nombre, $tipo);
      $row = consultaMantFinanzasDim1($codigo);
    } else if ($dim == '2') {
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      ingresarMantFinanzasDim2($codigo, $nombre, $tipo);
      $row = consultaMantFinanzasDim2($codigo);
    } else if ($dim == '3') {
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      ingresarMantFinanzasDim3($codigo, $nombre, $tipo);
      $row = consultaMantFinanzasDim3($codigo);
    } else if ($dim == 'all') {
      $idDim1 = $_POST['idDim1'];
      $idDim2 = $_POST['idDim2'];
      $idDim3 = $_POST['idDim3'];
      ingresarMantFinanzasEstructura($idDim1, $idDim2, $idDim3);
      $row = consultaMantFinanzasEstructura($idDim1, $idDim2, $idDim3);
    }

    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "aaData"=> $row
    );
    echo json_encode($results);
  } else{
    echo "Sin datos";
  }
?>
