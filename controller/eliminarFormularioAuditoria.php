<?php
  require('../model/consultas.php');
  session_start();
  if (count($_POST) > 0) {
    $idAuditoria = $_POST['idAuditoria'];

    eliminarFormularioAuditoriaHijos($idAuditoria);
    $row = eliminarFormularioAuditoria($idAuditoria);

    if ($row == "Ok") {
      echo "OK";
    } else {
      echo "Sin datos";
    }
  } else {
    echo "Sin datos";
  }
?>