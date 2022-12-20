<?php
  require('../model/consultas.php');
  session_start();

	if (count($_POST) >= 0) {
    $row = consultaListadoPlanillaAsistencia();
    $cons = consultaListaPersonalEstadoConcepto();
    $days = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];

    if (is_array($row)) {
      for ($i=0; $i < count($row); $i++) {
        $idPlanilla = $row[$id]['IDPERSONAL_ESTADO'];

        for ($col=1; $col <= count($days); $col++) {
          /* Begin - Day */
          $day = $days[$col-1];

          $select = "<select id='planilla-select-col$col-$idDotacion' class='dotacion-select-col1'>";
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
