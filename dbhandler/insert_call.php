<?php
	include("../connectdb.php");
    header("Content-Type: text/html; charset=UTF-8");
    session_start();



	// เชค forgien key  ยังงายยยยยยยยยยยยย
	$call_num = $_POST['call_num'];
	$call_branch = $_POST['call_branch'];
	$shopID = $_SESSION['shop_id'];
	$countOuery = "SELECT COUNT(*) FROM shop_call WHERE shop_id = ".$shopID;
	$shopCount =  mysql_result(mysql_query($countOuery), 0);

	if($call_num && $shopCount > 0){
			$sql_update = "update shop_call SET call_num = '$call_num' WHERE shop_id=". $shopID;
		if(mysql_query($sql_update) == true)
		{
			http_response_code(200);
			echo(json_encode(array("message" => "number updated", "shopID" => $shopID)));
			exit();
		}
		else{
			http_response_code(400);
			echo mysql_error();
			exit();
		}

	}
	if($call_num && $shopCount == 0)
	{
		if($shopID){
			$query = "INSERT INTO shop_call (shop_id, call_num, branch) VALUES ('$shopID','$call_num', '$call_branch')";
			if(mysql_query($query) == true)
			{
				http_response_code(200);
				echo(json_encode(array("message" => "number_created", "shopID" => $shopID)));
				exit();
			}
			else{
				http_response_code(400);
				echo mysql_error();
				exit();
			}
		}
	}

	if(!$shop_id)
	{
	  http_response_code(400);
	  echo(json_encode(array("error"=> "no_shop_id")));
	  exit();
	}

	http_response_code(400);
	echo(json_encode(array("error"=> "unknown", "sql_error"=> mysql_error() )));
	exit();



?>
