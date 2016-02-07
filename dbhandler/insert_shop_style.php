<?php
include("../connectdb.php");
include("sqlhandler.php");

header("Content-Type: text/html; charset=UTF-8");
session_start();

$userID = $_SESSION["id"];
$shopID = $_SESSION["shop_id"];
$shop_theme_color = $_POST["shop_theme_color"];
$shop_bg_color = $_POST["shop_bg_color"];
$shop_layout = $_POST["shop_layout"];

$countOuery = "SELECT shop_style FROM shop_detail WHERE shop_id = '$shopID'";
$styleID = mysql_result(mysql_query($countOuery), 0);

if($shopID && $styleID)
{
  $updateStyle = "UPDATE shop_style SET shop_bg_color='$shop_bg_color', shop_theme_color='$shop_theme_color', shop_layout='$shop_layout' WHERE shop_style_id=".$styleID;
  if(mysql_query($updateStyle) == true)
  {
    http_response_code(200);
    echo(json_encode(array("message" => "style_updated", "shopID" => $shopID, "styleID" => $styleID)));
    exit();
  }
}

if($shopID && !$styleID){
  $newStyleQuery = "INSERT INTO shop_style (shop_theme_color, shop_bg_color, shop_layout) VALUES ('$shop_theme_color', '$shop_bg_color', '$shop_layout')";
  if(mysql_query($newStyleQuery) == true)
  {
    $styleID = mysql_insert_id();
    $addStyleToShop = "UPDATE shop_detail SET shop_style = '$styleID' WHERE shop_id = '$shopID'";
    if(mysql_query($addStyleToShop) == true)
    {
      http_response_code(200);
      echo(json_encode(array("message" => "style_created", "shopID" => $shopID, "styleID" => $styleID)));
      exit();
    }
  }
}

if(!$shop_id)
{
  http_response_code(400);
  echo(json_encode(array("error"=> "no_shop_id")));
  exit();
}

http_response_code(400);
echo(json_encode(array("error"=> "unknown", "sql_error"=> mysql_error() )));
exit();




 ?>
