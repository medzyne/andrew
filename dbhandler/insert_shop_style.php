<?php
include("../connectdb.php");
include("sqlhandler.php");

header("Content-Type: text/html; charset=UTF-8");
session_start();
http_response_code(200);
echo(count($_POST));
var_dump($_POST);

$userID = $_SESSION["id"];
$shopID = $_SESSION["shop_id"];

$countOuery = "SELECT shop_style FROM shop_detail WHERE shop_id = '$shopID'";
$styleID = mysql_result(mysql_query($countOuery), 0);




 ?>
