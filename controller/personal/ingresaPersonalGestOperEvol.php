<?php
  // //ini_set('display_errors', 'On');
  require('../../model/consultas.php');
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

    $sucursal = $_POST['sucursal'];
    $idsubcontrato = $_POST['idsubcontrato'];
    $idCeco = $_POST['idCeco'];

    $esProvisorio = $_POST['esProvisorio'];
    $domicilio = $_POST['domicilio'];                         // PERSONAL - DOMICILIO
    $comuna = $_POST['comuna'];  // ¿PERSONAL - IDAREAFUNCIONAL_COMUNA_NAC? <-- AREAFUNCIONAL
    $ciudad = $_POST['ciudad'];
    $fechaNacimiento = $_POST['fechaNacimiento'];       // PERSONAL - FECHA_NACIMIENTO
    $nacionalidad = $_POST['nacionalidad'];                // PERSONAL - NACIONALIDAD
    $sexo = $_POST['sexo'];                                        // PERSONAL - SEXO (Hombre, Mujer)
    $puebloOriginario = $_POST['puebloOriginario'];    // PERSONAL - PUEBLO_ORIGINARIO
    $esHispanoHablante = $_POST['esHispanoHablante'];             // PERSONAL - HABLA_ESPANIOL (1/0)
    $nivelEstudios = $_POST['nivelEstudios'];                         // PERSONAL - IDNIVEL_EDUCACIONAL <-- NIVEL_EDUCACIONAL
    $sabeLeer = $_POST['sabeLeer'];                                        // PERSONAL - LEE (1/0)
    $sabeEscribir = $_POST['sabeEscribir'];                            // PERSONAL - ESCRIBE (1/0)
    $tieneLicencia = $_POST['tieneLicencia'];                         // PERSONAL - POSEE_LICENCIA (1/0)
    $claseLicencia = $_POST['claseLicencia'];                         // PERSONAL - IDTIPO_LICENCIA <--
    $fechaVencimientoLicencia = $_POST['fechaVencimientoLicencia']; // PERSONAL - FECHA_VENCIMIENTO_LICENCIA
    $estadoCivil = $_POST['estadoCivil'];                               // PERSONAL - IDESTADO_CIVIL <-- 
    $nombreContactoEmergencia = $_POST['nombreContactoEmergencia'];  // PERSONAL - CONTACTO_EMERGENCIA
    $fonoContactoEmergencia = $_POST['fonoContactoEmergencia'];        // PERSONAL - TELEFONO_EMERGENCIA
    $tallaPolera = $_POST['tallaPolera'];                   // PERSONAL - TALLA_POLERA
    $tallaGuantes = $_POST['tallaGuantes'];                // PERSONAL - TALLA_GUANTES
    $tallaPantalon = $_POST['tallaPantalon'];             // PERSONAL - TALLA_PANTALON
    $tallaZapatos = $_POST['tallaZapatos'];                // PERSONAL - TALLA_ZAPATOS
    $tallaLegionario = $_POST['tallaLegionario'];       // PERSONAL - TALLA_LEGIONARIO
    $tallaOverol = $_POST['tallaOverol'];                // PERSONAL - TALLA_OVEROL
    $tallaOtros = $_POST['tallaOtros'];                      // PERSONAL - TALLA_OTROS
    $tieneFamiliarEmpresa = $_POST['tieneFamiliarEmpresa'];    // PERSONAL - FAMILIAR_EMPRESA (1/0)
    $nombreFamiliarEmpresa = $_POST['nombreFamiliarEmpresa'];           // PERSONAL - FAMILIAR_EMPRESA_NOMBRE
    $cargoFamiliaEmpresa = $_POST['cargoFamiliarEmpresa'];                 // PERSONAL - FAMILIAR_EMPRESA_CARGO
    $parentescoFamiliaEmpresa = $_POST['parentescoFamiliarEmpresa'];  // PERSONAL - FAMILIAR_EMPRESA_PARENTESCO (incluye otro)
    $esRepitente = $_POST['esRepitente'];                               // PERSONAL - TRABAJO_ANTERIORMENTE (1/0)
    $cargoRepitente = $_POST['cargoRepitente'];          // PERSONAL - TRABAJO_ANTERIORMENTE_CARGO
    $razonRepitente = $_POST['razonRepitente'];          // PERSONAL - TRABAJO_ANTERIORMENTE_RAZON_SALIDA

    // 2. Antecedentes Previsionales
    $afiliacionPrevision = $_POST['afiliacionPrevision']; // PERSONAL - IDAFP <-- AFP
    $afiliacionSalud = $_POST['afiliacionSalud']; // ¿?

    // 3. Forma de Pago
    $banco = $_POST['banco'];                             // PERSONAL - IDBANCO <-- BANCO
    $tipoCuenta = $_POST['tipoCuenta'];  // PERSONAL - BANCO_TIPO_CUENTA
    $nroCuenta = $_POST['nroCuenta'];     // PERSONAL - BANCO_CUENTA

    // Documentos
    $lstCertificados = $_POST['lstCertificados'];                 // PERSONAL - CERTIFICADOS (lst nombres)
    $lstCertificadosOtros = $_POST['lstCertificadosOtros'];  // PERSONAL - OTROS_DOCUMENTOS (lst nombres)
    $tieneClaveUnica = $_POST['tieneClaveUnica'];                 // PERSONAL - CLAVE_UNICA (si no hay es null)

    // Antecedentes Laborales
    $fechaIngresoEmpresa = $_POST['fechaIngresoEmpresa']; // PERSONAL - FECHA_INGRESO
    $tipoContrato = $_POST['tipoContrato'];                // PERSONAL - IDTIPO_CONTRATO <-- TIPO_CONTRATO
    $duracionContrato = $_POST['duracionContrato'];    // PERSONAL - DURACION_INICIAL_CONTRATO (int)
    $cargoGenerico = $_POST['cargoGenerico']; // PERSONAL - CARGO_GENERICO_CODIGO
    $ref1 = $_POST['ref1'];    // PERSONAL - REFERENCIA1
    $ref2 = $_POST['ref2'];    // PERSONAL - REFERENCIA2
    $plaza = $_POST['plaza']; // PERSONAL - PLAZA_SECTOR

    $row1 = ingresaPersonalGestOperacionEvol(
      $dni,$apellidos,$nombres,$cargo,
      $fono,$mail,$idsubcontrato
    );

    $row2 = completaPersonalGestOperacion(
      $dni,

      $esProvisorio, $domicilio, $comuna, $ciudad, $fechaNacimiento, $nacionalidad,
      $sexo, $puebloOriginario, $esHispanoHablante, $nivelEstudios, $sabeLeer,
      $sabeEscribir, $tieneLicencia, $claseLicencia, $fechaVencimientoLicencia,
      $estadoCivil, $nombreContactoEmergencia, $fonoContactoEmergencia, $tallaPolera,
      $tallaGuantes, $tallaPantalon, $tallaZapatos, $tallaLegionario, $tallaOverol,
      $tallaOtros, $tieneFamiliarEmpresa, $nombreFamiliarEmpresa, $cargoFamiliaEmpresa,
      $parentescoFamiliaEmpresa, $esRepitente, $cargoRepitente, $razonRepitente,

      $afiliacionPrevision, $afiliacionSalud,

      $banco, $tipoCuenta, $nroCuenta,

      $lstCertificados, $lstCertificadosOtros, $tieneClaveUnica,

      $fechaIngresoEmpresa, $tipoContrato, $duracionContrato, $cargoGenerico,
      $jeas, $ref1, $ref2, $plaza
    );

    if ($row1 != "Error" && $row2 != "Error") {
      $row3 = ingresaPersonalGestOperacionACTEvol($dni, $sucursal, $idCeco);
      // ingresaPersonalGestOperacionPatente($idpatente,$servicio,$cliente,$actividad); NO SE USA PATENTE
      echo json_encode([
        "request" => $_POST,
        "row1" => $row1,
        "row2" => $row2,
        "row3" => $row3,
      ]);
    } else {
      echo json_encode([
        "request" => $_POST,
        "error" => "Sin datos",
        "row1" => $row1,
        "row2" => $row2,
      ]);
    }
  } else {
    echo json_encode([
      "error" => "No hay data",
    ]);
  }
?>
