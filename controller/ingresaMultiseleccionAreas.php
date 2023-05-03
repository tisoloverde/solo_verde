<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $data = $_POST['array'];

        $idPerfil = $data[0];

        $rowSel = consultaAreasPerfilAsignadas($idPerfil);

        if(!is_null($rowSel)){
          $f = 0;
          for($j = 0; $j < count($rowSel); $j++){
            $f = 0;
            for($k = 1; $k < count($data); $k++){
              if($rowSel[$j]['IDAREAWEB'] === $data[$k]){
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

        for($i = 1; $i < count($data); $i++){
            $f = 0;
            if(!is_null($rowSel2)){
              for($k = 0; $k < count($rowSel2); $k++){
                if($rowSel2[$k]['IDAREAWEB'] === $data[$i]){
                  $f = 1;
                }
              }
            }
            if($f === 0){
              $idArea = $data[$i];
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
