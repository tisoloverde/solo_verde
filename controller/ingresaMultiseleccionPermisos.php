<?php
    // //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $data = $_POST['array'];

        $idPerfil = $data[0];
        $idAreaWeb = $data[1];

        $row = '';
        borrarPermisosJefaturaTodos($idPerfil, $idAreaWeb);
        borrarPermisosMultiselect($idPerfil, $idAreaWeb);
        if (count($data[3]) == 0){
          for($i = 0; $i < count($data[2]); $i++){
              $idAreaFuncional = $data[2][$i];
              $row = ingresaAreaFuncionalMultiSel($idAreaWeb, $idPerfil, $idAreaFuncional);
          }
        }
        if (count($data[2]) == 0){
          for($i = 0; $i < count($data[3]); $i++){
              $idEstructura = $data[3][$i];
              $row = ingresaProyectosMultiSel($idAreaWeb, $idPerfil, $idEstructura);
          }
        }
        else{
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
