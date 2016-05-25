<?php
	/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	*/
	session_start();
	include_once("../vendor/fb_inc/config.php");
	$homeurl = 'http://appod.co/allaboutshop/insert_fb.php';  //return to home
	$fbPermissions = 'email';  //Required facebook permissions
	include("../connectdb.php");
    header("Content-Type: text/html; charset=UTF-8");

			$pageid = $_POST['fb_id'];
			try{
				$page_detail = $facebook->api('/' . $pageid);
		} catch(Exception $e){
			http_response_code(400);
			echo($e->getMessage());
		}


	if(!$page_detail['id'])
	{
    http_response_code(400);
    die();
	}
	else
	{
		$sql = "SELECT * FROM shop_fb_feed WHERE shop_id=".$_SESSION['shop_id'];
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);

		if ($rows >= 1)
		{
			$sql_update = "update shop_fb_feed SET fb_id = '".$page_detail['id']."', fb_name = '".$page_detail['name']."' WHERE shop_id=".$_SESSION['shop_id'];
		}
		else
		{
			$sql_update = "INSERT INTO shop_fb_feed SET fb_id = '".$page_detail['id']."', fb_name = '".$page_detail['name']."', shop_id=".$_SESSION['shop_id'];
		}
		mysql_query($sql_update) or die(mysql_error());
    http_response_code(200);
    header('Content-Type: application/json');
    $page_result = $facebook->api('/' . $page_detail['id'] . '/feed?fields=picture,message,created_time');
    echo json_encode($page_result);
    die();

	}

?>
