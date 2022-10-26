<?php
//Actualización token cookie
session_start();
setcookie("tk_w_o",$_COOKIE["tk_w_o"],time()+300);
?>
