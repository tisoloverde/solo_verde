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
    $col = (int)$nCol;
    switch ($col) {
      case 0:
        return "P.DNI";
      case 1:
        return "P.APELLIDOS";
      case 2:
        return "P.CARGO";
      case 3:
        return "CGU.NOMBRE";
      case 4:
        return "CL.NOMBRE";
      case 5:
        return "R1.NOMBRE";
      case 6:
        return "R2.NOMBRE";
      default:
        return "P.DNI";
    }
    return "P.DNI";
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
?>