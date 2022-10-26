<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUsuario = '';
        if (array_key_exists('rutUser', $_SESSION)) {
            $rutUsuario = $_SESSION['rutUser'];
            $tipo = $_POST['tipo'];
            $observacion = $_POST['observacion'];
            $ini = $_POST['ini'];
            $fin = $_POST['fin'];
            $rut = $_POST['rut'];
            $tipoTexto = $_POST['tipoTexto'];

            if($tipoTexto == "Desvinculado" || $tipoTexto == "Renuncia"){
              $row = ingresarAusenciaDesvinculado($rut, $tipo, $ini, $observacion, $rutUsuario);
            }
            else if($tipoTexto == "Ausente"){
              $row = ingresarAusencia($rut, $tipo, $ini, $ini, $observacion, $rutUsuario);
            }
            else{
              $row = ingresarAusencia($rut, $tipo, $ini, $fin, $observacion, $rutUsuario);
            }

            if($row != "Error" )
            {
              $row2 = consultaPersonalModificado($rutUsuario, $rut, ',');

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
