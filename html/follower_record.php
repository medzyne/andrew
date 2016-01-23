<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <title>Appods</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class= "landing">

    
<?php
    header("Content-Type: text/html; charset=UTF-8");
    session_start();
     
    include("connectdb.php"); 
	
	
	$f_name = $_POST['f_name'];
    $f_surname = $_POST['f_surname'];
    $f_email = $_POST['f_email'];
    $f_gender = $_POST['f_gender'];
    $f_dob = $_POST['f_dob'];
    $f_join_date = $_POST['f_dob'];

	$sql_add = "insert into follower set f_name = '$f_name', f_surname = '$f_surname', f_email = '$f_email', f_gender = '$f_gender', f_dob = '$f_dob', f_join_date = '$f_join_date'";
	mysql_query($sql_add) or die(mysql_error());
	
	$query = mysql_query("select f_id from follower where f_name='$f_name'");
	$data = mysql_fetch_row($query);
	$id = $data[0];
	//echo $_SESSION['id'];
	$sql_update = "update user_login set f_id = '$id' where id='".$_SESSION['id']."'";
	mysql_query($sql_update) or die(mysql_error());	
?>

<p> Add follower detail success!</p>

<!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/jquery.scrollex.min.js"></script>
            <script src="assets/js/jquery.scrolly.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
            <script src="assets/js/main.js"></script>

</body>
</html>