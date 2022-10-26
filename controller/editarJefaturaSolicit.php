<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $strlstPersonal = $_POST['strlstPersonal'];
        $rutNuevoJefe = $_SESSION['rutUser'];

        $row = solicitarJefe($strlstPersonal['dnis'], $rutNuevoJefe);

        if($row != "Error" ) {
            /*$row2 = listadoPersonal_Cambio($strlstPersonal['ids']);
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
            }*/
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
