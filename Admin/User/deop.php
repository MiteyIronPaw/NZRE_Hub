<?php
	session_start();
	if(!$_SESSION['admin']){header("location:/Ingress");return;}
	
		$username=strip_tags(stripslashes($_POST['Name']));
		include $_SESSION['path']."/Tools/database.php";
		$sql = "UPDATE AgentTable SET Admin = '0' WHERE username = '".$username."'";
		mysqli_query($con,$sql);
		header("location:./?Name=".$username);
?>
