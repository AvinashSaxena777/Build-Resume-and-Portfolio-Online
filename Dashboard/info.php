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

    if(isset($_POST['update_info'])){

        $name=$_POST['name'];
        $emailid=$_POST['emailid'];
        $mobile=$_POST['mobile'];
        $gender=$_POST['gender'];
        $id = $_SESSION['id'];
        $speciality = $_POST['speciality'];
        $sql = "UPDATE user SET name='$name', emailid='$emailid', mobile='$mobile' WHERE id='$id'";

        if ($db->query($sql) === TRUE) {
            $_SESSION['name']=$name;
            $_SESSION['emailid']=$emailid;
            $_SESSION['mob']=$mobile;
            $_SESSION['dob']=$dob;
            $_SESSION['speciality']=$speciality;
            header( "Location: info.php");
        } else {
            echo '<script type="text/javascript">alert("Error")</script>';
        }


    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<meta name="description" content="">
	
	<meta name="author" content="">
	
	<link rel="icon" href="images/favicon.ico">
	
	<title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1" style="
				background-color: #387DC2;
			">
				<h1 class="site-title"><a href="/Complete Website/Front/index.php"><em class="fa"></em>Resume and Online Portfolio Builder</a></h1>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link" href="index.php" style="text-align: center;"><em class="fa fa-dashboard"></em> Dashboard</a></li>
					<li class="nav-item"><a class="nav-link active" href="info.php" style="text-align: center;"><em class="fa fa-clone"></em>Basic Informations <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="educational.php" style="text-align: center;"><em class="fa fa-calendar-o"></em>Educational Details</a></li>
					<li class="nav-item"><a class="nav-link" href="experience.php" style="text-align: center;"><em class="fa fa-bar-chart"></em>Expiriences and Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="skills.php" style="text-align: center;"><em class="fa"></em>Skills</a></li>
					<li class="nav-item"><a class="nav-link" href="about.php" style="text-align: center;"><em class="fa fa-hand-o-up"></em>About</a></li>
					<li class="nav-item"><a class="nav-link" href="projects.php" style="text-align: center;"><em class="fa fa-clone"></em>Projects</a></li>
				</ul>
				</nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-left">User Informations</h1>
					</div>
					
					<div class="card" style="width: 80%;">
                            <form action="" method="post" style="padding: 30px; text-align: center">
                              
                                      <div  style="padding: 10px">
                                        <div class="col">
                                          <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?php echo $_SESSION['name'];?>">
                                        </div>
                                      </div>
                                
                                
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="emailid" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $_SESSION['emailid'];?>">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                  </div>
                                 
                                  <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlSelect1">Mobile Number</label>
                                      <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" value="<?php echo $_SESSION['mob'];?>">
                                    </div>
                                    <div class="col">
                                      <div class="form-group">
                                            <label for="exampleFormControlSelect1">Gender</label>
                                            <select class="form-control" name="gender" id="exampleFormControlSelect1">
                                              <option>Male</option>
                                              <option>Female</option>
                                            </select>
                                          </div>
                                    </div>
                                  </div>

                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input" required>
                                      The above information is true to my knowledge!
                                    </label>
                                  </div>
                                  <button type="submit" name="update_info" class="btn btn-danger" style="border-radius: 5px">Save Changes</button>
                                </form>
                    </div>

                            
								
								
								
								
								
											
							

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
	    window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
	  </body>
</html>
