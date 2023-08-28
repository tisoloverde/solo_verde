<?php
  // ini_set('display_errors', 'On');
	date_default_timezone_set('America/Santiago');
  session_start();

  require('../model/consultas.php');

  $ruta = str_replace("controller", "", getcwd());

  $rutUser = $_SESSION['rutUser'];
  $row = chequeaUsuarioEmail($rutUser);
	$tipo = $_POST['tipo'];

	// var_dump($_POST);

	if($tipo == "faltas"){
		$ceco = $_POST['ceco'];
	  $fechaInicio = $_POST['fechaInicio'];
	  $fechaFin = $_POST['fechaFin'];
		exec('php -f ' . $ruta . 'controller/generaInformeRexmas.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $fechaInicio . ' ' . $fechaFin . ' > /dev/null 2>&1 &');
	}
	else if($tipo == "heAtrasos"){
		$he50 = $_POST['he50'];
		$he100 = $_POST['he100'];
		$atraso = $_POST['atraso'];
		$ceco = $_POST['ceco'];
	  $fechaInicio = $_POST['fechaInicio'];
	  $fechaFin = $_POST['fechaFin'];

		exec('php -f ' . $ruta . 'controller/generaInformeRexmasHE.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $fechaInicio . ' ' . $fechaFin . ' ' . $he50 . ' ' . $he100 . ' ' . $atraso . ' > /dev/null 2>&1 &');
	}
	else if($tipo == "general"){
		$ceco = $_POST['ceco'];
	  $fechaInicio = $_POST['fechaInicio'];
	  $fechaFin = $_POST['fechaFin'];
		exec('php -f ' . $ruta . 'controller/generaInformeRexmasGeneral.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $fechaInicio . ' ' . $fechaFin . ' > /dev/null 2>&1 &');
	}
	else if($tipo == "generalMensual"){
		$ceco = $_POST['ceco'];
	  $anoMes = $_POST['anoMes'];
		exec('php -f ' . $ruta . 'controller/generaInformeRexmasGeneralMensual.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $anoMes . ' > /dev/null 2>&1 &');

		// echo 'php -f ' . $ruta . 'controller/generaInformeRexmasGeneralMensual.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $anoMes . ' > /dev/null 2>&1 &';
	}	else if($tipo == "validacionMensual"){
		$ceco = $_POST['ceco'];
	  $anoMes = $_POST['anoMes'];
		exec('php -f ' . $ruta . 'controller/generaInformeValidacionMensual.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $anoMes . ' > /dev/null 2>&1 &');
		echo 'php -f ' . $ruta . 'controller/generaInformeValidacionMensual.php ' . $rutUser . ' ' . $row['EMAIL'] . ' ' . $ceco . ' ' . $anoMes . ' > /dev/null 2>&1 &';

	}
	echo "Ok";
?>
