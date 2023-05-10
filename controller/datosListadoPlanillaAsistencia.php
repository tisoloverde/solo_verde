<?php
  require('../model/consultas.php');
  require('./utils/functions.php');
  session_start();

	if (count($_POST) >= 0) {
    // POST
    $offset = $_POST['start'];
    $limit = $_POST['length'];
    $idEstructuraOperacion = $_POST['idEstructuraOperacion'];
    $fecIni = $_POST['fecIni'];
    $fecFin = $_POST['fecFin'];
    $auxIni = $_POST['auxIni'];
    $auxFin = $_POST['auxFin'];
    $diaFinMes = $_POST['diaFinMes'];
    $search = $_POST['search']['value'];
    $sortCol = $_POST['order'][0]['column'];
    $sortOrd = $_POST['order'][0]['dir'];

    // DB
    $total = consultaListaACTHistorialCOUNT2($idEstructuraOperacion, $fecIni, $fecFin, $auxIni, $auxFin, $diaFinMes, $search);
    $lstPersonalCC = consultaListaACTHistorial2($offset, $limit, $idEstructuraOperacion, $fecIni, $fecFin, $auxIni, $auxFin, $diaFinMes, $search, sanitizePlanillaCol($sortCol), $sortOrd);
    $sql = [];
    $lstPersonalEstado = consultaListaPersonalEstado($fecIni, $fecFin);
    $lstDiasSemana = consultaListaSemanaCalendario($fecIni, $fecFin);

    // COMMONS
    $crgman = consultaListaCargoMandante();
    $cons = consultaListaPersonalEstadoConcepto();
    $consClean = consultaListaPersonalEstadoConceptoClean();
    $refs1 = consultaListaReferencia1();
    $refs2 = consultaListaReferencia2();
    $idConValid = buscarDiaValidoPersonalEstadoConcepto($cons);
    $idsConValidDescuento = buscarDiaValidoPersonalEstadoConcepto_Descontar($cons);
    $idsConNotValid = buscarDiasNoValidoPersonalEstadoConcepto($cons);
    $idsConNotValid_Final = buscarDiasNoValidoPersonalEstadoConcepto_Final($cons);

    $rows = [];
    if (is_array($lstPersonalCC)) {
      for ($i=0; $i<count($lstPersonalCC); $i++) {
        $idPersonal = $lstPersonalCC[$i]['IDPERSONAL'];
        $rutPersonal = $lstPersonalCC[$i]['RUT'];

        $found = [];
        foreach ($lstPersonalEstado as $personalEstado) {
          if ($idPersonal == $personalEstado['IDPERSONAL']) {
            $found = $personalEstado;
          }
        }

        $boton_asignar = isset($lstPersonalCC[$i]['FECHA_TERMINO']) ?
          $lstPersonalCC[$i]['FECHA_TERMINO'] <= $fecFin
            ? ""
            : "disabled"
          : "disabled";

        $row = [
          "S" => $lstPersonalCC[$i]['S'],
          "IDPERSONAL" => $idPersonal,
          "RUT" => $lstPersonalCC[$i]['RUT'],
          "NOMBRES" => $lstPersonalCC[$i]['NOMBRES'],
          "CARGO_LIQUIDACION" => $lstPersonalCC[$i]['CARGO_LIQUIDACION'],
          "CARGO_GENERICO_UNIFICADO" => "",
          "CLASIFICACION" => "",
          "REFERENCIA1" => "",
          "REFERENCIA2" => "",
          "IDCARGO_GENERICO_UNIFICADO_B" => 0,
          "CARGO_GENERICO_UNIFICADO_B" => "",
          "CLASIFICACION_B_TEXT" => "",
          "REFERENCIA1_B_TEXT" => "",
          "IDREFERENCIA2_B" => 0,
          "REFERENCIA2_B" => "",
          "RUT_REEMPLAZO" => "<button id='planilla-input-$rutPersonal--$idPersonal' class='btn btn-info btn-sm planilla-modal' $boton_asignar>Asignar</button>",
          "FECHA_REEMPLAZO" => "",
          // "NDIAS" => $ndias,
          "HE50" => "<input id='planilla-input-col22-$idPersonal' class='planilla-input onlyNumbers' style='border: none; text-align: center;' value='" . $found['HE50'] . "'>",
          "HE100" => "<input id='planilla-input-col23-$idPersonal' class='planilla-input onlyNumbers' style='border: none; text-align: center;' value='" . $found['HE100'] . "'>",
          "ATRASO" => "<input id='planilla-input-col24-$idPersonal' class='planilla-input onlyNumbers' style='border: none; text-align: center;' value='" . $found['ATRASO'] . "'>",
          "OBSERVACION" => "<input id='planilla-input-col25-$idPersonal' class='planilla-input' style='border: none; text-align: center;' value='" . $found['OBSERVACION'] . "'>",
          "FECHA_INGRESO" => $lstPersonalCC[$i]['FECHA_INGRESO'],
          "FECHA_TERMINO" => $lstPersonalCC[$i]['FECHA_TERMINO'],
          "CLASIFICACION_CONTRATO" => $lstPersonalCC[$i]['CLASIFICACION_CONTRATO'],
          "TEMPORAL" => $lstPersonalCC[$i]['TEMPORAL'],
          "__HE50" => $found['HE50'],
          "__HE100" => $found['HE100'],
          "__ATRASO" => $found['ATRASO'],
          "__OBSERVACION" => $found['OBSERVACION'],
          "__DIAS_PLN" => [],
        ];

        /* Begin - Cargo Generico Unificado */
        $row['CARGO_GENERICO_UNIFICADO'] = $lstPersonalCC[$i]['CARGO_GENERICO_UNIFICADO'];
        /* End - Cargo Generico Unificado */

        /* Begin - Clasificacion */
        $row['CLASIFICACION'] = $lstPersonalCC[$i]['CLASIFICACION'];
        /* End - Clasificacion */

        /* Begin - Referencia 1 */
        $row['REFERENCIA1'] = $lstPersonalCC[$i]['REFERENCIA1'];
        /* End - Referencia 1 */

        /* Begin - Referencia 2 */
        $row['REFERENCIA2'] = $lstPersonalCC[$i]['REFERENCIA2'];
        /* End - Referencia 2 */

        /* Begin - Cargo Generico Unificado B */
        $select = "<select id='planilla-select-col9-$idPersonal' class='planilla-select-col9'>";
        $select .= "<option>Seleccione</option>";
        foreach ($crgman as $item) {
          $idCgu = $item['IDCARGO_GENERICO_UNIFICADO'];
          $cgu = $item['CARGO_GENERICO_UNIFICADO'];
          $select = $select . ($found['IDCARGO_GENERICO_UNIFICADO_B'] == $idCgu
            ? "<option value='$idCgu' selected>$cgu</option>"
            : "<option value='$idCgu'>$cgu</option>");
        }
        $select = $select . "</select>";
        $row['CARGO_GENERICO_UNIFICADO_B'] = $select;
        $row['IDCARGO_GENERICO_UNIFICADO_B'] = $found['IDCARGO_GENERICO_UNIFICADO_B']; // $row['IDCARGO_GENERICO_UNIFICADO_B'] = isset($found['IDCARGO_GENERICO_UNIFICADO_B']) ? $found['IDCARGO_GENERICO_UNIFICADO_B'] : $crgman[0]['IDCARGO_GENERICO_UNIFICADO'];
        /* End - Cargo Generico Unificado B */

        /* Begin - Clasificacion */
        $row['CLASIFICACION_B_TEXT'] = $found['CLASIFICACION_B']; // $row['CLASIFICACION_B_TEXT'] = $found['CLASIFICACION_B'] ? $found['CLASIFICACION_B'] : $crgman[0]['CLASIFICACION'];
        $row['CLASIFICACION_B'] = "<span id='planilla-text-col10-$idPersonal'>" . $found['CLASIFICACION_B'] . "</span>";
        /* End - Clasificacion */

        /* Begin - Referencia 1 */
        // $row['REFERENCIA1_B_TEXT'] = $found['REFERENCIA1_B']; // $found['REFERENCIA1_B'] ? $found['REFERENCIA1_B'] : $refs2[0]['REFERENCIA2'];
        // $row['REFERENCIA1_B'] = "<span id='planilla-text-col10-$idPersonal'>" . $found['REFERENCIA1_B'] . "</span>";
        $select = "<select id='planilla-select-col11-$idPersonal' class='planilla-select-col11'>";
        $select .= "<option>Seleccione</option>";
        foreach ($refs1 as $item) {
          $idRef1 = $item['IDREFERENCIA1'];
          $ref1 = $item['REFERENCIA1'];
          // $r2 = isset($found['IDREFERENCIA1_B']) ? $found['IDREFERENCIA1_B'] : $refs1[0]['IDREFERENCIA1'];
          // $select = $select . ($r2 == $idRef1
          $select = $select . ($found['IDREFERENCIA1_B'] == $idRef1
            ? "<option value='$idRef1' selected>$ref1</option>"
            : "<option value='$idRef1'>$ref1</option>");
        }
        $select = $select . "</select>";
        $row['REFERENCIA1_B'] = $select;
        $row['IDREFERENCIA1_B'] = $found['IDREFERENCIA1_B']; // $row['IDREFERENCIA1_B'] = isset($found['IDREFERENCIA1_B']) ? $found['IDREFERENCIA1_B'] : $refs1[0]['IDREFERENCIA1'];
        /* End - Referencia 1 */

        /* Begin - Referencia 2 */
        $select = "<select id='planilla-select-col12-$idPersonal' class='planilla-select-col12'>";
        $select .= "<option>Seleccione</option>";
        foreach ($refs2 as $item) {
          $idRef2 = $item['IDREFERENCIA2'];
          $ref2 = $item['REFERENCIA2'];
          // $r2 = isset($found['IDREFERENCIA2_B']) ? $found['IDREFERENCIA2_B'] : $refs2[0]['IDREFERENCIA2'];
          // $select = $select . ($r2 == $idRef2
          $select = $select . ($found['IDREFERENCIA2_B'] == $idRef2
            ? "<option value='$idRef2' selected>$ref2</option>"
            : "<option value='$idRef2'>$ref2</option>");
        }
        $select = $select . "</select>";
        $row['REFERENCIA2_B'] = $select;
        $row['IDREFERENCIA2_B'] = $found['IDREFERENCIA2_B']; // $row['IDREFERENCIA2_B'] = isset($found['IDREFERENCIA2_B']) ? $found['IDREFERENCIA2_B'] : $refs2[0]['IDREFERENCIA2'];
        /* End - Referencia 2 */

        /* Begin - Week */
        $col = 13;
        $colStart = -1;
        $colBreak = 100;
        $ndias = 7;

        if (isset($row['FECHA_TERMINO'])) {
          if ($row['FECHA_TERMINO'] <= $lstDiasSemana[0]['FECHA']) {
            $colBreak = 0;
          }
        }

        foreach ($lstDiasSemana as $dia) {
          /* begin - search */
          $found = array();
          foreach ($lstPersonalEstado as $personalEstado) {
            if ($dia['FECHA'] == $personalEstado['FECHA_INICIO'] &&
                $idPersonal == $personalEstado['IDPERSONAL']) {
              $found = $personalEstado;
            }
          }
          /* end - search */

          $col = $col + 1;
          if ($dia['FECHA'] < $row['FECHA_INGRESO']) {
            $colStart = $col;
          }
          if (in_array($found['IDPERSONAL_ESTADO_CONCEPTO'], $idsConNotValid_Final)) {
            $colBreak = $col;
          }

          if (in_array($found['IDPERSONAL_ESTADO_CONCEPTO'], $idsConNotValid)) {
            $select = "<select id='planilla-select-col$col-$idPersonal' class='planilla-select-day' disabled>";
            $select = $select . "<option>" . $found['PERSONAL_ESTADO_CONCEPTO'] . "</option>";
            $select = $select . "</select>";

            $ndias -= $idsConValidDescuento["_" . $found['IDPERSONAL_ESTADO_CONCEPTO']];
          } else {
            if ($col <= $colStart) {
              $select = "<select id='planilla-select-col$col-$idPersonal' class='planilla-select-day' disabled>";
              $select = $select . "</select>";

              $ndias -= 1;
            } else if ($col <= $colBreak) {
              $select = "<select id='planilla-select-col$col-$idPersonal' class='planilla-select-day'>";
              $select = $select . "<option value='0'></option>";
              foreach ($consClean as $con) {
                $idPec = $con['IDPERSONAL_ESTADO_CONCEPTO'];
                $pec = $con['SIGLA'];
                $select = $select . (($found['IDPERSONAL_ESTADO_CONCEPTO']) == $idPec
                  ? "<option value='$idPec' selected>$pec</option>"
                  : "<option value='$idPec'>$pec</option>");
              }

              if (isset($found['IDPERSONAL_ESTADO_CONCEPTO'])) {
                $ndias -= $idsConValidDescuento["_" . $found['IDPERSONAL_ESTADO_CONCEPTO']];
              } else {
                $ndias -= 1;
              }
            } else {
              $select = "<select id='planilla-select-col$col-$idPersonal' class='planilla-select-day' disabled>";
              $select = $select . "<option>DSR</option>";
              $select = $select . "</select>";

              $ndias -= 1;
            }
          }

          $row[sanitizeWord($dia['DIA'])] = $select;
          // $row[$dia['DIA'] . "__"] = $found;
        }
        $row['NDIAS'] = $ndias;
        /* End - Week */

        $rows[] = $row;
      }

      $results = array(
        // "sEcho" => 1,
        /*"iTotalRecords" => (int)$total[0]['CONT'],
        "iTotalDisplayRecords" => count($rows),*/
        "sql1" => $sql,
        "recordsTotal" => (int)$total[0]['CONT'],
        "recordsFiltered" => (int)$total[0]['CONT'],
        "aaData"=>$rows,
      );
      echo json_encode($results);
    } else {
      $results = array(
        "sql2" => $sql,
        "sEcho" => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        "aaData"=>[]
      );
      echo json_encode($results);
    }
  } else {
		echo "Sin datos";
	}
?>
