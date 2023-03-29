<?php
  require("../../model/consultas.php");
  session_start();

  $rut = $_POST["rut"];

  $row = consultaPersonalDetalles($rut);

  if (is_array($row)) {
    $results = array(
      "sEcho" => 1,
      "iTotalRecords" => count($row),
      "iTotalDisplayRecords" => count($row),
      "aaData" => $row[0]
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

?>