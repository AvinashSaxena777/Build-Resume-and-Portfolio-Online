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

    if(isset($_POST['add_project'])){

        $project_title=$_POST['project_title'];
        $project_duration=$_POST['project_duration'];
        $project_detail=$_POST['project_detail'];
        $id = $_SESSION['id'];
        $sql = "INSERT INTO project (id, project_title, project_duration, project_detail) VALUES ('$id', '$project_title', '$project_duration', '$project_detail' )";

        if (mysqli_query($db, $sql)) {
            header( "Location: projects.php");
        } else {
            echo mysqli_error($db);
        } 
        
    }
    $id = $_SESSION['id'];
        $query4 = "select * from project where id='$id'";
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
					<li class="nav-item"><a class="nav-link" href="about.php" style="text-align: center;"><em class="fa fa-hand-o-up"></em>About</a></li>
					<li class="nav-item"><a class="nav-link active" href="projects.php" style="text-align: center;"><em class="fa fa-clone"></em>Projects<span class="sr-only">(current)</span></a></li>
				</ul>
				</nav>
			
			<main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2 pt-3 pl-4">
				<header class="page-header row justify-center">
					<div class="col-md-6 col-lg-8" >
						<h1 class="float-left text-center text-left">Projects</h1>
					</div>
					 <div class="card" style="width: 80%;">
                <div class="card-block">
                    <h4 class="card-title btn btn-dark" style="width: 100%"></h4>
                    <ul class="list-group">
                        <div class="list-group">
                            <?php if(isset($_SESSION['project_row'])){
                    #echo $_SESSION['ed'][$i]['ed_level'];
                    $i=0;
                    while($i<count($_SESSION['project_row'])){
                ?>
                                <button type="button" class="list-group-item list-group-item-action">
                <strong style="padding-right:10px"><?php
                    echo $_SESSION['project_row'][$i]['project_title'];?></strong><br><?php
                    echo 'Duration '.$_SESSION['project_row'][$i]['project_duration'];?><br><?php
                    echo $_SESSION['project_row'][$i]['project_detail'];
                    $i=$i+1;
                    }
                }
                ?>
                </button>

                        </div>
                    </ul>
                    <br>
                    <center><button class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-project">Add Project</button></center><br>

                    <div class="modal fade bd-example-modal-project" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="container">

                                    <div class="card card-register mx-auto mt-5">
                                        <div class="card-header">
                                            Add Your Project
                                        </div>
                                        <div class="card-body">
                                            <form  action="" method="post" style="padding: 30px; text-align: center">
                                              <div class="form-group">
                                                <label class="form-control-label" for="formGroupExampleInput" >Project Title</label>
                                                <input type="text" name="project_title" class="form-control" id="formGroupExampleInput" placeholder="e.g. Resume Builder">
                                              </div>
                                                
                                                <div class="form-group">
                                                <label class="form-control-label" for="formGroupExampleInput">Project Duration</label>
                                                <input type="text" name="project_duration" class="form-control" id="formGroupExampleInput" placeholder="e.g. 15 Days, 2 Months">
                                              </div>
                                                
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Details</label>
                                                    <textarea class="form-control" name="project_detail" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description of the Project"></textarea>
                                                  </div>
                                            <button type="Submit" name="add_project" class="btn btn-danger" name="add_project">Submit</button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
