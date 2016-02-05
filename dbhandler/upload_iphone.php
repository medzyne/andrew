<?php
session_start();
include("connectdb.php");

$file = $_FILES["file"];
$shop_photo_name = $file["name"];
$shop_photo = $file["tmp_name"];
$shop_id = $_SESSION['shop_id'];


?>
