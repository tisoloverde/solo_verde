<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $data = json_decode($_POST['parametros']);

        $idPerfil = $data[0];

        $rowSel = consultaAreasPerfilAsignadas($idPerfil);

        if(!is_null($rowSel)){
          $f = 0;
          for($j = 0; $j < count($rowSel); $j++){
            $f = 0;
            for($k = 0; $k < count($data[1]); $k++){
              if($rowSel[$j]['IDAREAWEB'] === $data[1][$k]){
                $f = 1;
              }
            }
            if($f === 0){
              borrarPermisosMultiselect($idPerfil, $rowSel[$j]['IDAREAWEB']);
              borrarAreaPermisoPerfil($idPerfil, $rowSel[$j]['IDAREAWEB']);
            }
          }
        }

        $rowSel2 = consultaAreasPerfilAsignadas($idPerfil);

        $row = '';

        for($i = 0; $i < count($data[1]); $i++){
            $f = 0;
            if(!is_null($rowSel2)){
              for($k = 0; $k < count($rowSel2); $k++){
                if($rowSel2[$k]['IDAREAWEB'] === $data[1][$i]){
                  $f = 1;
                }
              }
            }
            if($f === 0){
              $idArea = $data[1][$i];
              $row = ingresaAreaMultiSel($idPerfil, $idArea);
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
