<?php
include("check_login.php");
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);


if($image!='')

{
	
	//$sql = "INSERT INTO `user_detail` (`user_id`, `user_photo`, `user_photoname`) VALUES ('".$_SESSION['id']."', '{$image}', '{$image_name}')";
$sql = "UPDATE `user_detail` SET `user_photoname` ='".$image_name."', `user_photo` ='".$image."' WHERE `user_id` ='".$_SESSION['id']."'";
echo ("Update photo success!");
if (!mysql_query($sql)) { // Error handling
    echo "Something went wrong! :("; 
}
	
}


?>