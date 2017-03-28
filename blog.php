<?php 
        session_start();
        $con = mysqli_connect("127.0.0.1:3306","root","alumni","Alumni") or die("Could not connect");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Alumni</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/icon" href="img/head.png"/>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/superslides.css">
    <link href="css/slick.css" rel="stylesheet"> 
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
    <link rel="stylesheet" href="css/animate.css"> 
    <link rel="stylesheet" href="css/queryLoader.css" type="text/css" />
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
   
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

 <!--     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>   -->
 
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
                <li ><a href="index.php">Home</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connect<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="Alumni.php">Alumni</a></li>
                    <li><a href="Faculty.php">Faculty</a></li>               
                  </ul>
                </li>   
                <li class="active"><a href="blog.php">Blog</a></li>
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
    <!--=========== END HEADER SECTION ================--> 

	<section id="blog" class="container">
		  <h2>Ask a Query</h2>
        <div class="widget search" style="margin-top: 30px;">
            <form role="form" action="storeque.php" method="POST">
              <input type="text" class="form-control search_box" autocomplete="off" autofocus placeholder="Ask here" name="query" required>
              <?php 
              if(isset($_SESSION['user']))
              	echo '<input type="submit" value="Post" class="post" >';
              else
              {
              	echo '<script>
              	            alert("please login to post or give answer");
              	</script>';
              	//header('location:login.php');
              }
              ?> 
              
          </form>            
        </div>
        <div class="blog">
            <div class="row">
                 <div class="col-md-8">

            <?php
                  $num_rec_page = 4;
                  $page = 1;
                 if(isset($_GET["page"])) {$page=$_GET["page"];}
                  $start_from = ($page-1)*$num_rec_page;
                  $res = mysqli_query($con, "select * from questions order by time desc LIMIT $start_from, $num_rec_page");
                 	while ($row = mysqli_fetch_assoc($res)) {  
           ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2">
                                <div class="entry-meta">
                                
                     <?php
                               echo '<span id="publish_date">'.$row['time'].'</span>
                                    <span><i class="fa fa-user"></i> <a href="#">'.$row['q_user'].'</a></span>';
#                                   <span><i class="fa fa-comment"></i> <a href="#">2 Comments</a></span>
#                                    <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
                     ?>     
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-10 blog-content">
       <?php                              
                           echo '<h4>'.$row['query'].'</h4>';
        ?> 
        
        
                          <form action="storeans.php" method="POST">
                          <input type='hidden' name='vari' value='<?php echo $row['query'];?>'/> 
       	<?php
                      if(isset($_SESSION['user']))
                      {
                    echo '<button class="btn_login" type="submit"  name="answer">Answer</button>';
                      }
                      else
                      {
                        echo '<script>
        	            alert("please login to post or give answer");
  	                  </script>';
                      }
            ?>
                         </form>
                         
                        </div>
                       </div>    
                    </div><!--/.blog-item-->
                   }
                   
             <?php
                  }
                  $res1 = mysqli_query($con,"select * from questions");
                  $tot_rec = mysqli_num_rows($res1);
                  $tot_pages = ceil($tot_rec/$num_rec_page);
                  if($page == 1) 
                  	$prev = $page;
                  else
                  	$prev = $page-1;
                  if($page == $tot_pages) 
                  	$next= $page;
                  else
                  	$next = $page+1;               
                ?>
                        
                    <ul class="pagination pagination-lg">
             <?php
              echo '<li><a href="blog.php?page='.$prev.'"><i class="fa fa-long-arrow-left"></i>Previous</a></li>';
                  for ($i=1; $i <= $tot_pages ; $i++) 
                  { 
                  	if($i == $page)
                    	      echo '<li class="active"><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
                        else
                    	      echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
                  }
              echo '<li><a href="blog.php?page='.$next.'"><i class="fa fa-long-arrow-right"></i>Next</a></li>';
             ?>   
                        
                    </ul>     <!--/.pagination-->
                </div>  <!--/.col-md-8-->

<!--                <aside class="col-md-4">
                    <div class="widget search">
                        <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                        </form>
                    </div>  -->   <!--/.search-->
    				
<!--    				<div class="widget categories">-->
<!--                        <h3>Recent Posts</h3>-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-12">-->
<!--                                <div class="single_comments">-->
<!--                                    <img src="images/blog/avatar3.png" alt=""  />-->
<!--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>-->
<!--                                    <div class="entry-meta small muted">-->
<!--                                        <span>By <a href="#">Alex</a></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single_comments">-->
<!--                                    <img src="images/blog/avatar3.png" alt=""  />-->
<!--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>-->
<!--                                    <div class="entry-meta small muted">-->
<!--                                        <span>By <a href="#">Alex</a></span> -->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="single_comments">-->
<!--                                    <img src="images/blog/avatar3.png" alt=""  />-->
<!--                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>-->
<!--                                    <div class="entry-meta small muted">-->
<!--                                        <span>By <a href="#">Alex</a></span>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                -->
<!--                            </div>-->
<!--                        </div>                     -->
<!--                    </div>  <!--/.recent comments-->     
                     

                      				
<!--    				<div class="widget archieve">-->
<!--                        <h3>Archieve</h3>-->
<!--                        <div class="row">-->
<!--                            <div class="col-sm-12">-->
<!--                                <ul class="blog_archieve">-->
<!--                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2015 <span class="pull-right">(97)</span></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2015 <span class="pull-right">(32)</span></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2015 <span class="pull-right">(19)</span></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2015 <span class="pull-right">(08)</span></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>                     -->
<!--                    </div>  <!--/.archieve-->
                   
    			</aside>  
            </div><!--/.row-->
        </div>
    </section><!--/#blog-->
	

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
      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 

  
  
  

    <!-- Javascript Files
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/queryloader2.min.js" type="text/javascript"></script>
    <script src="js/wow.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   
    <script src="js/custom.js"></script>
    <script src="js/functions.js"></script>
    
</body>
</html>
