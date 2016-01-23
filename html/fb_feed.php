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
     
    $host="localhost";
    $user="root"; // MySql Username
    $pass="P@ssw0rd"; // MySql Password
    $dbname="user"; // Database Name
   
 
    $conn=mysql_connect($host,$user,$pass) or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้"); // เชื่อมต่อ ฐานข้อมูล
    mysql_select_db($dbname,$conn); // เลือกฐานข้อมูล
    mysql_query("SET NAMES utf8"); // กำหนด charset ให้ฐานข้อมูล เพื่ออ่านภาษาไทย


    //$query = mysql_query("select * from follower WHERE  user_login.id='".$_SESSION['id']."'");
	$query = mysql_query("select * from follower WHERE  id='".$_SESSION['id']."'");
    //$sql="SELECT * FROM   follower ";
    $rows = mysql_num_rows($query);
    
    
    ?>

  </head>
  <body class="hold-transition skin-Purple sidebar-mini">
    <div class="wrapper">

      <?php include ('header.php');?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php include('includes/left_side_bar.php');?>
      <?php 


      $request = new FacebookRequest(
        $session,
        'GET',
        '/healthy.duckyy/posts'
        );

      $response = $request->execute();
      $graphObject = $response->getGraphObject();
      /* handle the result */



      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Facebook feed
            <small>content from your Facebook fanpage</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Facebook feed</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
	      
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
           
             <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      
                      <th>Message</th>
                      <th>Create time</th>
                      <th>id</th>
                      
                    </tr>
                    <tr>
            <?php
              
               
                  $result=mysql_query($graphObject); 
                  $num=mysql_num_rows($result); 
                  if($num>0){ 
                      $count=1; 
                      while($recordset=mysql_fetch_assoc($result)){ 
              
              echo "<tr>";
              echo    "<td>".$recordset['message']."</td>";
              echo    "<td>".$recordset['create_date']."</td>";
              echo    "<td>".$recordset['id']."</td>";
              
              
              
                
              echo "</tr>";
                          
                      }
                  }
              ?>
          </tbody>
          </table>
    
                </div>








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
