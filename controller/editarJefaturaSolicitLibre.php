<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $strlstPersonalLibre = $_POST['strlstPersonalLibre'];
        $rutNuevoJefe = $_SESSION['rutUser'];

        $row = solicitarJefeLibre($strlstPersonalLibre['dnisLibre'], $rutNuevoJefe);

        if($row != "Error" ) {
            $row2 = consultaPersonalModificado($rutNuevoJefe, str_replace("'","",$strlstPersonalLibre['dnisLibre']), ',');
            if(is_array($row2)) {
              $results = array(
                  "sEcho" => 1,
                  "iTotalRecords" => count($row2),
                  "iTotalDisplayRecords" => count($row2),
                  "aaData"=>$row2
              );
              echo json_encode($results);
            } else {
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
?>
