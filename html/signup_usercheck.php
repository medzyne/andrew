<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
    header("Content-Type: text/html; charset=UTF-8");
    
	include("connectdb.php"); 
  
		$user_email = $_POST['username'];
		$user_pass = $_POST['user_pass'];
		$_SESSION['email'] = $_POST['user_email'];
		$_SESSION['password'] = $_POST['user_pass'];

		$query = mysql_query("select * from user_login where user_email='$user_email'");
		$rows = mysql_num_rows($query);
		//echo "select * from login where user_pass='$user_pass' AND user_email='$user_email'";


		if ($rows >= 1) {

			//$_SESSION['login_user']=$user_email; // Initializing Session
			//echo "found";
			//header('location:http://www.google.com'); // Redirecting To Other Page
			echo "This email already has been registered";
			

		} 

		else {

			//echo $_SESSION['email'];
			$query = "insert into user_login set user_email = '".$user_email."', user_pass = '".$user_pass."' ";
			mysql_query($query) or die(mysql_error());
			echo $query;
				
			$check_id = "(SELECT MAX(`id`) FROM `user_login` WHERE `user_email` = '".$user_email."')";
			$sql_add = "insert into user_detail set user_id = ".$check_id;
			echo $sql_add;
			mysql_query($sql_add) or die(mysql_error());
			echo "<script type='text/javascript'>window.location.href='signup_record.php';</script>";
		}
	

?>

</body>
</html>