

    
<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
     
   
   	

	$call_num = $_POST['call_num'];
	
	if($call_num!=''){
		
		$sql_update = "update user_telephone set call_num = '$call_num' where call_id='".$_SESSION['id']."'";
	mysql_query($sql_update) or die(mysql_error());	
	
	echo "Update phone number success!";
	}

	
	
?>


