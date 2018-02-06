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
    if(isset($_POST['add_portinfo'])){
        $user_desc=$_POST['user_desc'];
        $about_me=$_POST['about_me'];
        $user_id = $_SESSION['id'];
        $sql = "INSERT INTO portfolio (user_id, user_desc, about_me) VALUES ('$user_id', '$user_desc', '$about_me')";

        if (mysqli_query($db, $sql)) {
            header( "Location: about.php");
        } else {
            echo mysqli_error($db);
        }

    }
    $id = $_SESSION['id'];
        $query = "select * from portfolio where user_id='$id'";
        //echo $query;
        $query_run = mysqli_query($db,$query);
        //echo mysql_num_rows($query_run);
        if($query_run)
        {
					if(mysqli_num_rows($query_run)>0)
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
					<li class="nav-item"><a class="nav-link" href="info.php" style="text-align: center;"><em class="fa fa-clone"></em>Basic Informations </a></li>
					<li class="nav-item"><a class="nav-link" href="educational.php" style="text-align: center;"><em class="fa fa-calendar-o"></em>Educational Details</a></li>
					<li class="nav-item"><a class="nav-link" href="experience.php" style="text-align: center;"><em class="fa fa-bar-chart"></em>Expiriences and Works<span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="skills.php" style="text-align: center;"><em class="fa"></em>Skills</a></li>
					<li class="nav-item"><a class="nav-link active" href="about.php" style="text-align: center;"><em class="fa fa-hand-o-up"></em>About<span class="sr-only">(current)</span></a></li>
					<li class="nav-item"><a class="nav-link" href="projects.php" style="text-align: center;"><em class="fa fa-clone"></em>Projects</a></li>
				</ul>
				</nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-left">About</h1>
					</div>
					
					<div class="card" style="width: 80%;">
                        <form action="" method="post" style="padding: 30px; text-align: center">

                            <div class="input-group" style="padding: 20px">
                                  <span class="input-group-addon" id="basic-addon1" style="width: 25%">Linked In Profile</span>
                                  <input type="text" class="form-control" placeholder="link" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            
                            <div class="input-group" style="padding: 20px">
                                  <span class="input-group-addon" id="basic-addon1"  style="width: 25%">Facebook Profile</span>
                                  <input type="text" class="form-control" placeholder="link" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            
                             <div class="input-group" style="padding: 20px">
                                  <span class="input-group-addon" id="basic-addon1"  style="width: 25%">Git Hub Profile</span>
                                  <input type="text" class="form-control" placeholder="link" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                             <div class="input-group" style="padding: 20px">
                                  <span class="input-group-addon" id="basic-addon1"  style="width: 25%">000webhost Profile</span>
                                  <input type="text" class="form-control" placeholder="link" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            <div class="form-group" style="padding: 40px">
                                    <label for="exampleFormControlTextarea1" >About</label>
                                    <textarea class="form-control" name="about_me" id="exampleFormControlTextarea1" rows="3" placeholder="Enter something about you!"><?php if(isset($_SESSION['about_me']))echo $_SESSION['about_me'];?></textarea>
                                  </div>
                            <div class="form-group" style="padding: 40px">
                                    <label for="exampleFormControlTextarea1" >User Description</label>
                                    <textarea class="form-control" name="user_desc" id="exampleFormControlTextarea1" rows="3" placeholder="Enter what you do!"><?php if(isset($_SESSION['about_me']))echo $_SESSION['user_desc'];?></textarea>
                                  </div>
                                 <button type="submit" name="add_portinfo" class="btn btn-danger btn-lg" style="border-radius: 5px">Submit</button>
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
