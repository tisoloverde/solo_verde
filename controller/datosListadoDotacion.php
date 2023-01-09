<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $dots = (array)consultaListadoDotacion($_POST['periodo'], $_POST['codigoCC']);
  $pofs = consultaListaPersonalOfertados();
  $fams = consultaListaFamilias();
  $crgman = consultaListaCargoMandante();
  $refs1 = consultaListaReferencia1();
  $refs2 = consultaListaReferencia2();

  $rows = [];
  if (is_array($rows)) {
    foreach ($dots as $dot) {
      $idDotacion = $dot['IDDOTACION'];

      $row = [
        "IDDOTACION" => $idDotacion,
        "PERSONAL_OFERTADOS" => "",
        "IDPERSONAL_OFERTADOS" => $dot['IDPERSONAL_OFERTADOS'],
        "FAMILIA" => "",
        "IDFAMILIA" => $dot['IDFAMILIA'],
        "CARGO_MANDANTE" => "",
        "IDCARGO_MANDANTE" => $dot["IDCARGO_MANDANTE"],
        "CARGO_GENERICO_UNIFICADO_FAMILIA" => "",
        "IDCARGO_GENERICO_UNIFICADO_FAMILIA" => $dot['IDCARGO_GENERICO_UNIFICADO_FAMILIA'],
        "CLASIFICACION" => "",
        "IDCLASIFICACION" => $dot['IDCLASIFICACION'],
        "REFERENCIA1" => "",
        "IDREFERENCIA1" => $dot['IDREFERENCIA1'],
        "REFERENCIA2" => "",
        "IDREFERENCIA2" => $dot['IDREFERENCIA2'],
        "ENERO" => "<input id='dotacion-input-col9-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['ENERO'] . "'>",
        "FEBRERO" => "<input id='dotacion-input-col10-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['FEBRERO'] . "'>",
        "MARZO" => "<input id='dotacion-input-col11-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['MARZO'] . "'>",
        "ABRIL" => "<input id='dotacion-input-col12-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['ABRIL'] . "'>",
        "MAYO" => "<input id='dotacion-input-col13-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['MAYO'] . "'>",
        "JUNIO" => "<input id='dotacion-input-col14-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['JUNIO'] . "'>",
        "JULIO" => "<input id='dotacion-input-col15-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['JULIO'] . "'>",
        "AGOSTO" => "<input id='dotacion-input-col16-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['AGOSTO'] . "'>",
        "SETIEMBRE" => "<input id='dotacion-input-col17-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['SETIEMBRE'] . "'>",
        "OCTUBRE" => "<input id='dotacion-input-col18-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['OCTUBRE'] . "'>",
        "NOVIEMBRE" => "<input id='dotacion-input-col19-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['NOVIEMBRE'] . "'>",
        "DICIEMBRE" => "<input id='dotacion-input-col20-$idDotacion' class='dotacion-input onlyNumbers' style='border: none; text-align: center;' value='" . $dot['DICIEMBRE'] . "'>",
        "__ENERO" => $dot['ENERO'], "__FEBRERO" => $dot['FEBRERO'], "__MARZO" => $dot['MARZO'], "__ABRIL" => $dot['ABRIL'], "__MAYO" => $dot['MAYO'], "__JUNIO" => $dot['JUNIO'],
        "__JULIO" => $dot['JULIO'], "__AGOSTO" => $dot['AGOSTO'], "__SETIEMBRE" => $dot['SETIEMBRE'], "__OCTUBRE" => $dot['OCTUBRE'], "__NOVIEMBRE" => $dot['NOVIEMBRE'], "__DICIEMBRE" => $dot['DICIEMBRE'],
      ];

      /* Begin - Personal Ofertado */
      $select = "<select id='dotacion-select-col2-$idDotacion' class='dotacion-select-col2'>";
      foreach ($pofs as $item) {
        $id = $item['IDPERSONAL_OFERTADOS'];
        $name = $item['NOMBRE'];
        $select = $select . ($dot['IDPERSONAL_OFERTADOS'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row['PERSONAL_OFERTADOS'] = $select;
      /* End - Personal Ofertado */

      /* Begin - Familia */
      $select = "<select id='dotacion-select-col3-$idDotacion' class='dotacion-select-col3'>";
      foreach ($fams as $item) {
        $id = $item['IDFAMILIA'];
        $name = $item['NOMBRE'];
        $select = $select . ($dot['IDFAMILIA'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row['FAMILIA'] = $select;
      /* End - Familia */

      /* Begin - Cargo Mandante */
      $select = "<select id='dotacion-select-col4-$idDotacion' class='dotacion-select-col4'>";
      foreach ($crgman as $item) {
        $id = $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'];
        $name = $item['CARGO_GENERICO_UNIFICADO'];
        if ($item['IDFAMILIA'] == $dot['IDFAMILIA']) {
          $select = $select . ($dot['IDCARGO_MANDANTE'] == $id
            ? "<option value='$id' selected>$name</option>"
            : "<option value='$id'>$name</option>");
        }
      }
      $select = $select . "</select>";
      $row['CARGO_MANDANTE'] = $select;
      /* End - Cargo Mandante */

      /* Begin - Cargo Generico Unificado */
      $select = "<select id='dotacion-select-col5-$idDotacion' class='dotacion-select-col5'>";
      foreach ($crgman as $item) {
        $id = $item['IDCARGO_GENERICO_UNIFICADO_FAMILIA'];
        $name = $item['CARGO_GENERICO_UNIFICADO'];
        if ($item['IDFAMILIA'] == $dot['IDFAMILIA']) {
          $select = $select . ($dot['IDCARGO_GENERICO_UNIFICADO_FAMILIA'] == $id
            ? "<option value='$id' selected>$name</option>"
            : "<option value='$id'>$name</option>");
        }
      }
      $select = $select . "</select>";
      $row['CARGO_GENERICO_UNIFICADO_FAMILIA'] = $select;
      /* End - Cargo Generico Unificado */

      /* Begin - Clasificacion */
      $row['CLASIFICACION_TEXT'] = $dot['CLASIFICACION'];
      $row['CLASIFICACION'] = "<span id='dotacion-text-col6-$idDotacion'>" . $dot['CLASIFICACION'] . "</span>";
      /* End - Clasificacion */

      /* Begin - Referencia 1 */
      $select = "<select id='dotacion-select-col7-$idDotacion' class='dotacion-select-col7'>";
      foreach ($refs1 as $item) {
        $id = $item['IDREFERENCIA1'];
        $name = $item['REFERENCIA1'];
        $select = $select . ($dot['IDREFERENCIA1'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row['REFERENCIA1'] = $select;
      /* End - Referencia 1 */

      /* Begin - Referencia 2 */
      $select = "<select id='dotacion-select-col8-$idDotacion' class='dotacion-select-col8'>";
      foreach ($refs2 as $item) {
        $id = $item['IDREFERENCIA2'];
        $name = $item['REFERENCIA2'];
        $select = $select . ($dot['IDREFERENCIA2'] == $id
          ? "<option value='$id' selected>$name</option>"
          : "<option value='$id'>$name</option>");
      }
      $select = $select . "</select>";
      $row['REFERENCIA2'] = $select;
      /* End - Referencia 2 */

      $row['__type'] = 'old';

      $rows[] = $row;
    }

    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($rows),
      "iTotalDisplayRecords" => count($rows),
      "aaData" => $rows,
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