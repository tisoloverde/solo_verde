<?php
    // ini_set('display_errors', 'ON');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';
        $rutUser = $_SESSION['rutUser'];

        $definicion = $_POST['definicion'];
        $pep = $_POST['pep'];
        $crm = $_POST['crm'];
        $proyecto = $_POST['proyecto'];
        $denominacion = $_POST['denominacion'];
        $sociedad = $_POST['sociedad'];
        $gerencia = $_POST['gerencia'];
        $controller = $_POST['controller'];
        $adminContrato = $_POST['adminContrato'];
        $cliente = $_POST['cliente'];
        $fechaIniContrato = $_POST['fechaIniContrato'];
        $fechaFinContrato = $_POST['fechaFinContrato'];
        $fechaIniProyecto = $_POST['fechaIniProyecto'];
        $fechaFinProyecto = $_POST['fechaFinProyecto'];
        $estado = $_POST['estado'];

        $row = ingresarProyectoControlling($definicion,	$pep,	$crm,	$proyecto,	$denominacion,	$sociedad,	$gerencia,	$controller,	$adminContrato,	$cliente,	$fechaIniContrato,	$fechaFinContrato,	$fechaIniProyecto,	$fechaFinProyecto,	$estado, $rutUser);

        // var_dump($row);

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
