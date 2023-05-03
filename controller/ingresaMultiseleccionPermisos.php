<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $data = $_POST['array'];

        $idPerfil = $data[0];
        $idAreaWeb = $data[1];

        $row = '';
        borrarPermisosJefaturaTodos($idPerfil, $idAreaWeb);
        borrarPermisosMultiselect($idPerfil, $idAreaWeb);
        $a = 0;
        $b = 0;
        if (!array_key_exists(3, $data)){
          for($i = 0; $i < count($data[2]); $i++){
              $idAreaFuncional = $data[2][$i];
              $row = ingresaAreaFuncionalMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional);
          }
        }
        else{
          $a = 1;
        }
        if (!array_key_exists(2, $data)){
          for($i = 0; $i < count($data[3]); $i++){
              $idEstructura = $data[3][$i];
              $row = ingresaProyectosMultiSel($idAreaWeb, $idPerfil, $idEstructura);
          }
        }
        else{
          $b = 1;
        }
        if($a == 1 && $b == 1){
          for($j = 0; $j < count($data[3]); $j++){
            for($i = 0; $i < count($data[2]); $i++){
                $idAreaFuncional = $data[2][$i];
                $idProyecto = $data[3][$j];
                $row = ingresaPermisosMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional,$idProyecto);
            }
          }
        }

        if($row != "Error" )
        {
            echo "Ok";

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
