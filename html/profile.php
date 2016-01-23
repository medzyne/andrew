<?php
	include("check_login.php");
		

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APPODS | Profile </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
   <script>
  function validate() 
  {
    var email = document.getElementById("user_email").value;
    var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var pass1 = document.getElementById("user_pass_new").value;
    var pass2 = document.getElementById("user_pass_firm").value;
    if(regexEmail.test(email))
    {
      if(pass1!==pass2)
        {
          var message1 = document.getElementById("passerror");
          message.innerHTML = "Passwords donot match";
          return false;
        }

      else return true;

      
    }
    
    if( email ==''){
	    
	    return true;
    }
    
    
    else
    {
      var message = document.getElementById("error");
      message.innerHTML = "invalid email";
      return false;
    }
  }

  function myFunction() 
  {
        var pass1 = document.getElementById("user_pass_new").value;
        var pass2 = document.getElementById("user_pass_firm").value;
        if (pass1 != pass2) 
    {
            //alert("Passwords Do not match");
            var message = document.getElementById("passerror");
            message.innerHTML = "Passwords Do not match";
            return false;
            //document.getElementById("user_pass").style.borderColor = "#E34234";
            //document.getElementById("user_pass_re").style.borderColor = "#E34234";
        }
        else {
            return validate();
            //alert("Passwords Match!!!");
        }
    }
	function deleteitem(code) {
		alert("shop " + code.substring(3));
		//window.location.assign("delete_shop.php?shop=" + code.substring(3));
	}
	
	function edititem(code) {
		//alert("shop " + code);
		window.location.assign("createApp.php?shop=" + code.substring(4));
		//window.location.assign("http://www.google.com");
	}
	
	function OpenDashboard(code) {
		window.location.assign("dashboard.php?shop=" + code.substring(4));
	}
</script>    




  </head>

<body class="hold-transition skin-Purple sidebar-mini">
	<?php include ('header.php');?>
    <div class="wrapper">
        <section class="content-header">
          <h1>
            Profile Page
            <small>Let the world know who you are</small>
          </h1>
        </section>  
	<div class="row">
		<div class="col-md-6" >
	    	

	    	<div class="box box-submit">
            	<div class="box-header with-border">
					<h3 class="box-title">All about you</h3>
            	</div><!-- /.box-header -->

				<div class="box-body">		
					<form onsubmit="return myFunction();" method="POST" action="allaboutyou/record.php" enctype="multipart/form-data" >
						<!-- text input -->		
						<div align="center">
							<label>Change your shop photo</label>
							</br>
							<img src="data:image/jpeg;base64,<?php echo base64_encode($recordset['user_photo']); ?>" width="140px" height="140px" class="img-circle">
							<input type="file" name="image" />
						</div>	
				
					<div class="row">
						<div class="col-md-6" >
							<div>
								<?php
									$tblname_a="user_login";
			    					$sql_a = "SELECT * FROM user_login WHERE  id='".$_SESSION['id']."'"; 
								    $result_a=mysql_query($sql_a); 
								    $recordset_a=mysql_fetch_assoc($result_a)
								?>
								<label>Email</label>
								<?php echo $recordset_a['user_email']; ?>
								<label id="error" style="color:red"></label>
								<input type="text" class="form-control" placeholder="update your email..." name="user_email" id="user_email">
			      			</div>
				  			<div>
					  			<label>Mobile</label>
					  			<?php echo $recordset_a['user_phone']; ?> &nbsp;
				  				<input type="text" class="form-control" placeholder="update your mobile number..." name="call_num" id="call_num">	
			      			</div>
	      				</div>

						<div class="col-md-6" >
			      			<div>
					  			<label>Old password</label>
				  				<input type="text" class="form-control" placeholder="let we know your current password first" name="user_pass_old" id="user_pass_old">	
			      			</div>
			      			<div>
					  			<label>New password</label>
				  				<input type="text" class="form-control" placeholder="update your new password..." name="user_pass_new" id="user_pass_new">	
			      			</div>
			      			<div>
					  			<label>Confirm new password</label>
				  				<input type="text" class="form-control" placeholder="give me your new password again..." name="user_pass_firm" id="user_pass_firm">	
				  				<label id="passerror" style="color:red"></label>
			      			</div>
			      		</div>								
	    			</div> 
		            <div class="box-footer text-right">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
	                </form>
				</div><!-- end box box-->	
          
        </div><!-- /.col -->
		<div class="col-md-6">
		</div>     
    </div> <!--end row--!>          

          <!-- =========================================================== -->

	<div class="col-md-6">
		<div class="box box-submit text-center">
			<div class="box-body">
				<!--<button  class="btn btn-default btn-flat" onclick="window.location.href='dashboard.php'">Dashboard</button>
		        &nbsp;-->
		        <button  class="btn btn-default btn-flat" onclick="window.location.href='createApp.php'">Create your app</button>
		         &nbsp; 
		    </div>
	   
			<div >
				<table border="1">
				<tr>
					<th></th> 
					<th>Shop ID</th>
					<th>Shop Name</th>
					<th>Image</th>
					<th>Edit</th>
					<th>Delete</th>
					<th>Dashboard</th>
				  </tr>
				<?php
					$sql = "SELECT * FROM shop_detail WHERE EXISTS (SELECT * FROM r_user_shop WHERE user_id=".$_SESSION['id'].")";
				$result = mysql_query($sql);
				
				if(mysql_num_rows($result)>0) 
				{
					$i = 0;
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) 
					{
						echo '<tr>';
							echo '<td><input type="checkbox" id="chk'.$row['shop_id'].'" name="item'.$i.'"></td>';
							echo '<td>'.$row['shop_id'].'</td>';
							echo '<td>'.$row['shop_name'].'</td>';
							$image = '<img src="data:image/jpeg;base64,'.base64_encode($row['shop_photo']).'" width="50px" height="50px" class="img-circle">';
							echo '<td>'.$image.'</td>';
							$edit_btn = '<td><button id="edit'.$row['shop_id'].'" class="btn btn-default btn-flat" onclick="edititem(this.id)">Edit</button></td>';
							echo $edit_btn;
							$delete_btn = '<td><button id="del'.$row['shop_id'].'" class="btn btn-default btn-flat" onclick="deleteitem(this.id)">Delete</button></td>';
							echo $delete_btn;
							$dashboard_btn = '<td><button id="dash'.$row['shop_id'].'" class="btn btn-default btn-flat" onclick="OpenDashboard(this.id)">Dashboard</button></td>';
							echo $dashboard_btn;
						echo '</tr>';
						//printf ("ID: %s  Name: %s", $row[0], $row["name"]);
						$i++;
					}
					
					echo "</table>";
					echo '<input type="hidden" id="num" value="'.$i.'" />';
				}
				else
				{
					echo "No Data";
				}
				?>
				</table>
			</div>
		</div>
	</div><!-- /.col right -->

</div>   <!-- end main body-->  

</body>
</html>
