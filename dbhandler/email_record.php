

    
<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
     
    
	
	// เชค forgien key  ยังงายยยยยยยยยยยยย
	$user_email = $_POST['user_email'];

	if($user_email!=''){
		
		$sql_update = "update user_login set user_email = '$user_email' where id='".$_SESSION['id']."'";
	mysql_query($sql_update) or die(mysql_error());	

	echo("Update email success!");
		
	}

		
	
?>



