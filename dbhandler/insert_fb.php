<?php
	include("../connectdb.php"); 
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
     
    
	
	// เชค forgien key  ยังงายยยยยยยยยยยยย
	$fb_id = $_POST['fb_id'];
	

	if($fb_id!=''){
		
		$sql_update = "update shop_fb_feed SET fb_id = '$fb_id' WHERE `shop_fb_feed`.`shop_fb_feed_id`= 
																										(SELECT max(shop_fb_feed_id) FROM shop_detail WHERE user_id=".$_SESSION['id'].")";
	mysql_query($sql_update) or die(mysql_error());	

	echo("Update Facebook Page name success!");
		
	}

		
	
?>