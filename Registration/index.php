<?php
if(isset($_POST['btn_register'])){
    
           define('DB_SERVER', 'localhost');
           define('DB_USERNAME', 'root');
           define('DB_PASSWORD', '');
           define('DB_DATABASE', 'test');
           $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            if (mysqli_connect_errno())
          {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
	    $name=$_POST['name'];
        $password=$_POST['password'];
        $mobile=$_POST['mobile'];
        $emailid=$_POST['emailid'];
        
        $sql = "INSERT INTO user (name, emailid, password, mobile) VALUES ('$name', '$emailid', '$password', '$mobile')";

        if (mysqli_query($db, $sql)) {
            header("Location: \Complete Website\Front\index.php");
        } 
        else {
                echo mysqli_error($db);
            }
        
    
}
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-16">
  <title>Sign-Up/Login Form</title>
  <style type="text/css">
    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}


a {
  text-decoration: none;
  color: white;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background: white;
  padding: 40px;
  padding-top: 10px;
  max-width: 600px;
  margin: 40px auto;

}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: #A9A9A9;
  color: white;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: orange;
  color: #ffffff;
}
.tab-group .active a {
  background: orange;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: #696969;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: #808080;
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #696969;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #696969;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #696969;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #696969;
}

textarea {
  border: 2px solid red;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #696969;
  color: white;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #387DC2;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}

  </style>
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
</head>

<body background="white">
  <div class="form">
      
      
      <div>
        <div >   
          <h1 style="
            color: #387DC2;
            padding-bottom: 16px;
          ">Register Your Account</h1>
          
          <form action="" method="POST">
          

            <div class="field-wrap">
              <label>
                Full Name<span class="req">*</span>
              </label>
              <input type="text" name="name" required autocomplete="off" style="
                  padding-top: 17px;
              " />
            </div>
        
            <div class="field-wrap">
              
            </div>
        

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required name="emailid"  autocomplete="off" style="
                  padding-top: 17px;
              "/>
          </div>
          <div class="field-wrap">
            <label>
              Phone<span class="req">*</span>
            </label>
            <input type="text"required name="mobile" autocomplete="off" style="
                  padding-top: 17px;
              "/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required name="password" autocomplete="off" style="
                  padding-top: 17px;
              "/>
          </div>

          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password"required name="confirm_password" autocomplete="off" style="
                  padding-top: 17px;
              "/>
          </div>
          
          <button type="submit" name="btn_register" class="button button-block">Get Started</button>
          
          </form>

        </div>
        
        
        
      </div><!-- tab-content -->
      



</div> <!-- /form -->
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
                <li><a href="category.html">Resume</a></li>
                <li><a href="category.html">Portfolio</a></li>
                <li><a href="category.html">Interface</a></li>
                <li><a href="category.html">Contact Us</a></li>
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
  
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
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
