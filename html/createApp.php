<?php
	include("check_login.php");
	include("connectdb.php");
	session_start();
	if($_GET['shop'])
{
	$_SESSION['shop_id'] = $_GET['shop'];
}
if($_SESSION['shop_id']){
	$sql = "SELECT * FROM shop_detail WHERE  shop_id=".$_SESSION['shop_id'];
	$result=mysql_query($sql);
	$shopdetail=mysql_fetch_assoc($result);
}
?><!DOCTYPE html>
<html>
  <head>
		<link rel="stylesheet" type="text/css" href="/andrew/css/main.css">
		<link rel="stylesheet" href="andrew/node_modules/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://52.11.4.98/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://52.11.4.98/dist/css/duck.css">
		<link rel="stylesheet" href="http://52.11.4.98/dist/css/dropzone.css">
		<link rel="stylesheet" href="http://52.11.4.98/css/animate.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPOD | </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  </head>

  <body class="hold-transition skin-Purple sidebar-mini blur_white">
	  <?php include ('header.php');?>
		<div id="reactComponents">
	  </div>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//52.11.4.98/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//52.11.4.98/js/bootstrap.min.js"></script>
		<script src="andrew/node_modules/jquery/dist/jquery.js"></script>
		<script src="andrew/appCreate.js"></script>


		<?php include ('includes/footer.php');?>


  </body>
</html>
