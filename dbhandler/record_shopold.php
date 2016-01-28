<?php
	include("../connectdb.php");
    header("Content-Type: text/html; charset=UTF-8");
    session_start();

  $file = $_FILES["shop_photo"];
	$shop_photo_name = $file["name"];
	$shop_photo = $file["tmp_name"];
	$shop_name = $_POST['shop_name'];
	$shop_subtitle = $_POST['shop_subtitle'];
	$shop_description = $_POST['shop_description'];
	$shopID = $_SESSION['shop_id'];

	function clean_dir($dir){
		$files = glob($dir . '*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}
	}

	function save_file($shopID, $photo_name, $photo_path, $table)
  {
		if(!$photo_path)
		{
			return false;
		}
		$basepath = "/var/www/html/shop/" . $shopID;
		mkdir($basepath);
		$basepath = $basepath . "/shopPhoto/";
		mkdir($basepath);
		clean_dir($basepath);
		move_uploaded_file($photo_path, $basepath . $photo_name);
 	 	$sql_update = "update shop_detail SET shop_photo_name = '" . $photo_name ."' WHERE `shop_id`= ".$shopID;
		if(mysql_query($sql_update) == true){
			http_response_code(200);
		}
		else{
			http_response_code(400);
			echo("photo name disaster");
			exit();
		}
  }

	if($_SESSION['shop_id'])
	{
		$sql_update = "update shop_detail SET shop_name = '$shop_name', shop_subtitle = '$shop_subtitle', shop_description = '$shop_description' WHERE `shop_id`= ".$_SESSION['shop_id'];
			if(mysql_query($sql_update) == true){
				save_file($_SESSION['shop_id'], $shop_photo_name, $shop_photo, "shop_detail");
				http_response_code(200);
				echo($shopID + " shop updated");
				exit();
		}
		else{
			http_response_code(403);
			echo mysql_error();
			exit();
		}

	}
	else
	{
		$sql_update = "INSERT INTO shop_detail (shop_name, shop_subtitle, shop_description) VALUES ('".$shop_name."','". $shop_subtitle. "','" . $shop_description . "')";
		//mysql_query($sql_update)// or die(mysql_error());
			if(mysql_query($sql_update) == true){
				$shopID = mysql_insert_id();

				$sql_update = "INSERT INTO r_user_shpop (user_id, shop_id) VALUES (".$_SESSION['id'].", ". $shopID. ")";
				if(mysql_query($sql_update) == true){
					$_SESSION['shop_id'] = $shopID;
					save_file($_SESSION['shop_id'], $shop_photo_name, $shop_photo, "shop_detail");
					http_response_code(200);
					echo($shopID);
					exit();
				}
				else
				{
					http_response_code(403);
					echo mysql_error();
					exit();
				}
			}
			else{
				http_response_code(403);
				echo mysql_error();
				exit();
			}
	}
	header("HTTP/1.0 404 Not Found"); // for testing
	echo("this is a really fatal error you should never see");
	// header("Location: ../genpage.php?shop=".$shopID); /* Redirect browser */
exit();
?>
