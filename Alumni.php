<?php 
        session_start();
 //       $con = mysqli_connect("127.0.0.1:3306","root","alumni","Alumni") or die("Could not connect");
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Alumni</title>
    	<link href="css/alumnustyle.css" rel="stylesheet" type="text/css" media="all" />
    	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="img/head.png"/>

    <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- preloader -->
    <link rel="stylesheet" href="css/queryLoader.css" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">
   
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>
<body>
	<!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <a class="navbar-brandimg" href="index.php"><img src="img/rguktlogo.png" alt="logo"></a>      
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="index.php">RGUKT<span> Alumni</span></a>            
              <!-- IMG BASED LOGO  -->
                       
                     
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connect<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="active"><a href="Alumni.php">Alumni</a></li>
                    <li><a href="Faculty.php">Faculty</a></li>               
                  </ul>
                </li>   
                <li><a href="blog.php">Blog</a></li>
                <li><a href="opportunities.php">Opportunities</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="gallery.php">Gallery</a></li>                                           
                <li><a href="contact.php">Contact us</a></li>
<?php
		
	if(isset($_SESSION['user']))
		echo '<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-              expanded="false">'.$_SESSION['user'].'<span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="logout.php">logout</a></li>
		            <li><a href="#">Profile</a></li>               
		          </ul>
		     </li>';
		else echo '<li><a href="login.php">Login</a></li> ';
?>            
               </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>
    
    
    
    
	<div class="profilebody">
		<div class="profilehead">
			<h1 class="animated fadeIn wow animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
		                     Alumni Profiles
		   </h1>
		   <div class="flexsearch">
						<form class="flexsearch--form" action="#" method="post">
							<div class="flexsearch--input-wrapper">
								<input class="flexsearch--input" type="search" placeholder="Search">
							</div>
					<input class="flexsearch--submit" type="submit" value="&#10140;" name=search/>
						</form>
			</div>
		 </div>
		<div class="team-member">
			<ul>
				<li>
					 <img class="imgcircle" src="img/samit.jpg" alt=""/>
					<div class="clearfix"></div>
					 <P><a href="SingleAlumni.php">Samit K Pradhan<br><label>Assistant Professor</label></a></P>
				</li>
				<li>
					<img class="imgcircle" src="img/venkatraman.jpg" alt=""/>
					<div class="clearfix">  </div>
					<P><a href="SingleAlumni.php">Venkat Raman B<br><label>Assistant Professor</label></a></P>
				</li>
				<li>
					<img class="imgcircle" src="img/sujoy.jpg" alt=""/>
					<div class="clearfix">  </div>
					<P><a href="SingleAlumni.php">Sujoy Sarkar<br><label>Assistant Professor</label></a></P>
				</li>
			</ul>		
		</div>	
		<!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>About Us</h3>
                <p>The primary objective of establishing RGU-IIIT was to provide high quality educational opportunities for the aimed rural youth of Telangana. The initial goal was that at least the top 1 % of the rural graduates would be given the opportunity to study at RGU-IIIT. Thus RGUKT, as a green field university, represents a unique experiment in the educational area.</p>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Others sites</h3>
                <ul class="footer_widget_nav">
                  <li><a href="https://www.rgukt.ac.in" target="_blank">RGUKT Basar</a></li>
                  <li><a href="https://hub.rgukt.ac.in/" target="_blank">Hub</a></li>                  
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Social Links</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomLeft">
                <p> Copyright &copy; All Rights Reserved</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomRight">
                <p>Designed by Alumni-Team</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
	</div>      
      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 

  

    <!-- Javascript Files
    ================================================== -->

  
    <!-- initialize jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Preloader js file -->
    <script src="js/queryloader2.min.js" type="text/javascript"></script>
    <!-- For smooth animatin  -->
    <script src="js/wow.min.js"></script>  
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   
   
    <!-- Custom js-->
    <script src="js/custom.js"></script>
    <script src="js/searchindex.js"></script>
	
</body>
</html>
