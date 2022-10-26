<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUsuario = '';
        if (array_key_exists('rutUser', $_SESSION)) {
            $rutUsuario = $_SESSION['rutUser'];

            $datos = $_POST['array'];

            $rutTxt = '';

            for($i = 2 ; $i < count($datos); $i++){
              if($datos[0] == 1 && $datos[1] == 0){
                $row = ingresarDisponibilidadInduccion($datos[$i], $rutUsuario);
              }
              else if($datos[0] == 1 && $datos[1] == 1){
                $row = ingresarDisponibilidadInduccionTeletrabajo($datos[$i], $rutUsuario);
              }
              else if($datos[0] == 0 && $datos[1] == 1){
                $row = ingresarDisponibilidadTeletrabajo($datos[$i], $rutUsuario);
              }
              else{
                $row = ingresarDisponibilidad($datos[$i], $rutUsuario);
              }
              if($i === 2){
                $rutTxt = $datos[$i];
              }
              else if($i > 0){
                $rutTxt = $rutTxt . "," . $datos[$i];
              }
            }

            if($row != "Error" )
            {
              $row2 = consultaPersonalModificado($rutUsuario, $rutTxt, ',');

              if(is_array($row2))
              {
                  $results = array(
                      "sEcho" => 1,
                      "iTotalRecords" => count($row2),
                      "iTotalDisplayRecords" => count($row2),
                      "aaData"=>$row2
                  );
                  echo json_encode($results);
              }
              else{
                  $results = array(
                      "sEcho" => 1,
                      "iTotalRecords" => 0,
                      "iTotalDisplayRecords" => 0,
                      "aaData"=>[]
                  );
                  echo json_encode($results);
              }
            }
            else{
                echo "Sin datos";
            }
        }
        else{
        	echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
