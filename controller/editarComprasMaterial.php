<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) >= 0){
    $row = '';

    $idMaterial = $_POST['idMaterial'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $material_fab = $_POST['material_fab'];
    $talla = $_POST['talla'];
    $envase = $_POST['envase'];
    $precio_min = $_POST['precio_min'];
    $precio_max = $_POST['precio_max'];
    $voltaje = $_POST['voltaje'];
    $potencia = $_POST['potencia'];
    $calibre = $_POST['calibre'];
    $ancho = $_POST['ancho'];
    $alto = $_POST['alto'];
    $largo = $_POST['largo'];
    $observacion = $_POST['observacion'];

    $row = editarMantMateriales(
      $idMaterial,
      $codigo, $nombre, $marca, $modelo, $color, $tipo, $material_fab, $talla, $envase,
      $precio_min, $precio_max, $voltaje, $potencia, $calibre, $ancho, $alto, $largo, $observacion
    );

    if($row == "Ok" ) {
      echo "OK";
    } else{
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
