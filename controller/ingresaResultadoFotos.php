<?php
  ini_set('display_errors', 'On');
  date_default_timezone_set('America/Santiago');
  require('../model/consultas.php');
  //session_start();
 
  if(count($_POST) > 0){
    $tam = $_POST['tam'];
    $idFormulario = $_POST['id'];
    $url = $_POST['url'];

    for ($i=0; $i<$tam; $i++) {
      $array = $_POST['item' . $i];
      $file = $_FILES['itemF1_' . $i];
      $file2 = $_FILES['itemF2_' . $i];
      $medidasimagen = getimagesize($file['tmp_name']);
      $medidasimagen2 = getimagesize($file2['tmp_name']);

      $image = $file['tmp_name'];
      $imageSize = $file['size'];

      $image2 = $file2['tmp_name'];
      $imageSize2 = $file2['size'];

      if($medidasimagen[0] > 0 || $file['size'] > 100000){
        // echo "foto1<br>";
        $nombrearchivo = $file['name'];
        $rtOriginal = $file['tmp_name'];
        if($file['type'] =='image/jpeg'){
          $original = imagecreatefromjpeg($rtOriginal);
        }
        else if($file['type'] =='image/png'){
          $original = imagecreatefrompng($rtOriginal);
        }
        list($ancho , $alto) = getimagesize($rtOriginal);
        $max_ancho = 600;
        $max_alto = 800;
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
            $ancho_final = $ancho;
            $alto_final = $alto;
        }
        elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        }
        else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        $hotpink = imagecolorallocate($image, 255, 110, 221);
        $lienzo2 = imagerotate($lienzo, 0, $hotpink);
        if($file['type'] =='image/jpeg'){
          // echo "jpg<br>";
          imagejpeg($lienzo2,$file['tmp_name']);
        }
        else if($file['type'] =='image/png'){
          // echo "png<br>";
          imagepng($lienzo2,$file['tmp_name']);
        }
        $image = $file['tmp_name'];
        $imageSize = $file['size'];
      }

      if($medidasimagen2[0] > 0 || $file2['size'] > 100000){
        // echo "foto1<br>";
        $nombrearchivo = $file2['name'];
        $rtOriginal = $file2['tmp_name'];
        if($file2['type'] =='image/jpeg'){
          $original = imagecreatefromjpeg($rtOriginal);
        }
        else if($file2['type'] =='image/png'){
          $original = imagecreatefrompng($rtOriginal);
        }
        list($ancho , $alto) = getimagesize($rtOriginal);
        $max_ancho = 600;
        $max_alto = 800;
        $x_ratio = $max_ancho / $ancho;
        $y_ratio = $max_alto / $alto;
        if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
            $ancho_final = $ancho;
            $alto_final = $alto;
        }
        elseif (($x_ratio * $alto) < $max_alto){
            $alto_final = ceil($x_ratio * $alto);
            $ancho_final = $max_ancho;
        }
        else{
            $ancho_final = ceil($y_ratio * $ancho);
            $alto_final = $max_alto;
        }
        $lienzo=imagecreatetruecolor($ancho_final,$alto_final);
        imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
        $hotpink = imagecolorallocate($image, 255, 110, 221);
        $lienzo2 = imagerotate($lienzo, 0, $hotpink);
        if($file2['type'] =='image/jpeg'){
          // echo "jpg<br>";
          imagejpeg($lienzo2,$file2['tmp_name']);
        }
        else if($file['type'] =='image/png'){
          // echo "png<br>";
          imagepng($lienzo2,$file2['tmp_name']);
        }
        $image2 = $file2['tmp_name'];
        $imageSize2 = $file2['size'];
      }

      $img = '';
      $img2 = '';

      if($file['type'] =='image/jpeg'){
        $img = $idFormulario . '_' . $random = md5(rand()) . '.jpg';
      }
      else if($file['type'] =='image/png'){
        $img = $idFormulario . '_' . $random = md5(rand()) . '.png';
      }
      else{
        $img = $idFormulario . '_' . $random = md5(rand()) . '.png';
      }

      if($file2['type'] =='image/jpeg'){
        $img2 = $idFormulario . '_' . $random = md5(rand()) . '.jpg';
      }
      else if($file2['type'] =='image/png'){
        $img2 = $idFormulario . '_' . $random = md5(rand()) . '.png';
      }
      else{
        $img2 = $idFormulario . '_' . $random = md5(rand()) . '.png';
      }

      $ruta = str_replace("generaPDF", "", getcwd());

      move_uploaded_file($image,$ruta . '/repositorio/practica/img/' . $img);
      move_uploaded_file($image2,$ruta . '/repositorio/practica/img/' . $img2);

      $values = array_values($array);
      if(file_exists($ruta . '/repositorio/practica/img/' . $img)){ //Linux
      	$row = ingresarResultadoFotos($img, $values[1], $values[2], $values[3]);
      }
      if(file_exists($ruta . '/repositorio/practica/img/' . $img2)){ //Linux
      	$row2 = ingresarResultadoFotos($img2, $values[1], $values[2], $values[3]);
      }
    }

    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_URL, $url . '/controller/generaPDF/practica1.php?id=' . $idFormulario . '&url=' . $url);
 	  // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	  // $output = curl_exec($ch);
    //
    // actualizaPDFFormulario($idFormulario, $output);

    if ($row != "Error" ) {
      echo 'Ok';
    } else {
      echo "Sin datos";
    }
  } else{
    echo "Sin datos";
  }
?>
