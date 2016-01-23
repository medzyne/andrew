<?php
	include("check/check_login.php");
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPODS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <?php
    header("Content-Type: text/html; charset=UTF-8");
	session_start();
	if($_GET['shop'] != '')
	{
		$_SESSION['shop_id'] = $_GET['shop'];
	}
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass="P@ssw0rd"; // MySql Password
    $dbname="user"; // Database Name
   
 
    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย

	$follower = mysql_query("select * from r_follower WHERE  shop_id=".$_SESSION['shop_id']);
    $rows = mysql_num_rows($follower);
    
	$result = mysql_query("select * from shop_detail WHERE  shop_id=".$_SESSION['shop_id']); 
    $shopdetail = mysql_fetch_assoc($result);
    ?>

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
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
	      
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
           
            <div class="col-xs-6">
	            
	            
	            
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php echo "<h3>".($rows == '' ? 0 : $rows)."</h3>"; ?>
                  <p>Total followers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="../appods/MEMBER.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
					<h3><?=$shopdetail['page_view']?></h3>
                  <p>Total visits</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="pull-left header"><i class="fa fa-line-chart"></i> Total visit</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                </div>
              </div><!-- /.nav-tabs-custom -->

             
             
             
             
             
              
              
              
              
              
              
           


  
  
  
  
  

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

     
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

  <?php include ('includes/footer.php');?>
  
  </body>
  

</html>
