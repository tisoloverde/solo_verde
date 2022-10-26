<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $pIDPERSONAL = $_POST['idpersonal'];
        $pOBSERVACION = $_POST['observacion'];
        $pRUT_ASIGNA = $_SESSION['rutUser'];
        $cargos = $_POST['cargos'];


        $row = ingresarAsignacionCargo($pIDPERSONAL, $pOBSERVACION, $pRUT_ASIGNA);
        $lastID = $row[0]['LAST_INSERT_ID()'];

        if($row != "Error" )
        {
            for($i = 0; $i < count($cargos); $i++){
              ingresarAsignacionCargoElemento($lastID, $cargos[$i], '1');
              actualizaEstadoTICargo($cargos[$i], 'Asignado');
            }
            $list = consultaAsignacionesCargosCambio($lastID);

            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($list),
                "iTotalDisplayRecords" => count($list),
                "aaData"=>$list
            );
            $results['lastID'] = $lastID;
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
      $results = array(
          "sEcho" => 1,
          "iTotalRecords" => 0,
          "iTotalDisplayRecords" => 0,
          "aaData"=>[]
      );
      echo json_encode($results);
    }
?>
