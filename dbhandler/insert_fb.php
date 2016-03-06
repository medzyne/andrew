<meta property="fb:app_id" content="1564077270549073" />
<meta property="og:title" content="appod" />
<meta property="og:url" content="http://appod.co/allaboutshop/insert_fb.php"/>
<meta property="og:description" content="apped"/>
<meta property="og:site_name" content="DuckLabs"/>
<meta property="oog:type" content="Other"/>
<?php
	session_start();
	include_once("../vendor/fb_inc/config.php");
	$homeurl = 'http://appod.co/allaboutshop/insert_fb.php';  //return to home
	$fbPermissions = 'email';  //Required facebook permissions
	include("../connectdb.php"); 
    header("Content-Type: text/html; charset=UTF-8");
	
	$pageid = $_POST['fb_id'];
	$page_detail = $facebook->api('/' . $pageid);
	
	if(!$page_detail)
	{
		$output = "<h1>Not found this page!!</h1>";
		$output .= '<br/><a href="genpage.php">Back</a>'; 
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
		
		echo $sql_update;
		mysql_query($sql_update) or die(mysql_error());	

		$output = "Update Facebook Page name success!";
		
		header('Location: http://appod.co/genpage.php?shop='.$_SESSION['shop_id']);
	}
	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Get Facebook Page Album</title>
<style type="text/css">
h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
Hello
<div>
<?php echo $output; ?>
</div>

</body>
</html>