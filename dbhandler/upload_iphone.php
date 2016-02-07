<?php
session_start();
include("../connectdb.php");
include('sqlhandler.php');

$file = $_FILES["file"];
$photo_name = $file["name"];
$photo_path = $file["tmp_name"];
$shop_id = $_SESSION['shop_id'];
$section = "iphoneBackground";
$countOuery = "SELECT shop_style FROM shop_detail WHERE shop_id = '$shopID'";
$styleID = mysql_result(mysql_query($countOuery), 0);

if($shop_id && $styleID){
  if(save_file($shop_id, $photo_name, $photo_path, $section))
  {
    http_response_code(200);
    echo(json_encode(array("message" => "style_photo_updated", "shopID" => $shop_id, "styleID" => $styleID)));
    exit();
  }
}
if($shop_id && !$styleID)
{
  if(save_file($shop_id, $photo_name, $photo_path, $section))
  {
    http_response_code(200);
    echo(json_encode(array("message" => "style_photo_updated", "shopID" => $shop_id, "styleID" => $styleID)));
    exit();
  }
}

if(!$shop_id && !$styleID)
{

}

http_response_code(400);
echo("file not saved");
exit();


?>
