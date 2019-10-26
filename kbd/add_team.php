<?php
	include"class/class.php";
	$clobj = new data_con();

	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container">
		<form method="post">
			<h3>Team Name Submission</h3>
			<label>Team Name</label>
			<input type="text" name="team_name"  >
			<label>Captain Name</label>
			<input type="text" name="cap_name"  >
			<label>Team Contact</label>
			<input type="text" name="team_con"  ><br><br>
			<input type="submit" class="btn" name="submit">
		</form>
	</div>
<?php
	$err = "";
	$msg = "";
	/*$sql = "Insert  into teams (team_name) values('ABC Club')";
	if ($conn->query($sql) === true) {
		echo "success";
	}
	else
	{
		echo "error:".$conn->error;
	}*/
	if (isset($_POST['submit'])) {
		$team = $_POST['team_name'];
		$cap_name = $_POST['cap_name'];
		$team_con = $_POST['team_con'];
		if (empty($team)&&empty($cap_name)&&empty($team_name)) {
			$err = "Please fill all required field";
		}
		elseif (empty($cap_name)) {
			$err = "Please fill the Team Name";
		}
		else{
			/* INSERT NEW DATA

			$sql = "INSERT into teams (team_name,cap_name,team_con) values('$team','$cap_name',$team_con)";
			$msg = $clobj->insert($sql);
			*/
			/*UPDATE EXIT DATA*/
			$sql = "UPDATE teams set team_con = $team_con where team_id = 1";
			$msg = $clobj->update($sql);
		}
		
	}
	echo $msg;
	echo $err."<br>";
	$sql = "Select * from teams";
	$res = $clobj->select($sql);
	foreach ($res as $key ) {
		echo $key['team_name']."<br>";
	}
	
	$clobj->conn->close();
?>

</body>
</html>