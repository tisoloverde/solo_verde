<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $pArray =  $_POST['pArray'];
        $comprador = $_POST['comprador'];

        $row = actualizaCompradorAsignadoProveedor($pArray, $comprador, $rutUser);

        if($row == "Ok" )
        {
          $list = listadoComprasProveedoresCambioMulti($pArray);
          $results = array(
              "sEcho" => 1,
              "iTotalRecords" => count($list),
              "iTotalDisplayRecords" => count($list),
              "aaData"=>$list
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
      $results = array(
          "sEcho" => 1,
          "iTotalRecords" => 0,
          "iTotalDisplayRecords" => 0,
          "aaData"=>[]
      );
      echo json_encode($results);
    }
?>
