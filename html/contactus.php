<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPOD</title>
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/lte-ie7.js"></script>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
                <!-- Preloader -->
                <div id="preloader">
                    <div id="status">&nbsp;</div>
                </div>




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


  
    
    
    <section class="contact" id="CONTACT">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="contact_title  wow fadeInUp animated">
                        <h1>get in touch</h1>
                        <img src="images/shape.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3  wow fadeInLeft animated">
                    <div class="single_contact_info">
                        <h2>Call Me</h2>
                        <p>+88 00 123 456 01</p>
                    </div>
                    <div class="single_contact_info">
                        <h2>Email Me</h2>
                        <p>admin@appod.co</p>
                    </div>
                    <div class="single_contact_info">
                        <h2>Address</h2>
                        <p>Bangkok, Thailand</p>
                    </div>
                </div>

				<?php 
					$action=$_REQUEST['action']; 
					//echo $_SERVER["REQUEST_METHOD"];
					if ($_SERVER["REQUEST_METHOD"] != "POST")    /* display the contact form */ 
					{ 
				?> 
                <div class="col-md-9  wow fadeInRight animated">
                  <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" >
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">                                
                            </div>
                            <div class="col-md-6">
                                <textarea class="form-control" id="message" name="message" rows="25" cols="10" placeholder="  Message Texts..."></textarea>
                                <button type="submit" class="btn btn-default submit-btn form_submit">SEND MESSAGE</button>                                
                            </div>
                        </div>
                    </form>
                    
                </div>  
				<?php 
					}  
					else                /* send the submitted data */ 
					{ 
					$name=$_REQUEST['name']; 
					$email=$_REQUEST['email']; 
					$subject=$_REQUEST['subject'];
					$message=$_REQUEST['message']; 
					if (($name=="")||($email=="")||($message=="")) 
						{ 
						echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
						} 
					else{         
						$from="From: $name<$email>\r\nReturn-path: $email"; 
						$subject="Message sent using your contact form"; 
						mail("sandy_zyne@hotmail.com", $subject, $message, $from); 
						echo "<html></br></html>Email sent!"; 
						} 
					}   
				?> 
                    
            </div>
        </div>
        
    </section>



<footer>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="footer_logo   wow fadeInUp animated">
                        <img src="images/ducklab1.png" alt="" width="50px">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center   wow fadeInUp animated">
                    <div class="social">
                        <h2>Follow Me on Here</h2>
                        <ul class="icon_list">
                            <li><a href="http://www.facebook.com/abdullah.noman99"target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.twitter.com/absconderm"target="_blank"><i class="fa fa-twitter"></i></a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="copyright_text   wow fadeInUp animated">
                        <p>&copy; Appod 2015.All Right Reserved By Duck Lab</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>











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