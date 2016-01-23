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
    var pass1 = document.getElementById("user_pass").value;
    var pass2 = document.getElementById("user_pass_re").value;
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
    
    else
    {
      var message = document.getElementById("error");
      message.innerHTML = "invalid email";
      return false;
    }
  }
    </script>
    

  </head>

  <body class="hold-transition skin-Purple sidebar-mini">
    
       
<?php include ('header.php');?>




    <!-- main body-->  

	<!--<img src="../images/pic01.jpg" width="140px" height="140px" class="img-circle"> -->
	<img src="data:image/jpeg;base64,<?php echo base64_encode($recordset['user_photo']); ?>" width="140px" height="140px" class="img-circle">
	<form action="insert_user_photo.php" method="POST" enctype="multipart/form-data">
		<input type="file" name="image" />
		<input type="submit" />
	</form>
                    
          <!-- =========================================================== -->

<div class="col-md-6">
	            
	            <div class="box box-warning">
                	<div class="box-header with-border">
						<h3 class="box-title">All about your shop</h3>
                	</div><!-- /.box-header -->
					
                 <div class="box-body">
						

                
        <button  class="btn btn-default btn-flat" onclick="window.location.href='dashboard.php'">Dashboard</button>
        
        </br>
        <button  class="btn btn-default btn-flat" onclick="window.location.href='genpage.php'">Edit your app</button>
        </section>
        </div>
        
        
	                <div class="box-footer">
	                    
	                </div>
				</div><!-- end box box-->	
          
            </div><!-- /.col -->




     </div>   <!-- end main body-->  

<?php include ('footer.php');?>

    </body>
</html>
