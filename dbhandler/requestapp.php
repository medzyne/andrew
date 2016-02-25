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



$shopStyleQuery = "SELECT `shop_style`
FROM `shop_detail` WHERE shop_id = $shop_id";
$shopStyleID = mysql_result(mysql_query($shopStyleQuery), 0);

$table_names =
array("shop_detail","shop_activity",
"shop_album","shop_call",
"shop_loralty_card","shop_notification",
"shop_promotion", "shop_video"
);

function make_shopId_query($table_name, $shop_id){
  return "SELECT * FROM $table_name WHERE shop_id=$shop_id";
}

function add_shop_ids($list, $id)
{
  $ids = array();
  foreach($list as $item){
    array_push($ids, $id);
  }
  return $ids;
}

$table_names = array_map("make_shopId_query", $table_names,
add_shop_ids($table_names, $shop_id));

if($shopStyleID)
{
  $get_shop_style = "SELECT * FROM shop_style WHERE shop_style_id = $shopStyleID";
  array_push($table_names, $get_shop_style);
}

$results = array();

foreach($table_names as $query)
{
  $mysql_result = mysql_query($query);
  if($mysql_result){
    while($r = mysql_fetch_assoc($mysql_result))
    {
      array_push($results, $r);
    }
  }
}

http_response_code(200);
echo(json_encode($results));
exit();

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
