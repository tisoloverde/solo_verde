<?php
    //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();
    if(count($_POST) > 0){
        $row = '';
        $id = explode(" / ",$_POST['idoz']);
        for($i=0;$i<count($id);$i++){
          $row = ingresarPersonalAsigObra($_POST['idusuario'],$id[$i], $_POST['tipo']);
        }

        if($row == "Ok" )
        {
            echo "OK";

        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }
?>
