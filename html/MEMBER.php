<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<?php
    header("Content-Type: text/html; charset=UTF-8");
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass="P@ssw0rd"; // MySql Password
    $dbname="user"; // Database Name
	$tblname="user_login";
 
    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย
 

?>

</head>

<body>


<table border="1" width="500">
    <tbody>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Pass</th>
            <th>call_id</th>
        </tr>
        <?php
            $sql="Select * From user_login"; // คำสั่ง sql อ่านข้อมูลจากตาราง tbl_name
            $result=mysql_query($sql); // คิวรี่คำสั่ง sql
            $num=mysql_num_rows($result); // ตรวจสอบจำนวน record ที่คิวรี่ออกมา
            if($num>0){ // ถ้าจำนวน record มากกว่า 0
                $count=1; // กำหนดตัวแปร count เพื่อระบุตำแหน่ง record
                while($recordset=mysql_fetch_assoc($result)){ // วน loop ดึงข้อมูลออกมา ทีละ record
        ?>
        <tr>
            <td align="center"><?php echo $recordset['id']; ?></td>
            <td><?php echo $recordset['user_email']; ?></td>
            <td><?php echo $recordset['user_pass']; ?></td>
            
        </tr>
        <?
                    
                }
            }
        ?>
    </tbody>
</body>
</html>