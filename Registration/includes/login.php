<?php
	SESSION_start();
	$db = mysqli_connect("localhost", "root", "", "test");
	if(!$db)
	{
		die("Connection Establishment Failed!!!");
	}
	else
	{
		echo "Connection Establishment!!!";
	}

	global $db;
	$emailid = $_POST["emailid"];
	$password = $_POST["password"];
	$statement = "SELECT password FROM registration WHERE emailid = '$emailid' and password = '$password'";
	$result = mysqli_query($db, $statement);
	$count = mysqli_num_rows($result);
	if($count == 1)
	{

		echo "<h1>Login Successful </h1>";
	}
	$_SESSION["emailid"] = $emailid;
	$_SESSION["flag"] = 1;
	header( "refresh:5;url=http://localhost/webPage/index.php" );
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>