<?php
	include("../connectdb.php");
    header("Content-Type: text/html; charset=UTF-8");
    session_start();



	// เชค forgien key  ยังงายยยยยยยยยยยยย
	$call_num = $_POST['call_num'];
	$call_branch = $_POST['call_branch'];
	$shopID = $_SESSION['shop_id'];
	$anyOuery = "SELECT FIRST(call_id) FROM shop_call WHERE shop_id =".$shopID;
	$call_id = mysql_query($anyOuery);


		http_response_code(404);
		echo $call_id;
		exit();



	if($call_num){
			$sql_update = "update shop_call SET call_num = '23123123131321' WHERE shop_id=". $shopID;
		if(mysql_query($sql_update) == true)
		{
			http_response_code(200);
			echo("number added");
			exit();
		}
		else{
			http_response_code(400);
			echo mysql_error();
			exit();
		}

	}

	http_response_code(400);
	echo("form did not contain valid stuff");
	exit();



?>
