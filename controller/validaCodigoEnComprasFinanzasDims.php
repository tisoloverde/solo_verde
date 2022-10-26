<?php
  require('../model/consultas.php');

  if(count($_POST) >= 0){
    $dim = $_POST['dim'];

    $row = '';

    if ($dim == '1') {
      $codigo = $_POST['codigo'];
      $row = consultaMantFinanzasDim1($codigo);
    } else if ($dim == '2') {
      $codigo = $_POST['codigo'];
      $row = consultaMantFinanzasDim2($codigo);
    } else if ($dim == '3') {
      $codigo = $_POST['codigo'];
      $row = consultaMantFinanzasDim3($codigo);
    } else if ($dim == 'all') {
      $idDim1 = $_POST['idDim1'];
      $idDim2 = $_POST['idDim2'];
      $idDim3 = $_POST['idDim3'];
      $row = consultaMantFinanzasEstructura($idDim1, $idDim2, $idDim3);
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
