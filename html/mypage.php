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

	if (isset($_POST['submit'])) {

		if (empty($_POST['user)email']) || empty($_POST['user_pass'])) {
			$error = "Username or Password is invalid";
		}
		else{

				$user_email = $_POST['user_email'];
				$user_pass = $_POST['user_pass'];
     
    			$host="localhost";
    			$user="root"; // MySql Username
    			$pass="root"; // MySql Password
    			$dbname="user"; // Database Name
 				$tblname="user_login";
 
    			$conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
    			mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
    			mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย
 
				$query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
				$rows = mysql_num_rows($query);

				if ($rows == 1) {
		
					$_SESSION['login_user']=$user_email; // Initializing Session
					header("location: index.php"); // Redirecting To Other Page
				} 

				else {

					$error = "Username or Password is invalid";
				}
	
	mysql_close($connection); // Closing Connection

			}
}

?>
	


</body>
</html>