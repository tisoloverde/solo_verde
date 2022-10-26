<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $dniPersonal = $_POST['dniPersonal'];

        $row = aceptarTransferencia($dniPersonal);

        if($row != "Error" ) {
            // $row2 = listadoPersonal_Cambio($row[0]['IDPERSONAL']);
            $row2 = consultaPersonalModificado($row[0]['RUTJEFEDIRECTO'], $row[0]['DNI'], ',');
            if(is_array($row2)) {
              $results = array(
                  "sEcho" => 1,
                  "iTotalRecords" => count($row2),
                  "iTotalDisplayRecords" => count($row2),
                  "aaData"=>$row2,
                  "aaData2"=>$row
              );
              echo json_encode($results);
            } else {
              $results = array(
                  "sEcho" => 1,
                  "iTotalRecords" => 0,
                  "iTotalDisplayRecords" => 0,
                  "aaData"=>[],
                  "aaData2"=>[]
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
?>
