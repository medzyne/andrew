<?php
include("../check_login.php");
session_start();
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);


if($image!='')

{
	if($_SESSION['shop_id'])
	{
		$sql = "UPDATE `shop_detail` SET `shop_photo_name` ='".$image_name."', `shop_photo` ='".$image."' WHERE `shop_id`=".$_SESSION['shop_id'];
	}
	else
	{
		$sql = "INSERT INTO `shop_detail` (`user_id`, `user_photo`, `shop_photo_name`) VALUES ('".$_SESSION['id']."', '".$image."', '".$image_name."')";
		//$sql = "UPDATE `shop_detail` SET `shop_photo_name` ='".$image_name."', `shop_photo` ='".$image."' WHERE `shop_detail`.`shop_id`=
																										//(SELECT max(shop_id) FROM user_detail WHERE user_id=".$_SESSION['id'].")";
	}
//echo $sql;
//echo $_SESSION['id'];
echo $image_name."</br>";
echo $_FILES['image']['tmp_name'];
if (!mysql_query($sql)) { // Error handling
    echo mysql_error();
}
else
{
	echo(json_encode(array("message" => "phot_updated", "shopID" => $shopID)));
}

}


?>
