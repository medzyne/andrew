<?php
session_start();
include("../connectdb.php");
include('sqlhandler.php');

$file = $_FILES["file"];
$photo_name = $file["name"];
$photo_path = $file["tmp_name"];
$shop_id = $_SESSION['shop_id'];
$section = "iphoneBackground";


if(save_file($shop_id, $photo_name, $photo_path, $section))
{
  http_response_code(200);
  echo("file saved");
  exit();
}

http_response_code(400);
echo("file not saved");
exit();


?>
