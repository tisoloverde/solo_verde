<?php
  require('../model/consultas.php');
  session_start();

  $areaFuncional = consultaAreaFuncional();
  $nacionalidad = consultaNacionalidad();
  $nivelEstudios = consultaNivelEstudios();
  $tipoLicencia = consultaTipoLicencia();
  $estadoCivil = consultaEstadoCivil();
  $afp = consultaAFP();
  $banco = consultaBanco();
  $tipoContrato = consultaTipoContrato();
  $cargoGenericoUnificado = consultaListaCargoMandante();
  $referencia1 = consultaListaReferencia1();
  $referencia2 = consultaListaReferencia2();

  $results = array(
    "sEcho" => 1,
    // "iTotalRecords" => count($row),
    // "iTotalDisplayRecords" => count($row),
    "aaData" => array(
      "areaFuncional" => $areaFuncional,
      "nacionalidad" => $nacionalidad,
      "nivelEstudios" => $nivelEstudios,
      "tipoLicencia" => $tipoLicencia,
      "estadoCivil" => $estadoCivil,
      "afp" => $afp,
      "banco" => $banco,
      "tipoContrato" => $tipoContrato,
      "cargoGenericoUnificado" => $cargoGenericoUnificado,
      "referencia1" => $referencia1,
      "referencia2" => $referencia2,
    ),
  );

  echo json_encode($results);

?>