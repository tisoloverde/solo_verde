<?php
    //ini_set('display_errors', 'On');

    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $nombreOe = $_POST['nombreOe'];
        $jefeProyecto = $_POST['jefeProyecto'];
        $supervisor = $_POST['supervisor'];
        $proyectista = $_POST['proyectista'];
        $pr = $_POST['pr'];

        if($pr === "supervisor"){
          if($jefeProyecto !== "0"){
            $row = asignarPersIngresandoCaratula($nombreOe,$jefeProyecto,"Jefe proyecto");
          }
          if($supervisor !== "0"){
            $row = asignarPersIngresandoCaratula($nombreOe,$supervisor,"Supervisor");
          }
        }
        else {
          if($jefeProyecto !== "0"){
            $row = asignarPersIngresandoCaratula($nombreOe,$jefeProyecto,"Jefe proyecto");
          }
          if($proyectista !== "0"){
            $row = asignarPersIngresandoCaratula($nombreOe,$proyectista,"Jefe proyecto");
          }
        }
        
        if($row != "Error" )
        {
            echo "OK";

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
