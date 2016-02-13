<?php
session_start();
include("../connectdb.php");
include('sqlhandler.php');


if($_SESSION['shop_id'] != $_GET["id"])
{
  $_SESSION['shop_id'] = $_GET["id"];
  echo("mismatch shop_id");
}

$shop_id = $_SESSION['shop_id'];



$getAll = "SELECT shop_detail.* , shop_call.* , shop_video.*
FROM shop_detail
JOIN shop_call ON shop_detail.shop_id = shop_call.shop_id
JOIN shop_video ON shop_detail.shop_id = shop_video.shop_id
WHERE shop_detail.shop_id = $shop_id";

$theQuery = mysql_query($getAll);
if($theQuery)
{
  http_response_code(200);
  $result = array();
  while($r = mysql_fetch_assoc($theQuery)){
    array_push($result, $r);
    //$result["data"][] = $r;
  }
  print(json_encode($result));
  exit();
}
else {
  http_response_code(400);
  echo(json_encode(array("error"=> "sql", "sql_error"=> mysql_error() )));
  exit();
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
