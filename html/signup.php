<?php
include('mypagelogin.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPOD | SIGN IN</title>
    <!-- Google Font -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
     <!-- Preloader -->
    <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print"/>

    <!-- Icon Font-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <!-- Style -->
    <link href="css/style_index_a.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
	<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/lte-ie7.js"></script>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">
  function validate() 
  {
    var email = document.getElementById("username").value;
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
      //else return check_username();
		else return true;
    }
    
    else
    {
      var message = document.getElementById("error");
      message.innerHTML = "invalid email";
      return false;
    }
  }
  
  function check_username()
	{
		var username = document.getElementById("username").value;
		$("#error").html('<img src="loader.gif" align="absmiddle" />&nbsp;Checking availability...');
		$.ajax({  
			type: "GET",  
			url: "check_username_duplicate.php?username="+username,  
			//data: "username="+ username,  
			//dataType: 'json',
			success: function(msg){  
				//alert(msg.toString());
				if(msg.indexOf("OK") > -1){
				//if(msg == "OK"){ 
					$("#username").removeClass('object_error'); // if necessary
					$("#username").addClass("object_ok");
					$("#error").html('<img src="tick.gif" align="absmiddle"/>&nbsp;<font color="Green"> Available </font>');
					document.getElementById("submit").disabled = false;
					return true;
				}  
				else{  
					$("#username").removeClass('object_ok'); // if necessary
					$("#username").addClass("object_error");
					$("#error").html(msg);
					document.getElementById("submit").disabled = true;
					return false;
				}  		   
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(jqXHR.status);
				alert(textStatus);
				alert(errorThrown);
			}   
		});
		return false;
	}

  function myFunction() 
  {
        var pass1 = document.getElementById("user_pass").value;
        var pass2 = document.getElementById("user_pass_re").value;
		
        if (pass1 != pass2) 
		{
            //alert("Passwords Do not match");
            var message = document.getElementById("passerror");
            message.innerHTML = "Passwords Do not match";
            return false;
            //document.getElementById("user_pass").style.borderColor = "#E34234";
            //document.getElementById("user_pass_re").style.borderColor = "#E34234";
        }
        else 
		{
			//return true;
			//return check_username() && validate();
            return validate();
            //alert("Passwords Match!!!");
        }
    }
    
	function test()
	{
		alert("test");
		return false;
	}
</script>
</head>

<body>

 <!-- Preloader -->
                
                
                
    <header id="HOME" style="background-position: 50% -125px;">
            <div class="section_overlay">
                <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <?php
                            session_start();
                            if(!isset($_SESSION["id"]))
                            {
                                // not log in yet 
                                echo("<li><a href='signup.php'>Sign up</a></li>");
                                echo("<li><a href='login.php'>Log in</a></li>");
                            }
                            else
                            {
                                //loged in  
                                echo ("<li><a href='profile.php'>My Account</a></li>");
                                echo("<li><a href='check_logout.php'>Logout</a></li>");
                            }
                            ?>
                                <li><a href="contactus.php">Contact us</a></li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
                </nav> 

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="home_text wow fadeInUp animated">
                                <h2>APPOD</h2>
                                <p>Where everyone meet their needs</p>
                                <img src="images/shape.png" alt="">                        
                            </div>
                        </div>
                    </div>
                </div>          
            </div>  
        </section>         
    </header>       
    
    
    
    <div class="login">
  <div class="heading">
	  
	<div class="col-md-4">
    </div> 
    
    <div class="col-md-4 text-center">
      
    <h2>Sign up</h2>
    
    <br>
    <form action= "x">
     <button type="submit" class="btn btn-default submit-btn form_submit">FACEBOOK SIGN UP</button>
     </form>
    <br>
    <h3>Or</h3>
  <form id="form1" name="form1" method="post" action="signup_usercheck.php" onsubmit="return myFunction();">
   
		<div class="input-group input-group-lg">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input type="text" class="form-control" placeholder="E-mail" name="username" id="username" onblur="check_username();">
			<div id="status"></div>
		</div>
		
        <label id="error" style="color:red"></label>
		</br></br>

        <div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass">
        </div>
        </br></br>

		<div class="input-group input-group-lg">
          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
          <input type="password" class="form-control" placeholder="Re-type Password" name="user_pass_re" id="user_pass_re">
        </div>
        </br></br>
        
        <label id="passerror" style="color:red"></label>
      </br>
        
        <button id="submit" type="submit" class="btn btn-default submit-btn form_submit">SIGN UP</button>
        </br></br>
    </form>
    </div>
    
    <div class="col-md-4">
    </div> 
    
    </div>
 </div>
<!-- =========================
     SCRIPTS 
============================== -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>
    
  </body>
</html>
