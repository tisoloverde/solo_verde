<?php
    // ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
      $row = '';

      $folio = $_POST['folio'];
      $serie = $_POST['serie'];
      $tipo = $_POST['tipo'];
      $marca = $_POST['marca_modelo'];
      $valorRef = $_POST['valorRef'];
      $fechaIng = $_POST['fechaIng'];
      $caracteristicas = $_POST['caracteristicas'];
      $imei = $_POST['imei'];
      $marcaTexto = $_POST['marcaTexto'];
      $modeloTexto = $_POST['modeloTexto'];
      $estado = $_POST['estado'];
      $linea = $_POST['linea'];

      //Generamos Código QR
      $PNG_WEB_DIR = 'qr/';

      include "phpqrcode/qrlib.php";

      $matrixPointSize = 10;
      $errorCorrectionLevel = 'L';

      $filename = $PNG_WEB_DIR . 'qr_' . md5(rand()) . '.png';

      QRcode::png('Serie: ' . $serie . ', Tipo: ' . $tipo . ', Marca: ' . $marcaTexto . ', Modelo: ' . $modeloTexto, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

      // echo '<img src="' . $PNG_WEB_DIR.basename($filename) . '" /><hr/>';

      $imgQR = addslashes(file_get_contents($PNG_WEB_DIR.basename($filename)));

      $row = actualizarCargoTI($folio, $serie, $tipo, $marca, $valorRef, $fechaIng, $caracteristicas, $imgQR, $imei, $estado, $linea);

      if ($row != "Error" ) {
        $list = consultaDatosCargosTICambio($folio);
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData"=>$list
        );
        unlink($PNG_WEB_DIR.basename($filename));
        echo json_encode($results);
      } else {
        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => 0,
            "iTotalDisplayRecords" => 0,
            "aaData"=>[]
        );
        unlink($PNG_WEB_DIR.basename($filename));
        echo json_encode($results);
      }
    } else{
      $results = array(
          "sEcho" => 1,
          "iTotalRecords" => 0,
          "iTotalDisplayRecords" => 0,
          "aaData"=>[]
      );
      unlink($PNG_WEB_DIR.basename($filename));
      echo json_encode($results);
    }
?>
