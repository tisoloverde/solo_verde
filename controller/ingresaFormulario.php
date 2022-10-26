<?php
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $row = '';

    $tipoauditoria = $_POST['tipoauditoria'];
    $tiposervicio = $_POST['tiposervicio'];
    $rutauditor = $_SESSION['rutUser'];
    $ntarea = $_POST['ntarea'];
    $direccioncliente = $_POST['direccioncliente'];
    $rutcliente = $_POST['rutcliente'];
    $fechainstalacion = $_POST['fechainstalacion'];
    $nota = $_POST['nota'];
    $rutPersonal = $_POST['rutPersonal'];
    $nombrePersonal = $_POST['nombrePersonal'];

    $row = ingresarFormulario($tipoauditoria, $tiposervicio, $rutauditor, $ntarea, $direccioncliente, $rutcliente, $fechainstalacion, $nota, $rutPersonal, $nombrePersonal);

    ingresaUsuarioNotificacionRut($rutPersonal, 'Práctica', 'Le informamos que se ha realizado una práctica a ' . $nombrePersonal . ' la cual ha sido evaluada con nota ' . $nota, 'Práctica realizada a ' . $nombrePersonal . '<br><br>Nota: ' . $nota, 'Práctica realizada', "#/notificaciones");

    echo json_encode($row);
  } else{
    echo "Sin datos";
  }
?>
