<?php
include("connectdb.php");
if(isSet($_GET['username'])) 
{
	$username = $_GET['username'];
	$query = mysql_query("select * from user_login where user_email='".$username."'");
	$rows = mysql_num_rows($query);
	if($rows == 0)
	{
		echo 'OK';
	}
	else
	{
		echo '<font color="red">The username <strong>'.$username.'</strong>'.' is already in use.</font>';
	}
}
?>     