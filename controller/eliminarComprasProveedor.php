<?php
  // ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();
  if(count($_POST) > 0){
    $row = '';

    $idProveedor = $_POST['idProveedor'];

    $row2 = eliminarComprasProveedorTipo($idProveedor);
    $row3 = eliminarComprasProveedorSociedad($idProveedor);
    $row4 = eliminarComprasProveedorComuna($idProveedor);
    $row5 = eliminarComprasProveedorActividad($idProveedor);
    $row = eliminarMantProveedores($idProveedor);

    if($row == "Ok" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
