<?php
  require('../model/consultas.php');
  session_start();

	if(count($_POST) >= 0){
    $idz = $_POST['folio'];

    if (strpos($idz,' / ') !== false) {
        $id1 = explode(" / ",$idz)[0];
        $id2 = explode(" / ",$idz)[1];
        $row = datosDocumPermisoObras2($id1,$id2);
    }else{
      $row = datosDocumPermisoObras($idz);
    }

    if(is_array($row))
    {
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
