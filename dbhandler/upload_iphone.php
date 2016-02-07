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
    $save_photo_query = "UPDATE shop_style SET shop_bg_image = '$photo_name' WHERE style_id = $styleID";
    if(mysql_result($save_photo_query)){
      http_response_code(200);
      echo(json_encode(array("message" => "style_photo_updated", "shopID" => $shop_id, "styleID" => $styleID)));
      exit();
    }
    else{
      http_response_code(400);
      echo(mysql_error());
      exit();
    }
  }
}
if($shop_id && !$styleID)
{
  if(save_file($shop_id, $photo_name, $photo_path, $section))
  {
    $newStyleQuery = "INSERT INTO shop_style (shop_bg_image) VALUES ('$photo_name')";
    if(mysql_query($newStyleQuery)){
      $styleID = mysql_insert_id();
      http_response_code(200);
      echo(json_encode(array("message" => "style_photo_updated", "shopID" => $shop_id, "styleID" => $styleID)));
      exit();
  }
  else{
    http_response_code(400);
    echo(mysql_error());
    exit();
  }
  }
}

if(!$shop_id)
{
  http_response_code(400);
  echo(json_encode(array("error"=> "no_shop_id")));
}

http_response_code(400);
echo(json_encode(array("error"=> "unknown", "sql_error"=> mysql_error() )));
exit();


?>
