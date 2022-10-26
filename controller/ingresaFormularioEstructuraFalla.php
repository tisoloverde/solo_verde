<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = "";

    $idEstructura = $_POST['idEstructura'];
    $falla = $_POST['falla'];
    $textofalla = $_POST['textofalla'];
    $puntaje = $_POST['puntaje'];

    $res = datosFormularioEstructuraCategoria($idEstructura);
    $estructura = $res[0];
    $row = ingresaFormularioEstructuraFalla(
      $estructura['FAMILIA'],
      $estructura['TEXTOFAMILIA'],
      $estructura['CATEGORIA'],
      $estructura['TEXTOCATEGORIA'],
      'options',
      $estructura['CATEGORIA'] . 'ConProblemas',
      $estructura['TEXTOCATEGORIA'] . ' Con Problemas',
      $falla,
      $textofalla,
      $puntaje,
      $estructura['TIPOAUDITORIAid']
    );

    if ($row != "Error") {
      echo "Ok";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
