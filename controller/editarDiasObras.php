<?php
  //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){

    $row = '';
    $nroDias = $_POST['nroDias'];
    $idRango = $_POST['idRango'];

    $row = editarDiasObras($nroDias, $idRango);

    if($row == "Ok" )
    {
        $nroDias2 = $nroDias+1;
        editarDiasObras2($nroDias2);
        echo "OK";
    }
    else{
        echo "Sin datos";
    }
  }
  else{
      echo "Sin datos";
  }
?>
