<?php
	session_start();
		include "/var/www/Ingress/Tools/database.php";

		$sql="SELECT * FROM ItemTable WHERE username = \"".$_SESSION['name']."\"";
		$result=mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		
		include "/var/www/Ingress/Tools/getColour.php";
?>
<html>
	<?php include "/var/www/Ingress/Tools/head.php";?>
	<body>
		<?php include "/var/www/Ingress/Tools/menu.php";?>
		<p><form name="LoginForm" action="updateinv.php" method="post" class="inventory">
				Update Inventory<br><br>
				<?php

				function echoCell($Num, $ID, $Lvl){
					$colour = getLvlColour($Lvl); 
					echo "<td style=\"border: 1px solid #59FBEA;\">";
					if($Num!=0){
						echo "<input class=\"Cell\" type=\"text\" name=\"".$ID."\" autocomplete=\"off\" style=\"color:".$colour.";\" value=\"".$Num."\">";
					}else{
						echo "<input class=\"Cell\" type=\"text\" name=\"".$ID."\" autocomplete=\"off\" style=\"color:".$colour.";\">";
					}
					echo "</td>";
				}

				function echoCellMod($Num, $ID, $Lvl){
					$colour = getRarityColour($Lvl); 
					echo "<td style=\"border: 1px solid #59FBEA;\">";
					if($Num!=0){
						echo "<input class=\"Cell\" type=\"text\" name=\"".$ID."\" autocomplete=\"off\" style=\"color:".$colour.";\" value=\"".$Num."\">";
					}else{
						echo "<input class=\"Cell\" type=\"text\" name=\"".$ID."\" autocomplete=\"off\" style=\"color:".$colour.";\">";
					}
					echo "</td>";
				}

				//AP
				
				?>
				<table>
					<tr>
						<td></td>
						<td style="text-align: center;">Res</td>
						<td style="text-align: center;">XMP</td>
						<td style="text-align: center;">Ultra</td>
						<td style="text-align: center;">Cube</td>
					</tr>
					<?php
						for ($i = 1; $i <= 8; $i++) {
							echo "<tr>";
								echo "<td><div id=\"lvl".$i."\">L".$i."</div></td>";
								echoCell($row["R".$i], "R".$i, $i);
								echoCell($row["X".$i], "X".$i, $i);
								echoCell($row['U'.$i] , 'U'.$i, $i);
								echoCell($row["P".$i], "P".$i, $i);
								//echoCell($row['M'.$i] , 'M'.$i, $i);
							echo "</tr>";
						}
					?>
					<?php
						//ADA
							echo "<tr><td>ADA</td>";
							echo "<td></td>";
							echo "<td></td>";
							echoCellMod($row["VA"], "VA", 3);
							echo "</tr>";
						//Jarvis
							echo "<tr><td>Jarvis</td>";
							echo "<td></td>";
							echo "<td></td>";
							echoCellMod($row["VJ"], "VJ", 3);
							echo "</tr>";
						//Shields
							echo "<tr><td>Shields</td>";
							echoCellMod($row["S1"], "S1", 1);
							echoCellMod($row["S2"], "S2", 2);
							echoCellMod($row["S3"], "S3", 3);
							echo "</tr>";
						//Link Amp
							echo "<tr><td>Link Amp</td>";
							echo "<td></td>";
							echoCellMod($row["RML"], "RML", 2);
							echo "<td></td>";
							echo "</tr>";
						//Heat Sink
							echo "<tr><td>Heat Sink</td>";
							echoCellMod($row["CMH"], "CMH", 1);
							echoCellMod($row["RMH"], "RMH", 2);
							echoCellMod($row["VMH"], "VMH", 3);
							echo "</tr>";
						//Multi hack
							echo "<tr><td>Multi hack</td>";
							echoCellMod($row["CMM"], "CMM", 1);
							echoCellMod($row["RMM"], "RMM", 2);
							echoCellMod($row["VMM"], "VMM", 3);
							echo "</tr>";
						//Force Amp
							echo "<tr><td>Force Amp</td>";
							echo "<td></td>";
							echoCellMod($row["RMF"], "RMF", 2);
							echo "<td></td>";
							echo "</tr>";
						//Turret
							echo "<tr><td>Turret</td>";
							echo "<td></td>";
							echoCellMod($row["RMT"], "RMT", 2);
							echo "<td></td>";
							echo "</tr>";
						//Keys
							echo "<tr><td>Keys</td>";
							echoCellMod($row["K1"], "K1", 4);
							echo "<td></td>";
							echo "<td></td>";
							echo "</tr>";
						//Ap
							$UserQuery="SELECT * FROM AgentTable WHERE username = '".$_SESSION['name']."'";
							$UserResult=mysqli_query($con,$UserQuery);
							$User = mysqli_fetch_array($UserResult, MYSQL_ASSOC);
							
							echo "<tr><td>AP</td>";
							echoCellMod($User['AP'], "AP", 0);
							echo "<td></td>";
							echo "<td></td>";
							echo "</tr>";
					?>
				</table>
				<br>
				<div id="lineTall"><input class="button" type="submit" value="Update"></div>
		</form></p>
	</body>
</html>
