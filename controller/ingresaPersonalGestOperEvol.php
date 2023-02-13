<?php
  // //ini_set('display_errors', 'On');
  require('../model/consultas.php');
  session_start();

  if(count($_POST) > 0) {
    $row = '';

    // 1. Antecedentes Personales
    $dni = $_POST['rut'];                   // PERSONAL - DNI
    $apellidos = $_POST['apellidos'];       // PERSONAL - APELLIDOS
    $nombres = $_POST['nombres'];           // PERSONAL - NOMBRES
    $cargo = $_POST['funcion'];             // PERSONAL - CARGO
    $fono = $_POST['fono'];                 // PERSONAL - TELEFONO
    $mail = $_POST['mail'];                 // PERSONAL - EMAIL

    // $externo = $_POST['externo'];
    // $idpatente = $_POST['patente'];
    // $nivel = $_POST['nivel'];
    // $mano = $_POST['mano'];
    $sucursal = $_POST['sucursal'];
    $idsubcontrato = $_POST['empresa'];
    $idCeco = $_POST['idCeco'] != "" ? $_POST['idCeco'] : -1;

    $esProvisorio = isset($_POST['esProvisorio']) ? "'" . $_POST['esProvisorio'] . "'" : 'null';                // ¿?
    $domicilio = isset($_POST['domicilio']) ? "'" . $_POST['domicilio'] . "'" : 'null';                         // PERSONAL - DOMICILIO
    $comuna = isset($_POST['comuna']) ? $_POST['comuna'] : 'null';  // ¿PERSONAL - IDAREAFUNCIONAL_COMUNA_NAC? <-- AREAFUNCIONAL
    $ciudad = isset($_POST['ciudad']) ? "'" . $_POST['ciudad'] . "'" : 'null';
    $fechaNacimiento = isset($_POST['fechaNacimiento']) ? "'" . $_POST['fechaNacimiento'] . "'" : 'null';       // PERSONAL - FECHA_NACIMIENTO
    $nacionalidad = isset($_POST['nacionalidad']) ? "'" . $_POST['nacionalidad'] . "'" : 'null';                // PERSONAL - NACIONALIDAD
    $sexo = isset($_POST['sexo']) ? "'" . $_POST['sexo'] . "'" : 'null';                                        // PERSONAL - SEXO (Hombre, Mujer)
    $puebloOriginario = isset($_POST['puebloOriginario']) ? "'" . $_POST['puebloOriginario'] . "'" : 'null';    // PERSONAL - PUEBLO_ORIGINARIO
    $esHispanoHablante = isset($_POST['esHispanoHablante']) ? $_POST['esHispanoHablante'] : 'null';             // PERSONAL - HABLA_ESPANIOL (1/0)
    $nivelEstudios = isset($_POST['nivelEstudios']) ? $_POST['nivelEstudios'] : 'null';                         // PERSONAL - IDNIVEL_EDUCACIONAL <-- NIVEL_EDUCACIONAL
    $sabeLeer = isset($_POST['sabeLeer']) ? $_POST['sabeLeer'] : 'null';                                        // PERSONAL - LEE (1/0)
    $sabeEscribir = isset($_POST['sabeEscribir']) ? $_POST['sabeEscribir'] : 'null';                            // PERSONAL - ESCRIBE (1/0)
    $tieneLicencia = isset($_POST['tieneLicencia']) ? $_POST['tieneLicencia'] : 'null';                         // PERSONAL - POSEE_LICENCIA (1/0)
    $claseLicencia = isset($_POST['claseLicencia']) ? $_POST['claseLicencia'] : 'null';                         // PERSONAL - IDTIPO_LICENCIA <--
    $fechaVencimientoLicencia = isset($_POST['fechaVencimientoLicencia']) ? "'" . $_POST['fechaVencimientoLicencia'] . "'" : 'null'; // PERSONAL - FECHA_VENCIMIENTO_LICENCIA
    $estadoCivil = isset($_POST['estadoCivil']) ? $_POST['estadoCivil'] : 'null';                               // PERSONAL - IDESTADO_CIVIL <-- 
    $nombreContactoEmergencia = isset($_POST['nombreContactoEmergencia']) ? "'" . $_POST['nombreContactoEmergencia'] . "'" : 'null';  // PERSONAL - CONTACTO_EMERGENCIA
    $fonoContactoEmergencia = isset($_POST['fonoContactoEmergencia']) ? "'" . $_POST['fonoContactoEmergencia'] . "'" : 'null';        // PERSONAL - TELEFONO_EMERGENCIA
    $tallaPolera = isset($_POST['tallaPolera']) ? "'" . $_POST['tallaPolera'] . "'" : 'null';                   // PERSONAL - TALLA_POLERA
    $tallaGuantes = isset($_POST['tallaGuantes']) ? "'" . $_POST['tallaGuantes'] . "'" : 'null';                // PERSONAL - TALLA_GUANTES
    $tallaPantalon = isset($_POST['tallaPantalon']) ? "'" . $_POST['tallaPantalon'] . "'" : 'null';             // PERSONAL - TALLA_PANTALON
    $tallaZapatos = isset($_POST['tallaZapatos']) ? "'" . $_POST['tallaZapatos'] . "'" : 'null';                // PERSONAL - TALLA_ZAPATOS
    $tallaLegionario = isset($_POST['tallaLegionario']) ? "'" . $_POST['tallaLegionario'] . "'" : 'null';       // PERSONAL - TALLA_LEGIONARIO
    $tallaOveroll = isset($_POST['tallaOveroll']) ? "'" . $_POST['tallaOveroll'] . "'" : 'null';                // PERSONAL - TALLA_OVEROLL
    $tallaOtros = isset($_POST['tallaOtros']) ? "'" . $_POST['tallaOtros'] . "'" : 'null';                      // PERSONAL - TALLA_OTROS
    $tieneFamiliarEmpresa = isset($_POST['tieneFamiliarEmpresa']) ? $_POST['tieneFamiliarEmpresa'] : 'null';    // PERSONAL - FAMILIAR_EMPRESA (1/0)
    $nombreFamiliarEmpresa = isset($_POST['nombreFamiliarEmpresa']) ? "'" . $_POST['nombreFamiliarEmpresa'] . "'" : 'null';           // PERSONAL - FAMILIAR_EMPRESA_NOMBRE
    $cargoFamiliaEmpresa = isset($_POST['cargoFamiliarEmpresa']) ? "'" . $_POST['cargoFamiliarEmpresa'] . "'" : 'null';                 // PERSONAL - FAMILIAR_EMPRESA_CARGO
    $parentescoFamiliaEmpresa = isset($_POST['parentescoFamiliarEmpresa']) ? "'" . $_POST['parentescoFamiliarEmpresa'] . "'" : 'null';  // PERSONAL - FAMILIAR_EMPRESA_PARENTESCO (incluye otro)
    $esRepitente = isset($_POST['esRepitente']) ? $_POST['esRepitente'] : 'null';                               // PERSONAL - TRABAJO_ANTERIORMENTE (1/0)
    $cargoRepitente = isset($_POST['cargoRepitente']) ? "'" . $_POST['cargoRepitente'] . "'" : 'null';          // PERSONAL - TRABAJO_ANTERIORMENTE_CARGO
    $razonRepitente = isset($_POST['razonRepitente']) ? "'" . $_POST['razonRepitente'] . "'" : 'null';          // PERSONAL - TRABAJO_ANTERIORMENTE_RAZON_SALIDA

    // 2. Antecedentes Previsionales
    $afiliacionPrevision = isset($_POST['afiliacionPrevision']) ? $_POST['afiliacionPrevision'] : 'null'; // PERSONAL - IDAFP <-- AFP
    $afiliacionSalud = isset($_POST['afiliacionSalud']) ? $_POST['afiliacionSalud'] : 'null'; // ¿?

    // 3. Forma de Pago
    $banco = isset($_POST['banco']) ? $_POST['banco'] : 'null';                             // PERSONAL - IDBANCO <-- BANCO
    $tipoCuenta = isset($_POST['tipoCuenta']) ? "'" . $_POST['tipoCuenta'] . "'" : 'null';  // PERSONAL - BANCO_TIPO_CUENTA
    $nroCuenta = isset($_POST['nroCuenta']) ? "'" . $_POST['nroCuenta'] . "'" : 'null';     // PERSONAL - BANCO_CUENTA

    // Documentos
    $lstCertificados = isset($_POST['lstCertificados']) ? "'" . $_POST['lstCertificados'] . "'" : 'null';                 // PERSONAL - CERTIFICADOS (lst nombres)
    $lstCertificadosOtros = isset($_POST['lstCertificadosOtros']) ? "'" . $_POST['lstCertificadosOtros'] . "'" : 'null';  // PERSONAL - OTROS_DOCUMENTOS (lst nombres)
    $tieneClaveUnica = isset($_POST['tieneClaveUnica']) ? "'" . $_POST['tieneClaveUnica'] . "'" : 'null';                 // PERSONAL - CLAVE_UNICA (si no hay es null)

    // Antecedentes Laborales
    $fechaIngresoEmpresa = isset($_POST['fechaIngresoEmpresa']) ? "'" . $_POST['fechaIngresoEmpresa'] . "'" : 'null'; // PERSONAL - FECHA_INGRESO
    $tipoContrato = isset($_POST['tipoContrato']) ? $_POST['tipoContrato'] : 'null';                // PERSONAL - IDTIPO_CONTRATO <-- TIPO_CONTRATO
    $duracionContrato = isset($_POST['duracionContrato']) ? "'" . $_POST['duracionContrato'] . "'" : 'null';    // PERSONAL - DURACION_INICIAL_CONTRATO (int)
    $cargoGenerico = isset($_POST['cargoGenerico']) ? "'" . $_POST['cargoGenerico'] . "'" : 'null'; // PERSONAL - CARGO_GENERICO_CODIGO
    $jeas = isset($_POST['jeas']) ? "'" . $_POST['jeas'] . "'" : 'null';    // ¿PERSONAL - CLASIFICACION?
    $ref1 = isset($_POST['ref1']) ? "'" . $_POST['ref1'] . "'" : 'null';    // PERSONAL - REFERENCIA1
    $ref2 = isset($_POST['ref2']) ? "'" . $_POST['ref2'] . "'" : 'null';    // PERSONAL - REFERENCIA2
    $plaza = isset($_POST['plaza']) ? "'" . $_POST['plaza'] . "'" : 'null'; // PERSONAL - PLAZA_SECTOR

    $row = ingresaPersonalGestOperacionEvol(
      $dni,$apellidos,$nombres,$cargo,
      $fono,$mail, $idsubcontrato
    );

    $row = completaPersonalGestOperacion(
      $dni,

      $esProvisorio, $domicilio, $comuna, $ciudad, $fechaNacimiento, $nacionalidad,
      $sexo, $puebloOriginario, $esHispanoHablante, $nivelEstudios, $sabeLeer,
      $sabeEscribir, $tieneLicencia, $claseLicencia, $fechaVencimientoLicencia,
      $estadoCivil, $nombreContactoEmergencia, $fonoContactoEmergencia, $tallaPolera,
      $tallaGuantes, $tallaPantalon, $tallaZapatos, $tallaLegionario, $tallaOveroll,
      $tallaOtros, $tieneFamiliarEmpresa, $nombreFamiliarEmpresa, $cargoFamiliaEmpresa,
      $parentescoFamiliaEmpresa, $esRepitente, $cargoRepitente, $razonRepitente,

      $afiliacionPrevision, $afiliacionSalud,

      $banco, $tipoCuenta, $nroCuenta,

      $lstCertificados, $lstCertificadosOtros, $tieneClaveUnica,

      $fechaIngresoEmpresa, $tipoContrato, $duracionContrato, $cargoGenerico,
      $jeas, $ref1, $ref2, $plaza
    );

    if ($row != "Error" ) {
      ingresaPersonalGestOperacionACTEvol($dni, $sucursal, $idCeco);
      // ingresaPersonalGestOperacionPatente($idpatente,$servicio,$cliente,$actividad); NO SE USA PATENTE
      echo $row;
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>
