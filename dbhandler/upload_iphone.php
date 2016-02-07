<?php
session_start();
include("../connectdb.php");
include('sqlhandler.php');

$file = $_FILES["file"];
$photo_name = $file["name"];
$photo_path = $file["tmp_name"];
$shop_id = $_SESSION['shop_id'];
$section = "iphoneBackground";
$countOuery = "SELECT shop_style FROM shop_detail WHERE shop_id = '$shop_id'";
$styleID = mysql_result(mysql_query($countOuery), 0);

if($shop_id && $styleID){
  if(save_file($shop_id, $photo_name, $photo_path, $section))
  {
    $save_photo_query = "UPDATE shop_style SET shop_bg_image = '$photo_name' WHERE shop_style_id = '$styleID'";
    if(mysql_query($save_photo_query)){
      http_response_code(200);
      echo(json_encode(array("message" => "style_photo_updated", "shopID" => $shop_id, "styleID" => $styleID)));
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
      $addStyleToShop = "UPDATE shop_detail SET shop_style = '$styleID' WHERE shop_id = '$shop_id'";
      if(mysql_query($addStyleToShop)){
        http_response_code(200);
        echo(json_encode(array("message" => "style_photo_created", "shopID" => $shop_id, "styleID" => $styleID)));
        exit();
    }
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
