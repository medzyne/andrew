<!DOCTYPE HTML>

<html>
	<head>
		<title>Appod</title>
		<meta charset="utf-8" />
		<meta name="viewport"  />

		<!-- Style -->
    <link href="css/style.css" rel="stylesheet">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 		<link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    	 <!-- Preloader -->
    <link rel="stylesheet" href="css/preloader.css" type="text/css" media="screen, print"/>
	<link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   


	</head>


	<body class="landing">



		<!-- Page Wrapper -->
			<div id="page-wrapper"> <!-- BG -->

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">Appod</a></h1>
						<nav id="nav">
							<ul>
								
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
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2 style="color: #fff">Appod</h2>
						</div>
						
							<p>Where everyone meet their needs</p>
						
					</section>


					<section class="services" id="SERVICE">
        <div class="container">
	         <div class="single_service wow fadeInUp" data-wow-delay="1s">
		         <header>
			         </br></br>
				 	<h3 style="text-align: center">Create your own world with in 3 easy steps</h3>
				 	</br></br>
	            </header>
	            </div>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
	                    
                        <i class="icon-pencil"></i>
                        <h4>Name your micropod</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>Create your micropod</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <i class="icon-gears"></i>
                        <h4>Choose features and style</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>6 features available and more coming soon. You also able to style your micropod, make it unique!  </p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <i class="icon-camera"></i>
                        <h4>Publish to the world</h4>
                        <img src="dist/img/test1.png" width="140px" height="140px" class="img-circle" style="border-radius:50%">
                        <p>Let the world discover you on appod!</p>
                    </div>
                </div>
                
            </div>            
        </div>
    </section>




   
<section class="testimonial text-center wow fadeInUp animated" id="TESTIMONIAL">
        <div class="container">
            <div class="icon">
                <i class="icon-quote"></i>
            </div>
            <div class="owl-carousel">
                <div class="single_testimonial text-center wow fadeInUp animated">
					<h2>Appod is a place <br />
					where everyone meet their needs.</h2>			
				</div>
                <div class="single_testimonial text-center">
                    <p>Customer can find what they want easier and get tons of benefit in return</p>
                </div>
                <div class="single_testimonial text-center">
                    <p>Business owners better understand their customer needs so they can offer the right products to the right person</p>
                    
                </div>
            </div>            
        </div>
    </section>




				<!-- two 
					<section id="one" class="wrapper style1 special">
						<div class="inner">
							<header class="major">
								<h2>Appod is a place <br />
								where everyone meet their needs.</h2>
								<p>Customer can find what they want easier and get tons of benefit in return<br />
								Business owners better understand their customer needs so they can offer the right products to the right person</p>
							</header>
							
						</div>
					</section>
-->



			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/313.png"/></span>
					<div class="content">
						<header>
							<h2 style="text-align: center">Benefit for SMEs</h2>	
						</header>
						<h5>Interactive marketing tools</h5>
						<p>Appod not just let customer able to know who you are but also let you know who are they</p>
						<h5>Keep in touch with your customer 24/7*365</h5>
						<p>Push notification to targeted customer</br>
							Email board-cast to your followers
						</p>
						<h5>Build up customer loyalty toward your brand</h5>
						<p>interactive loyalty card for profited customers</p>
						<h5>Customer analysis</h5>
						<p>understand you customer behaviour, this help you to propose the right offer to the right person
						</p>  
						
						<ul class="actions">
							<li><a href="#" class="button">Create your micropod here</a></li>
						</ul>
					</div>
					
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/WDB8.png"/></span>
					<div class="content">
						<header>
							<h2 style="text-align: center">Benefit for customers</h2>
							
						</header>
						<h5>Explore new micropods everyday</h5>
<p>Board but specific place to find whatever you want</p>
<h5>Give and get</h5> 
<p>Fan wall give you the power to share your experience to others people also get to know what other people think!</p> 
<h5>Keep up to date</h5>
<p>get email and push notification from your favourite micropod 24*7 so you wont miss any special offer!</p>
<h5>Privilege for you</h5>
<p>Unlock hidden stamps on loyalty card to get special offers </p>

						<ul class="actions">
							<li><a href="#" class="button">Download Appod here</a></li>
						</ul>
					</div>
					
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					
					<div class="container">
			         <div class="single_service wow fadeInUp" data-wow-delay="1s">
			            <header class="major">
							<h2>Appod Features</h2>
							<p>Appod BETA.1 has 6 features available now</p>
							</header>
			         </div>

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-user"></span>
								</br>
								<h3>About us</h3>
								<header class="major">
									<p >Allow shop owner to add their details.</p>
								</header>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-phone"></span>
								</br>
								<h3>Call us</h3>
								<header class="major">
									<p>Update phone number so your customer can call you immediately.</p>
								</header>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-photo"></span>
									</br>
									<h3>Gallery</h3>
									<header class="major">
									<p>Each shop can create 3 photo albums with 10 photos of each.</p>
									</header>
                    </div>
                </div>
            </div>   <!-- END ROW-->         
        </div> <!-- END CONTAINER--> 





<div class="container">
			         

            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="1s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-video-camera"></span>
									</br>
									<h3>Video</h3>
									<header class="major">
									<p>Update video to make your Micropod more interesting.</p>
									</header>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="2s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-facebook-square"></span>
									</br>
									<h3>Facebook feed</h3>
									<header class="major">
									<p>Pull all shop’s Facebook feed into your Micropod.</p>
									</header>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="single_service wow fadeInUp" data-wow-delay="3s">
                        <i class="icon-pencil"></i>
                        <span class="icon alt major fa-star"></span>
									</br>
									<h3>Fan wall</h3>
									<header class="major">
									<p>Allow your customers to review your micropod and share their perspective.</p>
								</header>
                    </div>
                </div>
            </div>   <!-- END ROW-->         
        </div> <!-- END CONTAINER--> 

					<div class="container">
						<div class="single_service wow fadeInUp" data-wow-delay="1s">
						<footer class="major">
							<ul class="actions">
								<li><a href="#" class="button-white">Start here</a></li>
							</ul>
						</footer>
						</div>
					</div>
				</section>



 <section class="about_us_area" id="ABOUT" style="background-color: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="about_title">
	                    <h2>About Duck Lab</h2>
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

				


<footer style="background-color: #fff; font-size: small;">
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
                <div class="col-md-12 text-center">
                    <div class="copyright_text   wow fadeInUp animated">
                        <p>&copy; Appod 2015.All Right Reserved By Duck Lab</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
				

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

			<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
		    <!-- jQuery UI 1.11.4 -->
		    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		    <script>
		      $.widget.bridge('uibutton', $.ui.button);
		    </script>
		    <!-- Bootstrap 3.3.5 -->
		    <script src="bootstrap/js/bootstrap.min.js"></script>
		    <!-- Morris.js charts -->
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		    <script src="plugins/morris/morris.min.js"></script>
		    <!-- Sparkline -->
		    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
		    <!-- jvectormap -->
		    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		    <!-- jQuery Knob Chart -->
		    <script src="plugins/knob/jquery.knob.js"></script>
		    <!-- daterangepicker -->
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
		    <script src="plugins/daterangepicker/daterangepicker.js"></script>
		    <!-- datepicker -->
		    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
		    <!-- Bootstrap WYSIHTML5 -->
		    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		    <!-- Slimscroll -->
		    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
		    <!-- FastClick -->
		    <script src="plugins/fastclick/fastclick.min.js"></script>
		    <!-- AdminLTE App -->
		    <script src="dist/js/app.min.js"></script>
		    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		    <script src="dist/js/pages/dashboard.js"></script>
		    <!-- AdminLTE for demo purposes -->
		    <script src="dist/js/demo.js"></script>





		    <script src="assets/landed/jquery.min.js"></script>
			<script src="assets/landed/jquery.scrolly.min.js"></script>
			<script src="assets/landed/jquery.dropotron.min.js"></script>
			<script src="assets/landed/jquery.scrollex.min.js"></script>
			<script src="assets/landed/skel.min.js"></script>
			<script src="assets/landed/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/landed/main.js"></script>


			 <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/script.js"></script>


	</body>
</html>