<?php
  function sanitizeWord($word) {
    $vocals = [
      [ "accent" => "á", "normal" => "a" ],
      [ "accent" => "é", "normal" => "e" ],
      [ "accent" => "í", "normal" => "i" ],
      [ "accent" => "ó", "normal" => "o" ],
      [ "accent" => "ú", "normal" => "u" ],
    ];
    $res = $word;
    foreach ($vocals as $vocal) {
      $res = str_replace($vocal['accent'], $vocal['normal'], $res);
    }
    return $res;
  }

  function sanitizePlanillaCol($nCol) {
    $col = (int)$nCol - 1;
    switch ($col) {
      case 0:
        return "RUT";
      case 1:
        return "APELLIDOS";
      case 2:
        return "CARGO_LIQUIDACION";
      case 3:
        return "CARGO_GENERICO_UNIFICADO";
      case 4:
        return "CLASIFICACION";
      case 5:
        return "REFERENCIA1";
      case 6:
        return "REFERENCIA2";
      default:
        return "RUT";
    }
    return "RUT";
  }

  function buscarDiaValidoPersonalEstadoConcepto($cons) {
    $idConValid = 0;
    foreach($cons as $con) {
      if ($con['SIGLA'] == '1') {
        $idConValid = $con['IDPERSONAL_ESTADO_CONCEPTO'];
      }
    }
    return $idConValid;
  }

  function buscarDiaValidoPersonalEstadoConcepto_Descontar($cons) {
    $idConValidDescuento = array();
    foreach($cons as $con) {
      $sigla = $con['SIGLA'];
      $key = $con['IDPERSONAL_ESTADO_CONCEPTO'];
      $val = 0;
      if ($sigla == 'PMM' || $sigla == 'PMT' || $sigla == 'FMD' || $sigla == 'PMD' || $sigla == 'FMM' || $sigla == 'FMT') {
        $val = 0.5;
      } else if ($sigla == 'LIC' || $sigla == 'LAC' || $sigla == 'DSR' || $sigla == 'PER' || $sigla == 'FLT' || $sigla == 'ELI' || $sigla == 'PSN' ) {
        $val = 1;
      } else {
        $val = 0;
      }
      $idConValidDescuento["_" . $key] = $val;
    }
    return $idConValidDescuento;
  }

  function buscarDiasNoValidoPersonalEstadoConcepto($cons) {
    $idsConValid = [];
    foreach($cons as $con) {
      if ($con['SIGLA'] == 'LIC' || $con['SIGLA'] == 'LAC' || $con['SIGLA'] == 'DSR' || $con['SIGLA'] == 'V'  || $con['SIGLA'] == 'PAD') {
        $idsConValid[] = $con['IDPERSONAL_ESTADO_CONCEPTO'];
      }
    }
    return $idsConValid;
  }

  function buscarDiasNoValidoPersonalEstadoConcepto_Final($cons) {
    $idsConValid = [];
    /*foreach($cons as $con) {
      if ($con['SIGLA'] == 'DSR') {
        $idsConValid[] = $con['IDPERSONAL_ESTADO_CONCEPTO'];
      }
    }*/
    $idsConValid[] = "13";
    return $idsConValid;
  }
?>
