<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) == 0){
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
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($row),
                "iTotalDisplayRecords" => count($row),
                "aaData"=>$row
            );
            echo json_encode($results);
        }
        else{
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => 0,
                "iTotalDisplayRecords" => 0,
                "aaData"=>[]
            );
            echo json_encode($results);
        }
	}
	else{
		echo "Sin datos";
	}
?>
