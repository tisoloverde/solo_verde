<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $row = consultaListadoDotacion($_POST['periodo'], $_POST['codigoCC']);
  $pofs = consultaListaPersonalOfertados();

  if (is_array($row)) {
    /*for ($i=0; $i < count($row); $i++) {
      $select = "<select id='dotacion-select-" . $row[$i]['id'] . "' class='dotacion-select'>";
      foreach ($pofs as $pof) {
        $code = $pof['codigo'];
        $name = $pof['nombre'];
        if ($row[$i]['personalOfertado'] == $name) {
          $select = $select . "<option value='$code' selected>$name</option>";
        } else {
          $select = $select . "<option value='$code'>$name</option>";
        }
      }
      $select = $select . "</select>";
      $row[$i]['personalOfertado'] = $select;
    }*/

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