<?php
session_start();
echo "<pre>";
var_dump($_SESSION);
var_dump($_ENV['DB_USER_QA']);
echo "</pre>";
echo phpinfo();
?>
