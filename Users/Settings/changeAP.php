<?php
	session_start();
		include $_SESSION['path']."/Tools/database.php";	

		$username=$_SESSION['name'];
		$ap=stripslashes($_POST['AP']);

		$sql = "UPDATE AgentTable SET AP = '".$ap."' WHERE username = '".$username."'";
		mysqli_query($con,$sql);

		header("location:/Ingress/Users");
?>
