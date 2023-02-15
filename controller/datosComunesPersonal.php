<?php
  require('../model/consultas.php');
  session_start();

  $areaFuncional = consultaAreaFuncional();
  $nacionalidad = consultaNacionalidad();
  $nivelEstudios = consultaNivelEstudios();
  $tipoLicencia = consultaTipoLicencia();
  $estadoCivil = consultaEstadoCivil();
  $prevision = consultaSalud();
  $salud = consultaAFP();
  $banco = consultaBanco();
  $tipoContrato = consultaTipoContrato();
  $cargoGenericoUnificado = consultaListaCargoMandante();
  $referencia1 = consultaListaReferencia1_clean();
  $referencia2 = consultaListaReferencia2_clean();
  $cargoLiquidacion = consultaCargoLiquidacion();

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
      "prevision" => $prevision,
      "salud" => $salud,
      "banco" => $banco,
      "tipoContrato" => $tipoContrato,
      "cargoGenericoUnificado" => $cargoGenericoUnificado,
      "referencia1" => $referencia1,
      "referencia2" => $referencia2,
      "cargoLiquidacion" => $cargoLiquidacion,
    ),
  );

  echo json_encode($results);

?>