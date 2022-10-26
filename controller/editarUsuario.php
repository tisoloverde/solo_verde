<?php
    ////ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $rut = $_SESSION['rutUser'];
        $rutEditar = $_POST['rutEditar'];
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $perfilUsuario = $_POST['perfilUsuario'];

        $row = editarUsuario( $rutEditar, $nombre, $email, $estado, $perfilUsuario);

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
