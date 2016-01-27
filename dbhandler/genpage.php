<?php
	include("check_login.php");
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPOD | </title>
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
	unset($_SESSION['shop_id']);
    if($_GET['shop'])
	{
		$_SESSION['shop_id'] = $_GET['shop'];
	}
	
    $sql = "SELECT * FROM shop_detail WHERE  shop_id=".$_SESSION['shop_id'];
    $result=mysql_query($sql); 
    $shopdetail=mysql_fetch_assoc($result);
    ?>

  </head>

  <body class="hold-transition skin-Purple sidebar-mini">
	<!-- main body-->  
	<div class="wrapper">
	    <?php include ('header.php');?>
        <section class="content-header">
	        <h1> Gen page
	        	<small>create your own world here</small>
	        </h1>
	        </br></br>
	    </section>
	<div class="row"> <!--START ROW-->
	
		<div class="col-md-6">
			<!-- Custom Tabs LEFT -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" class="sliding-middle-out">1. Name Shop</a></li>
            <li><a href="#tab_2" data-toggle="tab" class="sliding-middle-out">2. Features </a></li>
            <li><a href="#tab_3" data-toggle="tab" class="sliding-middle-out">3. Templates </a></li>
           <!--<li><a href="#tab_4" data-toggle="tab" class="sliding-middle-out">4. Stroge</a></li> -->
          </ul>
		  
           <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <?php include("step1.php");?>
            </div><!-- /.tab1-pane -->
            <div class="tab-pane" id="tab_2">
              <?php include("step2.php");?>
            </div> <!-- /.tab2-pane -->
            <div class="tab-pane" id="tab_3">
              <?php include("step3.php");?>     
            </div><!-- /.tab3-pane -->
            <div class="tab-pane" id="tab_4">
              <?php include("step4.php");?>     
            </div><!-- /.tab4-pane -->
          </div> <!-- End TAB CONTENT-->
          

        </div><!-- END nav-tabs-custom-->
		</div>	
		<div class="col-md-6" >
				<?php include("sqp.php");?>
            
			
			
			
		</div>
	
  	</div>	<!-- end ROW-->  
  
  	</divv> <!--END WRAPPER-->
  	
     
     
     
     
<?php include ('includes/footer.php');?>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function viewdata(){
       $.ajax({
     type: "GET",
     url: "php/getdata.php"
      }).done(function( data ) {
    $('#viewdata').html(data);
      });
    }
    $('#save').click(function(){
  
  var nm = $('#nm').val();
  var gd = $('#gd').val();
  var pn = $('#pn').val();
  
  
  var datas="nm="+nm+"&gd="+gd+"&pn="+pn;
      
  $.ajax({
     type: "POST",
     url: "php/newdata.php",
     data: datas
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    });
    function updatedata(str){
  
  var id = $_SESSION['shop_id'];
  var nm = $('#nm'+str).val();
  var gd = $('#gd'+str).val();
  var pn = $('#pn'+str).val();
  
  
  var datas="nm="+nm+"&gd="+gd+"&pn="+pn;
      
  $.ajax({
     type: "POST",
     url: "php/updatedata.php?id="+id,
     data: datas
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    }
    function deletedata(str){
  
  var id = $_SESSION['shop_id'];
      
  $.ajax({
     type: "GET",
     url: "php/deletedata.php?id="+id
  }).done(function( data ) {
    $('#info').html(data);
    viewdata();
  });
    }
    </script>
  

  <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>



   
  </body>
</html>
