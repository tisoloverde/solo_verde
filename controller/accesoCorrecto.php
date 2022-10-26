<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
      $ruta = $_POST['path'];

      $rutUser = $_SESSION['rutUser'];

      $row = consultaAreasComunesPadre($rutUser);

      if(is_array($row))
      {
          if (array_key_exists('rutas', $_SESSION)) {
            unset($_SESSION['rutas']);
            $rutas = array();
            for($i = 0; $i < count($row); $i++){
              $rutas[] = $row[$i]['RUTA'];
            }
            $_SESSION['rutas'] = $rutas;
          }
          else{
            $rutas = array();
            for($i = 0; $i < count($row); $i++){
              $rutas[] = $row[$i]['RUTA'];
            }
            $_SESSION['rutas'] = $rutas;
          }
      }

      if (array_key_exists('rutas', $_SESSION)) {
        if(in_array("#/" . $ruta, $_SESSION['rutas'])){
          $rowFiltro = consultaFiltroPerfil($rutUser,$ruta);
          echo $rowFiltro[0]['FILTRO'];
        }
        else{
          echo "NO";
        }
      }
      else{
        echo "DESCONECTADO";
      }
	}
	else{
		echo "NO";
	}
?>
