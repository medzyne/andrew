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

    <header>
            <div class="section_overlay">
                <nav class="navbar navbar-default navbar-fixed-top" >
                  <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
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

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="scroll_down">
                            <a href="#SERVICE"><img src="images/scroll.png" alt=""></a>
                                <h4>Scroll Down</h4>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>  
        </section>         
    </header>


   <section class="services" id="SERVICE">
        <div class="container">
             <div class="single_service wow fadeInUp" data-wow-delay="1s">
                 
                    <h3 style="text-align: center">Create your own world with in 3 easy steps</h3>
                    
                </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        
                        
                        <h4>NAME YOUR POD</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>Create your micropod</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        
                        <h4>FEATURES and STYLES</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>6 features available and more coming soon. You also able to style your micropod, make it unique!  </p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        
                        <h4>PUBLISH</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>Let the world discover you on appod!</p>
                    </div>
                </div>
                
            </div>            
        </div>
    </section>





<section id="four" class="wrapper style1 special fade-up">
                    
                    <div class="container">
                     <div class="single_service wow fadeInUp text-center" data-wow-delay="1s">
                        
                            <h2>Appod Features</h2>
                            <p>Appod BETA.1 has 6 features available now</p>
                            
                     </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        
                        <span class="fa fa-user fa-5x"></span>
                                </br>
                                <h3>About us</h3>
                                <p >Allow shop owner to add their details.</p>
                               
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        
                        <span class="fa fa-phone fa-5x"></span>
                                </br>
                                <h3>Call us</h3>
                                <p>Update phone number so your customer can call you immediately.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        
                        <span class="fa fa-photo fa-5x"></span>
                                    </br>
                                    <h3>Gallery</h3>
                                    <p>Each shop can create 3 photo albums with 10 photos of each.</p>
                    </div>
                </div>
            </div>   <!-- END ROW-->         
        </div> <!-- END CONTAINER--> 





<div class="container">
                     

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        
                        <span class="fa fa-video-camera fa-5x"></span>
                                    </br>
                                    <h3>Video</h3>
                                    <p>Update video to make your Micropod more interesting.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        
                        <span class="fa fa-facebook-square fa-5x"></span>
                                    </br>
                                    <h3>Facebook feed</h3>
                                    <p>Pull all shop’s Facebook feed into your Micropod.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        
                        <span class="fa fa-star fa-5x"></span>
                                    </br>
                                    <h3>Fan wall</h3>
                                    <p>Allow your customers to review your micropod and share their perspective.</p>
                                
                    </div>
                </div>
            </div>   <!-- END ROW-->         
        </div> <!-- END CONTAINER--> 

                    <div class="container">
                        <div class="single_service wow fadeInUp text-center" data-wow-delay="1s">
                
                        
                        <a href="#" class="button" >START HERE</a>
                        
                            
                        

                        


                        </div>
                    </div>
                </section>



 
<section class="about_us_area" id="SME">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
                        <h2>Benefit for SMEs</h2>
                        <img src="images/shape.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6  wow fadeInLeft animated">
                    
                    
                    <p>image here</p>


                </div>    
                    
                <div class="col-md-6  wow fadeInRight animated">
                        <h4>Interactive marketing tools</h4>
                        <p>Appod not just let customer able to know who you are but also let you know who are they</p>
                        </br>
                        <h4>Keep in touch with your customer 24/7*365</h4>
                        <p>Push notification to targeted customer</br>
                            Email board-cast to your followers
                        </p>
                        </br>
                        <h4>Build up customer loyalty toward your brand</h4>
                        <p>interactive loyalty card for profited customers</p>
                        </br>
                        <h4>Customer analysis</h4>
                        <p>understand you customer behaviour, this help you to propose the right offer to the right person
                        </p>  
                        
                       
                        <a href="#" class="button">Create your micropod here</a></li>
                        
                </div>
                
            </div>
        </div>
    </section>



<section class="about_us_area" id="CUSTOMER">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
                        <h2>Benefit for CUSTOMERs</h2>
                        <img src="images/shape.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6  wow fadeInLeft animated text-right">
                    
                    
                   <h4>Explore new micropods everyday</h4>
                        <p>Board but specific place to find whatever you want</p>
                        </br>
                        <h4>Give and get</h4> 
                        <p>Fan wall give you the power to share your experience to others people also get to know what other people think!</p> 
                        </br>
                        <h4>Keep up to date</h4>
                        <p>get email and push notification from your favourite micropod 24*7 so you wont miss any special offer!</p>
                        </br>
                        <h4>Privilege for you</h4>
                        <p>Unlock hidden stamps on loyalty card to get special offers </p>
                        </br>

                        <a href="#" class="button">Download Appod here</a></li>
                          </div>

                <div class="col-md-6  wow fadeInRight animated">
                        <p>image here</p>
                        
                </div>          
                        </div>
                    </div>
                </div>    
                    
                
                
            </div>
        </div>
    </section>




    <section class="about_us_area" id="ABOUT">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
                        <h2>About Duck Lab</h2>
                        <img src="images/shape.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4  wow fadeInLeft animated">
                    <div class="single_progress_bar">
                        <h2>BUSINESS MANAGEMENT - 90%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                            <span class="sr-only">90% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>TECHNICAL KNOWLEDGE - 90%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>USER BASED - 75%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                    <div class="single_progress_bar">
                        <h2>SEO - 95%</h2>
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  wow fadeInRight animated">
                    <p class="about_us_p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Sed quia non numquam eius modi tempora.</p>
                </div>
                <div class="col-md-4  wow fadeInRight animated">
                    <p class="about_us_p">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                </div>
            </div>
        </div>
    </section>
    








   


    <div class="fun_facts">
        <section class="header parallax home-parallax page" id="fun_facts" style="background-position: 50% -150px;">
            <div class="section_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 wow fadeInLeft animated">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <i class="icon-toolbox"></i>
                                        <h3>+60%</h3>
                                        <p>Income</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <i class="icon-clock"></i>
                                        <h3>-50%</h3>
                                        <p>Marketing cost</p>
                                    </div>                            
                                </div>
                                <div class="col-md-4">
                                    <div class="single_count">
                                        <i class="icon-trophy"></i>
                                        <h3>+80%</h3>
                                        <p>Customer loyalty</p>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-1 wow fadeInRight animated">
                            <div class="imac">
                                <img src="images/imac.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </section>    
    </div>
   
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