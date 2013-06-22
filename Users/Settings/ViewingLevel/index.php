<?php
	session_start();
	//Check if logged in
	if(!$_SESSION['name']){
		header("location:/Ingress");
	}else{
		include "/var/www/Ingress/Tools/database.php";
		$UserString = "SELECT * FROM AgentTable WHERE username = '".$_SESSION['name']."'";
		$UserQuery = mysqli_query($con,$UserString);
		$User = mysqli_fetch_array($UserQuery);
	}
?>
<html>
	<?php include "/var/www/Ingress/Tools/head.php";?>
	<body>
		<?php include "/var/www/Ingress/Tools/menu.php";?>
		<br>
			Set the required level for people to view your inventory
		<br><br>
		<form name="ChangePermLevelArea" action="changePerm.php" method="post">
			<div id="line">
				Change the level required for people <br><span style="font-weight:bold">inside your area</span> to view your inventory
			</div>
			<div id="line">
				<input class="field" type="text" name="AreaLevel" placeholder="Area viewing level" value="<?php echo $User['InLvl'];?>">
			</div>
			<br>
			<div id="line">
				Change the level required for people <br><span style="font-weight:bold">outside your area</span> to view your inventory
			</div>
			<div id="line">
				<input class="field" type="text" name="AnyOneLevel" placeholder="Anyone viewing level" value="<?php echo $User['outLvl'];?>">
			</div>
			<br>
			<div id="line">
				<input class="button" type="submit" value="Change">
			</div>
			<div id="line">
			</div>
		</form>
	</body>
</html>