 <?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();    
    include("connectdb.php"); 
    $sql = "SELECT * FROM user_login WHERE  user_id='".$_SESSION['id']."'";
    
    $result=mysql_query($sql); 
    $data=mysql_fetch_assoc($result)
	
	// เชค forgien key  ยังงายยยยยยยยยยยยย
	
	$user_pass = $data['user_pass'];
	
	$user_pass_old = $_POST['user_pass_old'];
	
	$user_pass_new = $_POST['user_pass_new'];
	
	
	
	if(($user_pass_old && $user_pass_new)!=''){
	
		if($user_pass == $user_pass_old){
		
		$sql_update = "update user_login set user_pass = '$user_pass_new' where id='".$_SESSION['id']."'";
	mysql_query($sql_update) or die(mysql_error());	

	echo("Update Password!");
		
	}
	
	
	else

		echo("your current password not correct!");

		
		
	}
	
	

	
		
	
?>