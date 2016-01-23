<?php

function post($key) {
    if (isset($_POST[$key]))
        return $_POST[$key];
    return false;
}

// setup the database connect

include("connectdb.php");

mysql_select_db('user', $cxn);

// check if we can get hold of the form field
if (!post('my_value'))
    exit;

// let make sure we escape the data
$val = mysql_real_escape_string(post('my_value'), $cxn);


// lets setup our insert query

if($val!=''){
		
		$sql_update = "update user_telephone set call_num = '$val' where call_id= '3'";
	mysql_query($sql_update) or die(mysql_error());	
);

// lets run our query
$result = mysql_query($sql_update, $cxn);

// setup our response "object"
$resp = new stdClass();
$resp->success = false;
if($result) {
    $resp->success = true;
}

print json_encode($resp);
?>