<?php
	SESSION_start();
	$_SESSION['message']='';
	$db = mysqli_connect("localhost", "root", "", "test");
	if(!$db)
	{
		die("Connection Establishment Failed!!!");
	}

	global $db;
	if($_POST["password"] == $_POST["cpassword"])//two passwords are equal or not !!!!
	{
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$emailid = $_POST["emailid"];
		$phone = $_POST["phone"];
		$password = $_POST["password"];
		$_SESSION["emailid"] = $emailid;
		$_SESSION["flag"] = 1;
		$statement = "INSERT INTO registration VALUES ('$firstname', '$lastname', '$emailid', '$phone', '$password')";
			if($result = mysqli_query($db, $statement))
			{
				$_SESSION['message'] = "registration Successful";
				echo "<h1>Done !!!<h1>";
			}
	}
?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>