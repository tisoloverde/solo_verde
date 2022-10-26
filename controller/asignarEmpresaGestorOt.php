<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folio = $_POST['folio'];
        $empresaSubcc = $_POST['empresaSubcc'];
        $gestorSubcc = $_POST['gestorSubcc'];
        $estado = $_POST['estado'];

        $row = asignarEmpresaGestorOt($folio,$empresaSubcc,$gestorSubcc,$estado);

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
