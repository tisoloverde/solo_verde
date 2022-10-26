<?php
    //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $idPerfil = $_POST['idPerfil'];
        $idArea = $_POST['idArea'];
        $jefatura = $_POST['jefatura'];
        $todos = $_POST['todos'];
        $filtro = $_POST['filtro'];

        if($jefatura == 1){
          borrarPermisosMultiselect($idPerfil, $idArea);
          $row = ingresarPermisoPorJefatura($idPerfil, $idArea, $jefatura, $filtro);
          if($row != "Error" )
          {
              echo "OK";
          }
          else{
              echo "Sin datos";
          }
        }
        else if($todos = 1){
          borrarPermisosMultiselect($idPerfil, $idArea);
          $row = ingresarPermisoTodos($idPerfil, $idArea, $todos, $filtro);
          if($row != "Error" )
          {
              echo "OK";
          }
          else{
              echo "Sin datos";
          }
        }

    }
    else{
        echo "Sin datos";
    }
?>
