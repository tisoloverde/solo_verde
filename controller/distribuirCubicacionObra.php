<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';
    $row2 = '';

    $idzOk  = $_POST['idzOk'];
    $idCub = $_POST['idCub'];

    $datos = json_decode($idzOk, true);
    $row = eliminarCubicaionObra($idCub);
    foreach ($datos as $value){
        $idOt = $value['idOt'];
        $mo = $value['mo'];  
        $uo = $value['uo'];      
        $row2 = agregarOtCubicacionObra($idOt, $mo, $uo,$idCub);
        //var_dump($row2);
    }
    
    if ($row2 != "Error" ) {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>