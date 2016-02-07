<?php
	include("../connectdb.php");
	include("sqlhandler.php");
    header("Content-Type: text/html; charset=UTF-8");
    session_start();



	// เชค forgien key  ยังงายยยยยยยยยยยยย
	$video_name = $_POST['video_name'];

	if(!$video_name)
	{
		http_response_code(400);
		echo("no video name");
		exit();
	}

	$video_url = $_POST['video_url'];

	if(!$video_url)
	{
		http_response_code(400);
		echo("no video url");
		exit();
	}

	$video_description = $_POST['video_description'];

  if(!$video_description)
	{
		http_response_code(400);
		echo("no video description");
		exit();
	}

	$shopID = $_SESSION['shop_id'];
	$video_count = ShopCount("shop_video", $shopID);

	if($video_url && $video_count > 0){

		$sql_update = "update shop_video set video_name = '$video_name', video_url = '$video_url', video_description = '$video_description' WHERE shop_id=".$shopID;
		mysql_query($sql_update) or die(mysql_error());

		echo(json_encode(array("message" => "youtube_updated", "shopID" => $shopID)));

	}
	if($shopID && $video_count == 0)
	{
		$query = "INSERT INTO shop_video (shop_id, video_url, video_name, video_description) VALUES ('$shopID','$video_url', '$video_name', '$video_description')";
		queryWithError($query, "new video added", $shopID);
		exit();
	}



?>
