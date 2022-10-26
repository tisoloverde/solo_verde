<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if (count($_POST) > 0){
      $rutUser = $_SESSION['rutUser'];
      $row = '';

      if (array_key_exists('tipo', $_POST)) {
        $tipo = $_POST['tipo'];
      }
      else{
        $tipo = array();
      }

      if (array_key_exists('sociedad', $_POST)) {
        $sociedad = $_POST['sociedad'];
      }
      else{
        $sociedad = array();
      }

      if (array_key_exists('comuna', $_POST)) {
        $comuna = $_POST['comuna'];
      }
      else{
        $comuna = array();
      }

    	if (array_key_exists('actividad', $_POST)) {
        $actividad = $_POST['actividad'];
      }
      else{
        $actividad = array();
      }

      $pIDMONEDA_PAGO = $_POST['moneda'];
      $pRUT = $_POST['rut'];
      $pNOMBRE = $_POST['nombre'];
      $pDIRECCION = $_POST['direccion'];
      $pCONTACTO = $_POST['contacto'];
      $pEMAIL_CONTACTO = $_POST['email'];
      $pFONO_CONTACTO = $_POST['fono'];
      $pCUENTA_SAP = $_POST['bp'];
      $pCONDICION_PAGO = $_POST['condicion_pago'];
      $pACREDITADO = $_POST['acreditado'];
      $pCONTRATO = $_POST['contrato'];
      $pF_INICIO_CONTRATO = $_POST['contrato_f_ini'];
      $pF_FIN_CONTRATO = $_POST['contrato_f_fin'];
      $pBLOQUEO_SAP = $_POST['bloqueo'];
      $fechaSolicitud = $_POST['fechaSolicitud'];
      $rutComprador = $_POST['rutComprador'];
      $critico = $_POST['critico'];

      $row = ingresarMantProveedor($pIDMONEDA_PAGO,	$pRUT,	$pNOMBRE,	$pDIRECCION,	$pCONTACTO,	$pEMAIL_CONTACTO,	$pFONO_CONTACTO,	$pCUENTA_SAP,	$pCONDICION_PAGO,	$pACREDITADO,	$pCONTRATO,	$pF_INICIO_CONTRATO,	$pF_FIN_CONTRATO,	$pBLOQUEO_SAP, $rutUser, $rutComprador, $fechaSolicitud, $critico);


      for($i = 0; $i < count($tipo); $i++){
        ingresarProveedorCompraTipo($row[0][0],	$tipo[$i]);
      }

      for($i = 0; $i < count($sociedad); $i++){
        ingresarProveedorCompraSociedad($row[0][0],	$sociedad[$i]);
      }

      for($i = 0; $i < count($comuna); $i++){
        ingresarProveedorCompraComuna($row[0][0],	$comuna[$i]);
      }

      for($i = 0; $i < count($actividad); $i++){
        ingresarProveedorCompraGDIM1($row[0][0],	$actividad[$i]);
      }

      if ($row != "Error" ) {
        $list = listadoComprasProveedoresCambio($row[0][0]);
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData"=>$list
        );
        echo json_encode($results);
      } else {
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData"=>[]
        );
        echo json_encode($results);
      }
    } else{
      $results = array(
          "sEcho" => 1,
          "iTotalRecords" => 0,
          "iTotalDisplayRecords" => 0,
          "aaData"=>[]
      );
      echo json_encode($results);
    }
?>
