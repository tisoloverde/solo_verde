<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $last_id_dotacion = consultaLastIDDotacion();

  $row = [
    [ "id" => 1, "code" => "173", "title" => "AV. VALDIVIA BARRIDO" ],
    [ "id" => 2, "code" => "173-1", "title" => "AV. VALDIVIA BARRIDO 2" ],
    [ "id" => 3, "code" => "173-2", "title" => "AV. VALDIVIA BARRIDO 3" ],
    [ "id" => 4, "code" => "173-3", "title" => "AV. VALDIVIA BARRIDO 4" ],
    [ "id" => 5, "code" => "173-4", "title" => "AV. VALDIVIA BARRIDO 5" ],
    [ "id" => 6, "code" => "173-5", "title" => "AV. VALDIVIA BARRIDO 6" ],
    [ "id" => 7, "code" => "173-6", "title" => "AV. VALDIVIA BARRIDO 7" ],
  ];

  if (is_array($row)) {
    $results = [
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "idLastDotacion" => $last_id_dotacion[0]['LAST_ID'],
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