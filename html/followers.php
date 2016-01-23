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
	    $tblname="follower";
	 
	    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
	    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
	    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย
	
	

	
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPOD | Followers</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   

   

  </head>
  <body class="hold-transition skin-Purple sidebar-mini">
    <div class="wrapper">

      <?php include ('header.php');?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include('includes/left_side_bar.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Followers
            <small>See who is following your shop</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Followers</li>
          </ol>
        </section>



<div class="row">
            <div class="col-xs-12">
              <div class="box">
                
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      
                      <th>Name</th>
                      <th>Surname</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Date of birth</th>
                      <th>Joined date</th>
                    </tr>
                    <tr>
					<?php
							
						$sql="SELECT * FROM  r_follower_shop LEFT JOIN follower ON r_follower_shop.follower_id = follower.f_id WHERE shop_id=".$_SESSION['shop_id'];
			            $result=mysql_query($sql); // คิวรี่คำสั่ง sql
			            $num=mysql_num_rows($result); // ตรวจสอบจำนวน record ที่คิวรี่ออกมา
			            if($num>0)
						{ // ถ้าจำนวน record มากกว่า 0
			                $count=1; // กำหนดตัวแปร count เพื่อระบุตำแหน่ง record
			                while($recordset=mysql_fetch_assoc($result))
							{ // วน loop ดึงข้อมูลออกมา ทีละ record
								echo "<tr>";
								echo    "<td>".$recordset['f_name']."</td>";
								echo    "<td>".$recordset['f_surname']."</td>";
								echo    "<td>".$recordset['f_email']."</td>";
								
								
								
								  if($recordset['f_gender']=="female")			        
								echo "<td><span class='label label-warning'> Female </span></td>";
								
													
							   else
							   echo "<td><span class='label label-primary'> Male </span></td>";			       
							   
								
								
								echo    "<td>".$recordset['f_dob']."</td>";
								echo    "<td>".$recordset['f_join_date']."</td>";
								echo "</tr>";		                    
			                }
			            }
			        ?>
					</tbody>
					</table>
    
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div> <!-- /.col -->
          </div><!-- /.row -->
             

              

       
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      

     
    </div><!-- ./wrapper -->

     <?php include ('includes/footer.php');?>

  </body>
</html>
