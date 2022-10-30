<?php
require('../model/consultas.php');
session_start();

if (count($_POST) >= 0) {
  $row = [];
  for ($i=0; $i < 100; $i++) {
    $row[] = [
      "ID" => $i,
      "code" => 173 + $i,
      "costCenterName" => "VALDIVIA",
      "offeredPersonnel" => "Ofertal Inicial",
      "clientPosition" => "Administrativo",
      "unifiedGenericCharge" => "Ayudante Vehículo Pesado",
      "family" => "JEAS",
      "jeasOrGeas" => "E",
      "ref1" => "AVP",
      "ref2" => "AVR",
      "apr20" => 97, "may20" => 97, "jun20" => 97, "jul20" => 97, "ago20" => 97, "sep20" => 97, "oct20" => 97, "nov20" => 97, "dec20" => 97,
      "jan21" => 97, "feb21" => 97, "mar21" => 97, "apr21" => 97, "may21" => 97, "jun21" => 97, "jul21" => 97, "ago21" => 97, "sep21" => 97, "oct21" => 97, "nov21" => 97, "dec21" => 97,
      "jan22" => 97, "feb22" => 97, "mar22" => 97, "apr22" => 97, "may22" => 97, "jun22" => 97, "jul22" => 97, "ago22" => 97, "sep22" => 97, "oct22" => 97, "nov22" => 97, "dec22" => 97,
    ];
  }

  if (is_array($row)) {
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