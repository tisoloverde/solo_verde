<?php
  require("../../model/consultas.php");
  session_start();

  if (count($_POST) >= 0) {
    $row = consultaListaPersonal();
    if (is_array($row)) {
      $res = [];
      $fields = [
        "S", "IDPERSONAL", "RUT", "IDEMPRESA", "EMPRESA", "NOMBRES",
        "APELLIDOS", "CARGO", "EMAIL", "FECHA_INGRESO", "IDAFP", "AFP",
        "IDSALUD", "SALUD", "TELEFONO", "IDCOMUNA", "COMUNA", "REGION",
        "IDSUCURSAL", "SUCURSAL", "IDESTRUCTURA_OPERACION", "CODIGO_CECO",
        "CECO"
      ];
      for ($i= 0; $i<count($row); $i++) {
        $aux = array();
        foreach ($fields as $field) {
          $sam = $row[$i][$field];
          // $sam = str_replace("\\u00d1","n", $sam);
          // $encodedValue = preg_replace('/\\\\u([a-f0-9]{4})/e', "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($sam));
          
          $aux[$field] = mb_convert_encoding($sam, 'UTF-8', 'UTF-8');
        }
        $res[] = $aux;
      }
      
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => count($res),
        "iTotalDisplayRecords" => count($res),
        "aaData"=>$res
      );

      // echo json_encode($results);
      echo json_encode($results, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    } else {
      $results = array(
        "sEcho" => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        "aaData"=>[]
      );
      echo json_encode($results);
    }
    // $row = ["asdas" => "zxczxc"];
    echo json_encode($row);
  } else {
		echo "Sin datos";
	}
?>