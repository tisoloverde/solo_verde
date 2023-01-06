<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) >= 0){
        if($_SESSION['rutUser'] !== '' && !is_null($_SESSION['rutUser']))
        {
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
