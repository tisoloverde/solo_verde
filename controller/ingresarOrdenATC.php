<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folioIngOrden = $_POST['folioIngOrden'];
        $proyectoIngOrden = $_POST['proyectoIngOrden'];
        $fechaHoraIngOrden = $_POST['fechaHoraIngOrden'];
        $tramoIngOrden = $_POST['tramoIngOrden'];
        $rutIngOrden = $_POST['rutIngOrden'];
        $clienteIngOrden = $_POST['clienteIngOrden'];
        $fonoIngOrden = $_POST['fonoIngOrden'];
        $direccionIngOrden = $_POST['direccionIngOrden'];
        $comunaRegionIngOrden = $_POST['comunaRegionIngOrden'];
        $empresaIngOrden = $_POST['empresaIngOrden'];
        $tipoIngOrden = $_POST['tipoIngOrden'];
        $categoriaIngOrden = $_POST['categoriaIngOrden'];
        $tecnologiaIngOrden = $_POST['tecnologiaIngOrden'];

        $rutUser = $_SESSION['rutUser'];

        $row = ingresarOrdenATC($folioIngOrden,$proyectoIngOrden,$fechaHoraIngOrden,$tramoIngOrden,$rutIngOrden,$clienteIngOrden,$fonoIngOrden,$direccionIngOrden,$comunaRegionIngOrden,$empresaIngOrden,$tipoIngOrden,$categoriaIngOrden,$tecnologiaIngOrden,$rutUser, 'Ingreso de nueva orden');

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
