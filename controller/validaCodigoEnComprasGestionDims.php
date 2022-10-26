<?php
  require('../model/consultas.php');

  if(count($_POST) >= 0){
    $dim = $_POST['dim'];

    $row = '';

    if ($dim == '1') {
      $codigo = $_POST['codigo'];
      $row = consultaMantGestionDim1($codigo);
    } else if ($dim == '2') {
      $idComprasGestionDim1 = $_POST['idComprasGestionDim1'];
      $codigo = $_POST['codigo'];
      $row = consultaMantGestionDim2($idComprasGestionDim1, $codigo);
    } else if ($dim == '3') {
      $idComprasGestionDim2 = $_POST['idComprasGestionDim2'];
      $codigo = $_POST['codigo'];
      $row = consultaMantGestionDim3($idComprasGestionDim2, $codigo);
    }

    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData"=>$row
    );
    echo json_encode($results);

  } else {
    echo "Sin datos";
  }
?>
