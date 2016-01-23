<?php
	session_start();
	if(!isset($_SESSION["id"]))
	{
		session_destroy();
		header("Location:login.php");
	}

    header("Content-Type: text/html; charset=UTF-8");
    session_start();
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass="P@ssw0rd"; // MySql Password
    $dbname="user"; // Database Name
    
 
  
    
    ?>

