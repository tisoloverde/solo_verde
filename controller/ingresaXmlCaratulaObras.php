<?php
	require('../model/consultas.php');
    session_start();

    // $idEstructura = $_POST['idEstructura'];
    $idEmpresa = $_POST['idEmpresa'];

    $doc = md5(rand()).'.xml';

    $docXmlCaratula = '';

    $xmlCaratula = $_FILES['xmlCaratula']['name'];
    $xmlCaratulaExt = pathinfo($xmlCaratula, PATHINFO_EXTENSION);
    if($xmlCaratulaExt != ''){
        $docXmlCaratula = 'caratula_' . $doc;
        move_uploaded_file($_FILES['xmlCaratula']['tmp_name'],'repositorio/obras/caratula_' .$doc);
        $datos = simplexml_load_file('repositorio/obras/caratula_' .$doc);
        $tipo = $datos->tipo;
				if(strpos($tipo, 'Construccion') === false){
					/* No normalizar construccion */
				}
				else{
					$tipo = 'Construccion';
				}
        $red = $datos->red;
        $nombreOe = $datos->nombreOE;
        $proyecto = $datos->proyecto;
        $cliente = $datos->cliente;
        $direccion = $datos->direccion;
        $pep2 = $datos->PEP2;
        $agencia = $datos->agencia;
        $gestor = $datos->GESTOR;
        $central = $datos->central;
        $inicio = date('Y-m-d', strtotime($datos->inioe));
        $final = date('Y-m-d', strtotime($datos->finoe));
        $ito = $datos->ito;
        $comuna = $datos->comuna;
        $pep1 = $datos->PEP1;
        $idAgencia = $datos->idagencia;
        $contrato = $datos->contrato;
        $idContrato = $datos->idcontrato;

        precargaObraAgencia($idAgencia,$agencia);
        precargaObraContrato($idContrato,$contrato);
        $row = agregarCaratula($tipo,$red,$nombreOe,$proyecto,$cliente,$direccion,$pep2,$gestor,$central,$inicio,$final,$ito,$comuna,$pep1,$idAgencia,$idContrato,$idEmpresa);

        if($row != "Error" )
        {
            echo $nombreOe . "%%%" . $tipo;
        }
        else{
            echo "Sin datos";
        }
    }
    else{
        echo "Sin datos";
    }

?>
