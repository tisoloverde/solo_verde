<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $row = consultaListadoDotacion($_POST['periodo'], $_POST['codigoCC']);
  $pofs = consultaListaPersonalOfertados();
  $fams = consultaListaFamilias();
  $crgman = consultaListaCargoMandante();
  $refs2 = consultaListaReferencia2();

  if (is_array($row)) {
    for ($i=0; $i < count($row); $i++) {
      $idDotacion = $row[$i]['IDDOTACION'];

      /* Begin - Personal Ofertado */
      $select = "<select id='dotacion-select-col2-$idDotacion' class='dotacion-select-col2'>";
      foreach ($pofs as $item) {
        $id = $item['IDPERSONAL_OFERTADOS'];
        $name = $item['NOMBRE'];
        $select = $select . ($row[$i]['IDPERSONAL_OFERTADOS'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row[$i]['PERSONAL_OFERTADOS'] = $select;
      /* End - Personal Ofertado */

      /* Begin - Familia */
      $select = "<select id='dotacion-select-col3-$idDotacion' class='dotacion-select-col3'>";
      foreach ($fams as $item) {
        $id = $item['IDFAMILIA'];
        $name = $item['NOMBRE'];
        $select = $select . ($row[$i]['IDFAMILIA'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row[$i]['FAMILIA'] = $select;
      /* End - Familia */

      /* Begin - Cargo Mandante */
      $select = "<select id='dotacion-select-col4-$idDotacion' class='dotacion-select-col4'>";
      foreach ($crgman as $item) {
        $id = $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'];
        $name = $item['CARGO_GENERICO_UNIFICADO'];
        if ($item['IDFAMILIA'] == $row[$i]['IDFAMILIA']) {
          $select = $select . ($row[$i]['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] == $id
            ? "<option value='$id' selected>$name</option>"
            : "<option value='$id'>$name</option>");
        }
      }
      $select = $select . "</select>";
      $row[$i]['CARGO_MANDANTE'] = $select;
      /* End - Cargo Mandante */

      /* Begin - Cargo Generico Unificado */
      $select = "<select id='dotacion-select-col4-$idDotacion' class='dotacion-select-col4'>";
      foreach ($crgman as $item) {
        $id = $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'];
        $name = $item['CARGO_GENERICO_UNIFICADO'];
        if ($item['IDFAMILIA'] == $row[$i]['IDFAMILIA']) {
          $select = $select . ($row[$i]['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] == $id
            ? "<option value='$id' selected>$name</option>"
            : "<option value='$id'>$name</option>");
        }
      }
      $select = $select . "</select>";
      $row[$i]['CARGO_GENERICO_UNIFICADO'] = $select;
      /* End - Cargo Generico Unificado */

      /* Begin - Referencia 2 */
      $select = "<select id='dotacion-select-col4-$idDotacion' class='dotacion-select-col4'>";
      foreach ($refs2 as $item) {
        $id = $item['IDREFERENCIA2'];
        $name = $item['REFERENCIA2'];
        if ($item['IDREFERENCIA1'] == $row[$i]['IDREFERENCIA1']) {
          $select = $select . ($row[$i]['IDREFERENCIA2'] == $id
            ? "<option value='$id' selected>$name</option>"
            : "<option value='$id'>$name</option>");
        }
      }
      $select = $select . "</select>";
      $row[$i]['REFERENCIA2'] = $select;
      /* End - Referencia 2 */
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "aaData" => $row,
    ];
    echo json_encode($results);
  } else {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => 0,
      "iTotalDisplayRecords" => 0,
      "aaData" => [],
    ];
    echo json_encode($results);
  }
} else {
  echo "Sin datos";
}

?>