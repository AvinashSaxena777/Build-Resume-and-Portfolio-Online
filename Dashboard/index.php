<?php 
session_start();
if(isset($_SESSION['id'])){?>
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
				<h1 class="site-title"><a href="\Complete Website\Front\index.php"><em class="fa"></em>Resume and Online Portfolio Builder</a></h1>
				
				<a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
				
				<ul class="nav nav-pills flex-column sidebar-nav">
					<li class="nav-item"><a class="nav-link active" href="index.php" style="text-align: center;"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="info.php" style="text-align: center;"><em class="fa fa-clone"></em>Basic Informations</a></li>
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
						<h1 class="float-left text-center text-md-left">Dashboard</h1>
					</div>
					
					<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 6px;">
    Options
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="\Complete Website\Front\index.php">Home!</a>
    <a class="dropdown-item" href="\Complete Website\ResumeFront\index.php">Resume</a>
      <a class="dropdown-item" href="\Complete Website\PortfolioFront\index.php">Portfolio</a>
    
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="\Complete Website\Front\contact.php">Contact Us</a>
  </div>
</div>
					
					<div class="clear"></div>
				</header>
                
                <!-- Example single danger button -->

				
				
								
								
								
								
								
											
							

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

<?php }
    else {
        header("Location: /Complete Website/Front/index.php");
    }?>
