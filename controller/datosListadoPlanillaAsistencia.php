<?php
  require('../model/consultas.php');
  session_start();

	if (count($_POST) >= 0) {
    $row = consultaListadoPlanillaAsistencia($_POST['idEstructuraOperacion']);
    $crgman = consultaListaCargoMandante();
    $cons = consultaListaPersonalEstadoConcepto();
    $refs2 = consultaListaReferencia2();
    $days = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

    if (is_array($row)) {
      for ($i=0; $i < count($row); $i++) {
        $idPlanilla = $row[$i]['IDACT'];

        /* Begin - Cargo Generico Unificado */
        $select = "<select id='planilla-select-col8-$idPlanilla' class='planilla-select-col8'>";
        foreach ($crgman as $item) {
          $id = $item['IDCARGO_GENERICO_UNIFICADO'];
          $name = $item['CARGO_GENERICO_UNIFICADO'];
          // if ($item['IDFAMILIA'] == $row[$i]['IDFAMILIA']) {
            $select = $select . ($row[$i]['IDCARGO_GENERICO_UNIFICADO_B'] == $id
              ? "<option value='$id' selected>$name</option>"
              : "<option value='$id'>$name</option>");
          // }
        }
        $select = $select . "</select>";
        $row[$i]['CARGO_GENERICO_UNIFICADO_B'] = $select;
        /* End - Cargo Generico Unificado */

        /* Begin - Clasificacion */
        $row[$i]['CLASIFICACION_B_TEXT'] = $row[$i]['CLASIFICACION_B'];
        $row[$i]['CLASIFICACION_B'] = "<span id='planilla-text-col9-$idPlanilla'>" . $row[$i]['CLASIFICACION'] . "</span>";
        /* End - Clasificacion */

        /* Begin - Referencia 1 */
        $row[$i]['REFERENCIA1_B_TEXT'] = $row[$i]['REFERENCIA1_B'];
        $row[$i]['REFERENCIA1_B'] = "<span id='planilla-text-col10-$idPlanilla'>" . $row[$i]['REFERENCIA1'] . "</span>";
        /* End - Referencia 1 */

        /* Begin - Referencia 2 */
        $select = "<select id='planilla-select-col11-$idPlanilla' class='planilla-select-col11'>";
        foreach ($refs2 as $item) {
          $id = $item['IDREFERENCIA2'];
          $name = $item['REFERENCIA2'];
          if ($item['IDREFERENCIA1'] == $row[$i]['IDREFERENCIA1_B']) {
            $select = $select . ($row[$i]['IDREFERENCIA2_B'] == $id
              ? "<option value='$id' selected>$name</option>"
              : "<option value='$id'>$name</option>");
          }
        }
        $select = $select . "</select>";
        $row[$i]['REFERENCIA2_B'] = $select;
        /* End - Referencia 2 */

        for ($col=1; $col <= count($days); $col++) {
          /* Begin - Day */
          $day = $days[$col-1];
          $newcol = $col + 13;

          $select = "<select id='planilla-select-col$newcol-$idPlanilla' class='planilla-select-col$newcol'>";
          foreach ($cons as $con) {
            $name = $con['SIGLA'];
            $select = $select . ($row[$i]["SIGLA_$day"] == $name
              ? "<option value='$name' selected>$name</option>"
              : "<option value='$name'>$name</option>");
          }
          $select = $select . "</select>";
          $row[$i][$day] = $select;
          /* End - Day */
        }
      }
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($row),
        "iTotalDisplayRecords" => count($row),
        "aaData"=>$row
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
