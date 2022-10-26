<?php
    require('../model/consultas.php');
    session_start();
	if(count($_POST) >= 0){
        $rut = $_SESSION['rutUser'];
        $fecha = $_POST['fecha'];
        $path = $_POST['path'];
        if($_POST['idestructura'] != ""){
          $idestructura = $_POST['idestructura'];
        }
        else{
          $idestructura = 0;
        }
        if($_POST['idareafuncional'] != ""){
          $idareafuncional = $_POST['idareafuncional'];
        }
        else{
          $idareafuncional = 0;
        }
        if($_POST['idcategoria'] != ""){
          $idcategoria = $_POST['idcategoria'];
        }
        else{
          $idcategoria = 0;
        }
        if($_POST['idtipo'] != ""){
          $idtipo = $_POST['idtipo'];
        }
        else{
          $idtipo = 0;
        }
        if($_POST['idtecnico'] != ""){
          $idtecnico = $_POST['idtecnico'];
        }
        else{
          $idtecnico = 0;
        }

        $row = consultaOrdenesAsignadasTimeline($rut,$path,$fecha,$idestructura,$idareafuncional,$idcategoria,$idtipo,$idtecnico);

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
