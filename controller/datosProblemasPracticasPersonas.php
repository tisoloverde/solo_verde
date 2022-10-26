<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $row = datosProblemasPracticasPersonas($_SESSION['rutUser'], $_POST['path'], $_POST['mes'],$_POST['ano'], $_POST['familia'],$_POST['categoria'], $_POST['rutJefe']);

        if(is_array($row))
        {
            echo json_encode($row);
        }
        else{
            echo json_encode([]);
        }
	}
	else{
		echo "Sin datos";
	}
?>
