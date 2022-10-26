<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
        $row = datosOrganigramaDetalle($_POST['nivel']);

        if(is_array($row))
        {
            echo json_encode($row);
        }
        else{
            echo json_encode('');
        }
	}
	else{
		echo "Sin datos";
	}
?>
