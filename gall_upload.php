<?php
session_start();
include("connectdb.php");
$ds = DIRECTORY_SEPARATOR;  //1
$storeFolder = 'shop'; //2
 
if (!empty($_FILES)) 
{  
    $tempFile = $_FILES['file']['tmp_name'];          //3                  
	$query = "SELECT * FROM shop_detail WHERE shop_id=" . $_SESSION['shop_id'];
	$result=mysql_query($query); 
    $detail = mysql_fetch_assoc($result);
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds . $detail['shop_name'];  //4 
	if (!is_dir($targetPath)) 
	{
		mkdir($targetPath, 0777);
		chmod ($targetPath, 0777); 
	}
	$targetPath = $targetPath . $ds . $_POST['Album'.$_GET['album']];
	if (!is_dir($targetPath)) 
	{
		mkdir($targetPath, 0777);
		chmod ($targetPath, 0777); 
	}
	$targetPath = $targetPath . $ds;
	$num = 1;
	if(!$_GET['albumid']) 
	{
		$query = "INSERT INTO shop_album (album_name, real_name, max_pic, shop_id) VALUES ('";
		$query .= $_POST['Album'.$_GET['album']] . "', 'Album" .$_GET['album'] . "', 10, " . $_SESSION['shop_id'] . ")";
		mysql_query($query); 
		$album_id = mysql_insert_id();
	}
	else
	{
		$album_id = $_GET['albumid'];
	}
	$query = "SELECT * FROM shop_album WHERE album_id=".$album_id;
	$result=mysql_query($query); 
    $detail = mysql_fetch_assoc($result);
	$num = $detail['max_pic'];
	
	//$targetFile =  $targetPath. $_FILES['file']['name'];  //5
	$targetFile = "";
	for ($i = 0 ; $i < $num ; $i++)
	{
		if(!file_exists($targetPath . 'Pic'.$i.'.png'))
		{
			$targetFile = $targetPath . 'Pic'.$i.'.png';
			break;
		}
	}
	move_uploaded_file($tempFile,$targetFile); //6
	chmod($targetFile, 0777);
	$sql = "INSERT INTO shop_photo (photo_path, album_id ,origin_name) VALUES ('".$targetFile."', ".$album_id.", '".$_FILES['file']['name']."')";
	$result = mysql_query($sql); 
	$sql = "UPDATE shop_album SET amount_pic = " . ($detail['amount_pic']+1) . " WHERE album_id = " . $album_id;
	$result = mysql_query($sql); 
}

?>     