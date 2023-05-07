<?php
  // ini_set('display_errors', 'On');
	date_default_timezone_set('America/Santiago');
  session_start();

  require('../model/consultas.php');

  $ruta = str_replace("controller", "", getcwd()) . '/';

  $rutUser = $_SESSION['rutUser'];
  $row = chequeaUsuarioEmail($rutUser);
  $ceco = $_POST['ceco'];
  $fechaInicio = $_POST['fechaInicio'];
  $fechaFin = $_POST['fechaFin'];

  // exec('php -f ' . $ruta . 'controller/generaInformeRexmas.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $fechaInicio . ' ' . $fechaFin . ' > /dev/null 2>&1 &');

  echo 'php -f ' . $ruta . 'controller/generaInformeRexmas.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $fechaInicio . ' ' . $fechaFin . ' > /dev/null 2>&1 &';

	echo "Ok";
?>
