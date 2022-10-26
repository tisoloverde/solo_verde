<?php
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
        $row = '';

        $folio = $_POST['folio'];
        $nombre = $_POST['nombre'];
        $observacion = $_POST['observacion'];
        $tipoFile = $_POST['tipoFile'];
        $doc = md5(rand()).'.'.$tipoFile;
        $archivo = 'documento_' .$doc;

        move_uploaded_file($_FILES['file']['tmp_name'],'repositorio/obras/documento_' .$doc);

        $row = ingresaDocumPermisoObras($folio,$nombre,$archivo,$tipoFile,$observacion);

        if($row != "Error" )
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
