<?php
    //ini_set('display_errors', 'On');
    require('../model/consultas.php');
    session_start();

    if(count($_POST) > 0){
      $idPerfil = $_POST['idPerfil'];
      $idAreaWeb = $_POST['idArea'];

      //Borrar acciones anteriores
      $row = borrarPerfilAccionesArea($idPerfil, $idAreaWeb);

      $key_post = array_keys($_POST);

      for($i = 0; $i < count($key_post); $i++){
        if(strpos($key_post[$i], 'accion_') !== false){
          $id = explode("_", $key_post[$i])[1];
          $val = $_POST[$key_post[$i]];
          $row2 = ingresaAccionPerfilArea($idPerfil, $idAreaWeb, $id, $val);
        }
      }
    }
    else{
      echo "Sin datos";
    }
?>
