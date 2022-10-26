<?php
    // //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $data = json_decode($_POST['parametros']);

        $idPerfil = $data[0];
        $idAreaWeb = $data[3];

        $row = '';
        borrarPermisosJefaturaTodos($idPerfil, $idAreaWeb);
        borrarPermisosMultiselect($idPerfil, $idAreaWeb);
        if (sizeof($data[2]) == 0){
          for($i = 0; $i < count($data[1]); $i++){
              $idAreaFuncional = $data[1][$i];
              $row = ingresaAreaFuncionalMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional);
          }
        }
        if (sizeof($data[1]) == 0){
          for($i = 0; $i < count($data[2]); $i++){
              $idEstructura = $data[2][$i];
              $row = ingresaProyectosMultiSel($idAreaWeb, $idPerfil, $idEstructura);
          }
        }
        else{
          for($j = 0; $j < count($data[2]); $j++){
            for($i = 0; $i < count($data[1]); $i++){
                $idAreaFuncional = $data[1][$i];
                $idProyecto = $data[2][$j];
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
