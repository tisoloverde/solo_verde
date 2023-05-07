<?php
	date_default_timezone_set('America/Santiago');

  session_start();

  $rutUser = $_SESSION['rutUser'];
  $row = chequeaUsuarioEmail($rutUser);

  var_dump($row);

  // exec('php -f ' . $ruta . 'cargaProyectosFile.php ' . $rutUser . ' ' . $docToServer . ' > /dev/null 2>&1 &');

	echo "Ok";
?>
