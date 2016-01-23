<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

</head>

<body>

<?php
    header("Content-Type: text/html; charset=UTF-8");

    session_start(); // Starting Session
	$error=''; // Variable To Store Error Message

	//if (isset($_POST['submit'])) {

	if (empty($_POST['user_email']) || empty($_POST['user_pass'])) {
		$error = "Username or Password is invalid";
		echo $error;
	}
	else{

		include("connectdb.php"); 

		$user_email = $_POST['user_email'];
		$user_pass = $_POST['user_pass'];

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		//$connection = mysql_connect("localhost", "root", "root");
		// To protect MySQL injection for Security purpose
		//$use_email = stripslashes($user_email);
		//$user_pass = stripslashes($user_pass);
		//$user_email = mysql_real_escape_string($user_email);
		//$user_pass = mysql_real_escape_string($user_pass);
		// Selecting Database
		//$db = mysql_select_db("user", $connection);
		// SQL query to fetch information of registerd users and finds user match.
		//$query = mysql_query("select * from login where user_pass='$user_pass' AND user_email='$user_email'", $connection);
		$query = mysql_query("select * from user_login where user_pass='$user_pass' AND user_email='$user_email'");
		$rows = mysql_num_rows($query);
		//echo "select * from login where user_pass='$user_pass' AND user_email='$user_email'";


		if ($rows == 1) {

			//$_SESSION['login_user']=$user_email; // Initializing Session
			//echo "found";
			//header('location:http://www.google.com'); // Redirecting To Other Page
			$data = mysql_fetch_row($query);
			//echo $data[0];
			$_SESSION['id'] = $data[0];
			echo "<script type='text/javascript'>window.location.href='profile.php';</script>";
			
		} 

		else {

			$error = "Username or Password is invalid";
			echo $error;
		}

		mysql_close($connection); // Closing Connection

	}
//}

?>
	


</body>
</html>