<?php
session_start();
include("connectdb.php");
$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'Shop'; //2

$query = "SELECT * FROM shop_album WHERE real_name = 'Album" . $_GET['album'] . "' AND shop_id = " . $_GET['shop'];
$result=mysql_query($query); 
$detail = mysql_fetch_assoc($result);
$sql = "UPDATE shop_album SET amount_pic = " . ($detail['amount_pic']-1) . " WHERE real_name = 'Album" . $_GET['album'] . "'";
$result = mysql_query($sql);
$albumid = $detail['album_id'];
print_r($sql);
 
$tempFile = $_GET['filename'];          //3
$query = "SELECT * FROM shop_photo WHERE album_id = " . $albumid . " AND origin_name='" . $tempFile. "'";
$result=mysql_query($query); 
$detail = mysql_fetch_assoc($result);
unlink($detail['photo_path']); //6
$sql = "DELETE FROM shop_photo WHERE album_id = " . $albumid . " AND origin_name='" . $tempFile . "' LIMIT 1";
$result = mysql_query($sql);
print_r($sql);

print_r("Successfully deleted.");
?>     