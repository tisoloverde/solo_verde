<?php
require('../model/consultas.php');

$username = '8f7fa41fec3c432f9be1dfaa1968b0d1';
$password = '84eb82b1b2a5442f8309e916f3b7ebf2';

$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
));

$url ='http://api.connectus.cl/api_v2/check_sms_balance';
$datos = file_get_contents($url, false, $context);
$array = json_decode($datos);

if($array->balance->CL > 0){
  if(count($_POST) > 0){
    $mensaje = $_POST['mensaje'];
    $celular = $_POST['celular'];

    $postdata = http_build_query(
        array(
            'dst_number' => '56' . $celular,
            'sms_content' => $mensaje
        )
    );

    $context = stream_context_create(array(
        'http' => array(
          'method'  => 'POST',
          'header'  => "Authorization: Basic " . base64_encode("$username:$password"),
          'content' => $postdata
        )
    ));

    $url ='https://api.connectus.cl/api_v2/send_sms';
    $datos = file_get_contents($url, false, $context);

    echo $datos;
  }
  else{
    echo "SIN_SMS";
  }
}
else{
  echo "SIN_SMS";
}
?>
