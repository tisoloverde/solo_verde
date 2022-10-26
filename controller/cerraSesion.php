<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();
	destruyeTokenLogin($_SESSION['rutUser']);
	session_destroy();
	unset($_COOKIE['tk_w_o']);
	unset($_COOKIE['token_app']);
?>
