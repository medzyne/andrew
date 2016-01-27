<?php
include("../connectdb.php");
header("Content-Type: text/html; charset=UTF-8");
session_start();
http_response_code(200);
echo(count($_POST));
var_dump($_POST);


 ?>
