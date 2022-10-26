<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $idGerente =  $_POST['idGerente'];
        $idSubgerente =  $_POST['idSubgerente'];
        $gerencias =  $_POST['gerencias'];

        $row = actualizarGerenteSubgerenteMasivo($gerencias, $idGerente, $idSubgerente, $rutUser);

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
