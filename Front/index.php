<?php
    session_start();
    define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'test');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

   if(isset($_POST['login_btn']))
			{
				$emailid=mysqli_real_escape_string($db,$_POST['emailid']);
				$password=mysqli_real_escape_string($db,$_POST['password']);
				$query = "select * from user where emailid='$emailid' and password='$password' ";
				//echo $query;
				$query_run = mysqli_query($db,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					
					$_SESSION['emailid'] = $emailid;
					$_SESSION['password'] = $password;
                    $_SESSION['name']= $row['name'];
                    $_SESSION['dob']=$row['dob'];
                    $_SESSION['mob']=$row['mobile'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['speciality']=$row['speciality'];
                        
                    $id = $_SESSION['id'];
                    $query = "select * from education where id='$id'";
                    //echo $query;
                    $query_run = mysqli_query($db,$query);
                    //echo mysql_num_rows($query_run);
                    if($query_run)
                    {
                        $i=-1;
                        while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC)){
                            $i++;
                            $edurow[$i]= $row;
                            $_SESSION['ed'] = $edurow;
                        }
                        $num_edrow=$i;
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }

                    $query1 = "select * from experience where id='$id'";
                    //echo $query;
                    $query1_run = mysqli_query($db,$query1);
                    //echo mysql_num_rows($query_run);
                    if($query1_run)
                    {
                        $i=-1;
                        while($row = mysqli_fetch_array($query1_run,MYSQLI_ASSOC)){
                            $i++;
                            $exprow[$i]= $row;
                            $_SESSION['exp'] = $exprow;
                        }
                        $num_exprow=$i;
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }

                    $query2 = "select * from skills where id='$id'";
                    //echo $query;
                    $query2_run = mysqli_query($db,$query2);
                    //echo mysql_num_rows($query_run);
                    if($query2_run)
                    {
                        $i=-1;
                        while($row = mysqli_fetch_array($query2_run,MYSQLI_ASSOC)){
                            $i++;
                            $skillrow[$i]= $row;
                            $_SESSION['skill']=$skillrow;
                        }
                        $num_skillrow=$i;
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }

                    $query3 = "select * from training where id='$id'";
                    //echo $query;
                    $query3_run = mysqli_query($db,$query3);
                    //echo mysql_num_rows($query_run);
                    if($query3_run)
                    {
                        $i=-1;
                        while($row = mysqli_fetch_array($query3_run,MYSQLI_ASSOC)){
                            $i++;
                            $training_row[$i]= $row;
                            $_SESSION['training_row']=$training_row;
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }

                    $query4 = "select * from project where id='$id'";
                    //echo $query;
                    $query4_run = mysqli_query($db,$query4);
                    //echo mysql_num_rows($query_run);
                    if($query4_run)
                    {
                        $i=-1;
                        while($row = mysqli_fetch_array($query4_run,MYSQLI_ASSOC)){
                            $i++;
                            $project_row[$i]= $row;
                            $_SESSION['project_row']=$project_row;
                        }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }
                    
					header( "Location: \Complete Website\Front\index.php");
					}
					else
					{
						echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
					}
                    
                    $query5 = "select * from portfolio where user_id='$id'";
      
                    $query5_run = mysqli_query($db,$query5);
                    //echo mysql_num_rows($query_run);
                    if($query5_run)
                    {
                                if(mysqli_num_rows($query5_run)>0)
                                {
                                   $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

                                   $_SESSION['user_desc'] = $row['user_desc'];
                                   $_SESSION['about_me'] = $row['about_me'];
                                }
                    }
                    else
                    {
                        echo '<script type="text/javascript">alert("No such User exists. Invalid Credentials")</script>';
                    }
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}

    if(isset($_POST['logout_btn'])){
        session_destroy();
        header( "Location: \Complete Website\Front\index.php");
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Build Resume and Online Portfolio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- lightbox-->
    <link rel="stylesheet" href="css/lightbox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <div role="navigation" class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header"><a href="index.html" class="navbar-brand" style="padding-left: 30px">Resume and Online Portfolio Builder</a>
            <div class="navbar-buttons">
              <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
            </div>
          </div>
          <div id="navigation" class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <?php if(isset($_SESSION['id'])){?>
               <li><a href="\Complete Website\Dashboard\index.php">Profile</a></li><?php }?>
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Jump To<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="\Complete Website\ResumeFront\index.php">Resume</a></li>
                  <li><a href="\Complete Website\PortfolioFront\index.php">Portfolio</a></li>
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
              <?php if(isset($_SESSION['name'])){?>
              <a href="#" data-toggle="modal" data-target="#logout-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Log Out</a>
              <?php } else {?><a href="#" data-toggle="modal" data-target="#login-modal" class="btn navbar-btn btn-ghost"><i class="fa fa-sign-in"></i>Log In</a><?php }?>
          </div>
        </div>
      </div>
    </header>
    <!-- *** LOGIN MODAL ***_________________________________________________________
    -->
    <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
            <h4 id="Login" class="modal-title">Customer login</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="form-group">
                <input id="email_modal" name="emailid" type="text" placeholder="email" class="form-control">
              </div>
              <div class="form-group">
                <input id="password_modal" type="password" name="password" placeholder="password" class="form-control">
              </div>
              <p class="text-center">
                <button type="submit" name="login_btn" class="btn btn-primary"><i class="fa fa-sign-in"></i>Log In
                   </button>
              </p>
            </form>
            <p class="text-center text-muted">Not registered yet?</p>
            <p class="text-center text-muted"><a href="\Complete Website\Registration\index.php"><strong>Register now</strong></a>! It is easy and done within minutes</p>
          </div>
        </div>
      </div>
    </div>
    <!-- *** LOGIN MODAL END ***-->
    
    <!-- *** LOGOUT MODAL ***-->
    <div id="logout-modal" tabindex="-1" role="dialog" aria-labelledby="Logout" aria-hidden="true" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
            <h4 id="Login" class="modal-title">Logout</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              
              <p class="text-center">
                <button type="submit" name="logout_btn" class="btn btn-danger"><i class="fa fa-sign-in"></i>Log Out
                   </button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="jumbotron main-jumbotron" style="background-image: url(blue.jpg);">
      <div class="container">
        <div class="content">
          <h1>Easy resume and portfolio builder !!</h1>
          <p class="margin-bottom">Create, edit and share your resume/portfolio in minutes. Build the <br>perfect resume/portfolio and get the job you deserve!<a href="https://bootstrapious.com"></a></p>
          <p><a class="btn btn-white" href = " \Complete Website\ResumeFront\index.php">Resume</a>  
            <a class="btn btn-white" style="padding-left: 20px" href="\Complete Website\PortfolioFront\index.php">Portfolio</a> </p>
        </div>
      </div>
    </div>
   
    <!--   *** INTEGRATIONS ***-->
    <section>
      <div class="container clearfix">
        <div class="row services">
          <div class="col-md-12">
            <h2 class="h1" style="text-align: center; padding-right: 120px">Benefits</h2>
            <div class="row">
              <div class="col-sm-3">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-alarm"></i></div>
                  <h4 class="heading">Fast and Efficient</h4>
                  <p>Create your resume OR portfolio in an fast and efficient way!</p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-cloud"></i></div>
                  <h4 class="heading">Save as pdf</h4>
                  <p>Save your resume in an portable format, pdf!!</p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-coffee"></i></div>
                  <h4 class="heading">Sit Back and Navigate</h4>
                  <p>We will do work for you and you just need to tell us your preferences.</p>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-monitor"></i></div>
                  <h4 class="heading">Real time traffic visibility</h4>
                  <p>Get the details of xampp on your portfolio efficiently and dynamically.</p>
                </div>
              </div>
            </div>

            <h2 class="h1" style="text-align: center; padding-right: 120px">Tools</h2>
            <div class="row">
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-monitor"></i></div>
                  <h4 class="heading">Consulting</h4>
                  <p>MOst common yet essential part of our app is that you can consult to us 24*7 for any query, feedback or features.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-signal"></i></div>
                  <h4 class="heading">Share</h4>
                  <p>We will create a sharable link, SO that you can share your resume wherever you want and whenever you want.</p>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="box box-services">
                  <div class="icon"><i class="pe-7s-id"></i></div>
                  <h4 class="heading">User frindly Interface</h4>
                  <p>interactivity of the User with the app is at utmost priority for us. We work hard for an attractive and easy to understand UI</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--   *** INTEGRATIONS END ***-->

     <div id="about">
            <!-- Contact List -->
            <h1 style="padding-left: 100px; padding-bottom: 50px ">The Team</h1>
            <div class="section-seperator">
                <div class="content-lg container">
                    <div class="row">
                        <!-- Contact List -->
                        <div class="col-sm-3 sm-margin-b-30">
                            <h3><a href="http://ft-seo.ch/">Anshul Shivhare</a> <span class="text-uppercase margin-l-20">0801EI151012</span></h3>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> +91 7869903489</li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> ansh.07shiv@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Contact List -->

                        <!-- Contact List -->
                        <div class="col-sm-3 sm-margin-b-50">
                            <h3><a href="http://ft-seo.ch/">Avinash Saxena</a> <span class="text-uppercase margin-l-20">0801IT151021</span></h3>
                            <p></p>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> +91 8965086344</li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> avinashsaxena777@gmail.com</li>
                            </ul>
                        </div>
                        <div class="col-sm-3 sm-margin-b-50">
                            <h3><a href="http://ft-seo.ch/">Vijay Kumawat</a> <span class="text-uppercase margin-l-20">0801EI151061</span></h3>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> +91 9424857063</li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> vijay@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Contact List -->

                        <!-- Contact List -->
                        <div class="col-sm-3 sm-margin-b-50">
                            <h3><a href="http://ft-seo.ch/">Prachi Matapurkar</a> <span class="text-uppercase margin-l-20">0801EI151023</span></h3>
                            <ul class="list-unstyled contact-list">
                                <li><i class="margin-r-10 color-base icon-call-out"></i> +91 9144585129</li>
                                <li><i class="margin-r-10 color-base icon-envelope"></i> prachi@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Contact List -->
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Contact List -->
        </div>
        <!-- End Contact -->


    <section class="blog-post">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="post-content">
            </div>
            <!-- /.post-content-->
            <div class="comments">
              <div class="row comment">
                <div class="col-sm-3 col-md-2 text-center-xs">
                
                </div>
              </div>
              <!-- /.comment-->
              <div class="row comment last">
                <div class="col-sm-3 col-md-2 text-center-xs">
                </div>
            
              </div>
              <!-- /.comment-->
            </div>
            <!-- /#comments-->
            <div class="comment-form">
              <h4>Leave comment</h4>
              <form>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="name">Name <span class="required">*</span></label>
                      <input id="name" type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email <span class="required">*</span></label>
                      <input id="email" type="text" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="comment">Comment <span class="required">*</span></label>
                      <textarea id="comment" rows="4" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 text-right">
                    <button type="button" class="btn btn-primary"><i class="fa fa-comment-o"></i> Post comment</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>




   <footer class="footer">
      <div class="footer__block">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <h4 class="heading">About Us</h4>
              <p>We autamate the hectic process of Resume and Portfolio building. We make sure that the user interface, attractive and effiecient at the same time. Our Database is mysql, and the back-end language we are using is php</p>
            </div>
            <div class="col-md-4 col-sm-12">
              <h4 class="heading">Our Fields</h4>
              <h5>Resume</h5>
              <p> A resume is an official document that will contain your achievements and academic background in an abstract form. Here you can build them and you can share or save as pdf</p>
              <h5>Portfolio</h5>
              <p> Portfolio are essentially an online website which will contain your projects, achievements, academic background in an unofficial way (graphically). Here you can make them attractive and abstract.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <h4 class="heading">Help Center</h4>
              <ul>
                <li><a href="\Complete Website\ResumeFront\index.php">Resume</a></li>
                <li><a href="\Complete Website\PortfolioFront\index.php">Portfolio</a></li>
                <li><a href="category.html">Interface</a></li>
                <li><a href="\Complete Website\Front\contact.php">Contact Us</a></li>
              </ul>
            </div>
            <div class="col-md-4 col-sm-6">
              <h4 class="heading">Stay Connected</h4>
              <p class="social social--big"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></p>
            </div>
           
          </div>
        </div>
      </div>
      <div class="footer__copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy;2017: Resume and Online Portfolio Builder</p>
            </div>
            <div class="col-md-6">
             
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>