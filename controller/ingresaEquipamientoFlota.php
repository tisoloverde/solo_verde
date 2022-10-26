<?php
  // ini_set('display_errors', 'On');
  date_default_timezone_set('America/Santiago');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0){
    $rutUser = $_SESSION['rutUser'];
    $patente = $_POST['patente'];

    $ruta = getcwd();

    $j = 1;
    for($i = 1; $i < count($_POST); $i=$i+4){
      $id = $_POST["id_" . $j];
      $oculto = $_POST["oculto_" . $j];
      $checked = $_POST["checked_" . $j];
      $nombre = $_POST["nombre_" . $j];
      $archivo = $_FILES["archivo_" . $j]["tmp_name"];

      if($oculto >= 1 && $checked == 0){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "Eliminar<br>";
        elimnarEquipamientoDePatente($oculto);
      }
      else if($oculto >= 1 && $checked == 1 && $archivo == ""){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "No hacer nada<br>";
      }
      else if($oculto >= 1 && $checked == 1 && $archivo != ""){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "Actualizar archivo<br>";
        $archivo_final = $id . "_" . md5(rand()) . ".pdf";
        move_uploaded_file($archivo, $ruta . '/repositorio/flota/equipamiento/' . $archivo_final);
        actualizaPDFEquipamiento($archivo_final, $oculto, $rutUser);
      }
      else if($oculto == -1 && $checked == 1 && $archivo == ""){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "Ingresar datos<br>";
        ingresarEquipamientoFlota($patente, $id, $rutUser);
      }
      else if($oculto == -1 && $checked == 1 && $archivo != ""){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "Ingresar datos y archivo<br>";
        $archivo_final = $id . "_" . md5(rand()) . ".pdf";
        move_uploaded_file($archivo, $ruta . '/repositorio/flota/equipamiento/' . $archivo_final);
        ingresarEquipamientoFlotaPDF($patente, $id, $rutUser, $archivo_final);
      }
      else if($oculto == -1 && $checked == 0){
        // echo "==========================================================================<br>";
        // echo "id: " . $id  . ",oculto: " . $oculto . ",checked: " . $checked;
        // echo "<br>";
        // echo "No hacer nada<br>";
      }
      $j++;
    }

    $v = consultaPatenteEspecifica($patente);
    $estadoVeh = $v[0]['IDPATENTE_ESTADO'];
    $tipoVeh = $v[0]['IDPATENTE_TIPOVEHICULO'];
    $propiedad = $v[0]['IDPATENTE_PROPIEDAD'];
    $marcaModelo = $v[0]['IDPATENTE_MARCAMODELO'];
    $proveedor = $v[0]['IDPATENTE_PROVEEDOR'];
    $bodega = $v[0]['IDSUCURSAL'];
    $estructOperac = $v[0]['IDESTRUCTURA_OPERACION'];
    $aseguradora = $v[0]['IDPATENTE_ASEGURADORA'];
    $subcontratista = $v[0]['IDSUBCONTRATISTAS'];
    $kilometraje = $v[0]['KILOMETRAJE'];
    $ano = $v[0]['AÑO'];
    $vin = $v[0]['VIN'];
    $color = $v[0]['IDPATENTE_COLOR'];
    $fInicio = $v[0]['FINICIO'];
    $fTermino = $v[0]['FTERMINO'];
    $tipoMonto = $v[0]['TIPOMONTO'];
    $monto = $v[0]['MONTO'];
    $montoAseg = $v[0]['MONTO_ASEGURADORA'];
    $fMantto = $v[0]['FMANTENIMIENTO'];
    $operacion = $v[0]['OPERACION'];
    $nMotor = $v[0]['NRO_MOTOR'];
    $patenteOriginal = $v[0]['PATENTE_ORIGINAL'];
    $litros = $v[0]['LITROS_ESTANQUE'];

    $v1 = consultaPatenteHistorial($patente);
    $estadoControl = $v1[0]['ESTADO_CONTROL'];
    $estadoRrhh = $v1[0]['ESTADO_PERSONAL'];
    $personalAsig = $v1[0]['PERSONAL'];
    $rutAsig = $v1[0]['DNI'];
    $mensaje = "Actualización de equipamiento";
    $frealizada = "";
    $fcaducidad = "";
    $frealizadaCir = "";
    $fcaducidadCir = "";
    $docPDFRev1 = "";
    $docPDFCir1 = "";
    $docPDFAsegur1 = "";
    $docPDFOtrosVh1 = "";

    ingresaLogVehiculo($patente, $estadoVeh, $estadoControl, $estadoRrhh, $tipoVeh, $propiedad, $marcaModelo, $proveedor, $personalAsig,
  	$rutAsig, $bodega, $estructOperac, $aseguradora, $subcontratista, $kilometraje, $ano, $vin, $color, $fInicio, $fTermino,
  	$tipoMonto, $monto, $montoAseg, $fMantto, $docPDFRev1, $frealizada, $fcaducidad, $docPDFCir1, $frealizadaCir, $fcaducidadCir, $docPDFAsegur1,
  	$docPDFOtrosVh1, $mensaje, $_SESSION['rutUser'], $operacion, $nMotor, $patenteOriginal, $litros);

    $row = '';

    if ($row != "Error" ) {
      echo 'Ok';
    }
    else {
      echo "Sin datos";
    }
  }
  else{
    echo "Sin datos";
  }
?>
