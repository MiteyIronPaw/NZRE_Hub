<?php
	session_start();
	if(!$_SESSION['name']){
		header("location:/Ingress");
	}else{
		include "/var/www/Ingress/Tools/database.php";

		if($_SESSION['lvl']<5){header("location:/Ingress/Enemies/Error");}else{
			$username=stripslashes($_POST['username']);
		
			//Log Them
				LogText("User ".$_SESSION['name']." Deleted ".$username);	
			//Delete them
				mysqli_query($con,"delete from EnemyTable where username = '".$username."'");
			//Go back to tools
				header("location:/Ingress/Enemies");
		}
	}
?>
