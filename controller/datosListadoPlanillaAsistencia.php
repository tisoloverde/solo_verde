<?php
  require('../model/consultas.php');
  require('./utils/functions.php');
  session_start();

	if (count($_POST) >= 0) {
    // POST
    $idEstructuraOperacion = $_POST['idEstructuraOperacion'];
    $fecIni = $_POST['fecIni'];
    $fecFin = $_POST['fecFin'];

    // DB
    $lstPersonalCC = consultaListaACTHistorial($idEstructuraOperacion, $fecIni, $fecFin);
    $lstPersonalEstado = consultaListaPersonalEstado($fecIni, $fecFin);
    $lstDiasSemana = consultaListaSemanaCalendario($fecIni, $fecFin);

    // COMMONS
    $crgman = consultaListaCargoMandante();
    $cons = consultaListaPersonalEstadoConcepto();
    $refs2 = consultaListaReferencia2();

    $rows = [];
    if (is_array($lstPersonalCC)) {
      for ($i=0; $i<count($lstPersonalCC); $i++) {
        $idPersonal = $lstPersonalCC[$i]['IDPERSONAL'];

        $row = [
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
          "RUT_REEMPLAZO" => "",
          "FECHA_REEMPLAZO" => "",
          "NDIAS" => 0,
          "HE50" => "",
          "HE100" => "",
          "ATRASO" => "",
        ];

        $found = [];
        foreach ($lstPersonalEstado as $personalEstado) {
          if ($idPersonal == $personalEstado['IDPERSONAL']) {
            $found = $personalEstado;
            if (isset($personalEstado['IDPERSONAL_ESTADO_CONCEPTO'])) {
              $row['NDIAS'] = $row['NDIAS'] + 1;
            }
          }
        }

        /* Begin - Cargo Generico Unificado */
        $row['CARGO_GENERICO_UNIFICADO'] = $found['CARGO_GENERICO_UNIFICADO'];
        /* End - Cargo Generico Unificado */

        /* Begin - Clasificacion */
        $row['CLASIFICACION'] = $found['CLASIFICACION'];
        /* End - Clasificacion */

        /* Begin - Referencia 1 */
        $row['REFERENCIA1'] = $found['REFERENCIA1'];
        /* End - Referencia 1 */

        /* Begin - Referencia 2 */
        $row['REFERENCIA2'] = $found['REFERENCIA2'];
        /* End - Referencia 2 */

        /* Begin - Cargo Generico Unificado B */
        $select = "<select id='planilla-select-col8-$idPersonal' class='planilla-select-col8'>";
        foreach ($crgman as $item) {
          $idCgu = $item['IDCARGO_GENERICO_UNIFICADO'];
          $cgu = $item['CARGO_GENERICO_UNIFICADO'];
          $select = $select . ($found['IDCARGO_GENERICO_UNIFICADO_B'] == $idCgu
            ? "<option value='$idCgu' selected>$cgu</option>"
            : "<option value='$idCgu'>$cgu</option>");
        }
        $select = $select . "</select>";
        $row['CARGO_GENERICO_UNIFICADO_B'] = $select;
        $row['IDCARGO_GENERICO_UNIFICADO_B'] = isset($found['IDCARGO_GENERICO_UNIFICADO_B']) ? $found['IDCARGO_GENERICO_UNIFICADO_B'] : $crgman[0]['IDCARGO_GENERICO_UNIFICADO'];
        /* End - Cargo Generico Unificado B */

        /* Begin - Clasificacion */
        $row['CLASIFICACION_B_TEXT'] = $found['CLASIFICACION_B'] ? $found['CLASIFICACION_B'] : $crgman[0]['CLASIFICACION'];
        $row['CLASIFICACION_B'] = "<span id='planilla-text-col9-$idPersonal'>" . $found['CLASIFICACION_B'] . "</span>";
        /* End - Clasificacion */

        /* Begin - Referencia 1 */
        $row['REFERENCIA1_B_TEXT'] = $found['REFERENCIA1_B'] ? $found['REFERENCIA1_B'] : $refs2[0]['REFERENCIA2'];
        $row['REFERENCIA1_B'] = "<span id='planilla-text-col10-$idPersonal'>" . $found['REFERENCIA1_B'] . "</span>";
        /* End - Referencia 1 */

        /* Begin - Referencia 2 */
        $select = "<select id='planilla-select-col11-$idPersonal' class='planilla-select-col11'>";
        foreach ($refs2 as $item) {
          $idRef2 = $item['IDREFERENCIA2'];
          $ref2 = $item['REFERENCIA2'];

          $r1 = isset($found['IDREFERENCIA1_B']) ? $found['IDREFERENCIA1_B'] : $crgman[0]['IDREFERENCIA1'];
          $r2 = isset($found['IDREFERENCIA2_B']) ? $found['IDREFERENCIA2_B'] : $refs2[0]['IDREFERENCIA2'];
          if ($item['IDREFERENCIA1'] == $r1) {
            $select = $select . ($r2 == $idRef2
              ? "<option value='$idRef2' selected>$ref2</option>"
              : "<option value='$idRef2'>$ref2</option>");
          }
        }
        $select = $select . "</select>";
        $row['REFERENCIA2_B'] = $select;
        $row['IDREFERENCIA2_B'] = isset($found['IDREFERENCIA2_B']) ? $found['IDREFERENCIA2_B'] : $refs2[0]['IDREFERENCIA2'];
        /* End - Referencia 2 */

        /* Begin - Week */
        $col = 13;
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
          $select = "<select id='planilla-select-col$col-$idPersonal' class='planilla-select-col$col'>";
          $select = $select . "<option value='0'></option>";
          foreach ($cons as $con) {
            $idPec = $con['IDPERSONAL_ESTADO_CONCEPTO'];
            $pec = $con['SIGLA'];
            $select = $select . ($found['IDPERSONAL_ESTADO_CONCEPTO'] == $idPec
              ? "<option value='$idPec' selected>$pec</option>"
              : "<option value='$idPec'>$pec</option>");
          }
          $select = $select . "</select>";

          $row[sanitizeWord($dia['DIA'])] = $select;
          // $row[$dia['DIA'] . "__"] = $found;
        }
        /* End - Week */

        $rows[] = $row;
      }

      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($rows),
        "iTotalDisplayRecords" => count($rows),
        "aaData"=>$rows
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
  } else {
		echo "Sin datos";
	}
?>
