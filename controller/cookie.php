<?php
//Actualización token cookie
require('../model/consultas.php');
session_start();
setcookie("tk_w_o",$_COOKIE["tk_w_o"],time()+900);
actualizaTokenLogin($_SESSION['rutUser'], $_COOKIE["tk_w_o"]);

?>
