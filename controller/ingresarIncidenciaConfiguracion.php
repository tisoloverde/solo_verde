<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $idsArea = $_POST['idsArea'];
    $idsItem = $_POST['idsItem'];
    $idsDepartamento = $_POST['idsDepartamento'];
    $idsOperacion = $_POST['idsOperacion'];
    $idsSucursal = $_POST['idsSucursal'];
    $rutUsuario = $_POST['rutUsuario'];
    $slaType = $_POST['slaType'];
    $slaQ = $_POST['slaQ'];

    for ($i = 0; $i < count($idsArea); $i++) {
      $idArea = $idsArea[$i];
      $idItem = $idsItem[$i];
      $idDepartamento = $idsDepartamento[$i];
      $idOperacion = $idsOperacion[$i];
      $idSucursal = $idsSucursal[$i];
      $row = ingresarIncidenciaConfiguracion($idArea, $idItem, $idDepartamento, $idOperacion, $idSucursal, $rutUsuario, $slaType, $slaQ);
    }

    // ingresaUsuarioNotificacionRut($rutPersonal, 'Práctica', 'Le informamos que se ha realizado una práctica a ' . $nombrePersonal . ' la cual ha sido evaluada con nota ' . $nota, 'Práctica realizada a ' . $nombrePersonal . '<br><br>Nota: ' . $nota, 'Práctica realizada', "#/notificaciones");

    if ($row != 'Error') {
      $row2 = listarIncidenciaConfiguracion_Nuevos($idsArea, $idsItem, $idsDepartamento, $idsOperacion, $idsSucursal);
      if(is_array($row2))
      {
          $results = array(
              "sEcho" => 1,
              "iTotalRecords" => count($row2),
              "iTotalDisplayRecords" => count($row2),
              "aaData"=>$row2
          );
          echo json_encode($results);
      }
      else{
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
  } else{
    echo "Sin datos";
  }
?>
