<?php
	header('Access-Control-Allow-Origin: *');
	require('../model/consultas.php');
	session_start();
	destruyeTokenLoginToken($_COOKIE['tk_w_o']);
	session_destroy();
	unset($_COOKIE['tk_w_o']);
	unset($_COOKIE['token_app']);
?>
