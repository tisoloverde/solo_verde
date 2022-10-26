<?php
    //ini_set('display_errors', 'On');

		require('../model/consultas.php');
    session_start();

    $doc = md5(rand()).'.xml';

    $docXmlCubicacion = '';
    $idObra = $_POST['idObra'];
    $datosTipo = datosTipoObra($idObra);
    $tipo = $datosTipo[0]['TIPO'];

    generarOT($idObra,$tipo);

    $xmlCubicacion = $_FILES['xmlCubicacion']['name'];
    $xmlCubicacionExt = pathinfo($xmlCubicacion, PATHINFO_EXTENSION);
    if($xmlCubicacionExt != ''){
        $docXmlCubicacion = 'cubicacion_' . $doc;
        move_uploaded_file($_FILES['xmlCubicacion']['tmp_name'],'repositorio/obras/cubicacion_' .$doc);
        $datos = simplexml_load_file('repositorio/obras/cubicacion_' .$doc);
        $nombre = $datos->cabecera->nombre;
        $row = "Error";
				if(strpos($idObra, 'OECF') === false){
					/* OT NO FULL */
				}
				else{
					$rowS = ingresaSegundaOrdenEje($idObra);
					generarOT($idObra,'Ingenieria');
				}
        for ($i=0; $i<count($datos->detalle);$i++){
            $codigo = $datos->detalle[$i]->codigo;
            $linea = $datos->detalle[$i]->linea;
            $dirdesde = $datos->detalle[$i]->dirdesde;
            $altdesde = $datos->detalle[$i]->altdesde;
            $dirhasta = $datos->detalle[$i]->dirhasta;
            $althasta = $datos->detalle[$i]->althasta;
            $plano = $datos->detalle[$i]->plano;
            $codesp = $datos->detalle[$i]->codesp;
            $codact = $datos->detalle[$i]->codact;
            $codclave = $datos->detalle[$i]->codclave;
            $tarea = $datos->detalle[$i]->tarea;
            $codmo = $datos->detalle[$i]->codmo;
            $coduo = $datos->detalle[$i]->coduo;
            $canmocub = $datos->detalle[$i]->canmocub;
            $canmoinf = $datos->detalle[$i]->canmoinf;
            $canmoapr = $datos->detalle[$i]->canmoapr;
            $canuocub = $datos->detalle[$i]->canuocub;
            $canuoinf = $datos->detalle[$i]->canuoinf;
            $canuoapr = $datos->detalle[$i]->canuoapr;
            $origen = $datos->detalle[$i]->origen;
						if(strpos($idObra, 'OECF') === false){
							/* OT NO FULL */
						}
						else{
							if($codesp == "P" || $codesp == "B"){
								$tipo = "Ingenieria";
							}
						}
						precargaUnidadObra($coduo);
		        precargaManoObra($codmo);
						$row = agregarCubicacion($idObra,$codigo,$nombre,$linea,$dirdesde,$altdesde,$dirhasta,$althasta,$plano,$codesp,$codact,$codclave,$tarea,$codmo,$coduo,$canmocub,$canmoinf,$canmoapr,$canuocub,$canuoinf,$canuoapr,$origen,$tipo);
						$idCubicacion = $row[0]['LAST_INSERT_ID()'];
						generaOtCubicacion($idCubicacion,$canmocub,$canuocub);
        }
        if($row != "Error" )
        {
            //var_dump($row);
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
