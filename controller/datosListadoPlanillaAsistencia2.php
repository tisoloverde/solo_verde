<?php
  require('../model/consultas.php');
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
          "CARGO_LIQUIDACION" => "",
          "CARGO_GENERICO_UNIFICADO" => "",
          "CLASIFICACION" => "",
          "REFERENCIA1" => "",
          "REFERENCIA2" => "",
          "CARGO_GENERICO_UNIFICADO_B" => "",
          "CLASIFICACION_B_TEXT" => "",
          "REFERENCIA1_B_TEXT" => "",
          "REFERENCIA2_B" => "",
          "RUT_REEMPLAZO" => "",
          "FECHA_REEMPLAZO" => "",
        ];

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
          foreach ($cons as $con) {
            $idPec = $con['IDPERSONAL_ESTADO_CONCEPTO'];
            $pec = $con['SIGLA'];
            $select = $select . ($found['IDPERSONAL_ESTADO_CONCEPTO'] == $idPec
              ? "<option value='$idPec' selected>$pec</option>"
              : "<option value='$idPec'>$pec</option>");
          }
          $select = $select . "</select>";

          $row[$dia['DIA']] = $select;
          $row[$dia['DIA'] . "__"] = $found;
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
