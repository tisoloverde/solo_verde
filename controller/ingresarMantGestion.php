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
      ingresarMantGestionDim1($codigo, $nombre, $tipo);
      $row = consultaMantGestionDim1($codigo);
    } else if ($dim == '2') {
      $idComprasGestionDim1 = $_POST['idComprasGestionDim1'];
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      ingresarMantGestionDim2($codigo, $nombre, $tipo, $idComprasGestionDim1);
      $row = consultaMantGestionDim2($idComprasGestionDim1, $codigo);
    } else if ($dim == '3') {
      $idComprasGestionDim2 = $_POST['idComprasGestionDim2'];
      $codigo = $_POST['codigo'];
      $nombre = $_POST['nombre'];
      $tipo = $_POST['tipo'];
      ingresarMantGestionDim3($codigo, $nombre, $tipo, $idComprasGestionDim2);
      $row = consultaMantGestionDim3($idComprasGestionDim2, $codigo);
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
