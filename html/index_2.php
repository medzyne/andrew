<!DOCTYPE HTML>

<html>
	<head>
		<title>Appod</title>
		<meta charset="utf-8" />
		<meta name="viewport"  />

		<!-- Style -->
    <link href="css/style1.css" rel="stylesheet">
		
   


	</head>


	<body >



		<!-- Page Wrapper -->
			<div > <!-- BG -->

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

   


		


			 


	</body>
</html>