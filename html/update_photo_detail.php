<?php
session_start();
include("connectdb.php");

$query = "UPDATE shop_photo SET description = '" . $_GET['des'] . "' WHERE photo_id = " . $_GET['photo'];
$result=mysql_query($query); 
//echo $query;
echo "Description Update!"
?>