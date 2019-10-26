<?php
	include"class/class.php";
	$obj = new data_con();
	$msg="";
?>
<div class="container">
	<form method="post" action="update_match.php">
		<label>Team I</label>
		<select class="browser-default" name="team1_id">
			<option disabled selected >SELECT</option>
			<?php
				$sql = "SELECT * from teams";
				$data = $obj->select($sql);

				foreach ($data as $key) {
					echo '<option value='.$key[team_id].'>'.$key[team_name].'</option>';
				}
			?>
		</select>
		<label>Team I</label>
		<select class="browser-default" name="team2_id">
			<option disabled selected >SELECT</option>
			<?php
			
				foreach ($data as $key) {
					echo '<option value='.$key[team_id].'>'.$key[team_name].'</option>';
				}
			?>
		</select>
		<br><br>
		<input type="submit" name="submit" value="Create Match" class="btn">
	</form>
<?php 
		if (isset($_POST['submit'])) 
		{
			$team1_id = $_POST['team1_id'];
			$team2_id = $_POST['team2_id'];
			$sql = "INSERT INTO `matchs`( `team_a_id`, `team_b_id`, `status`) values ('$team1_id','$team2_id',0)";
			$msg = $obj->insert($sql);
		}
?>
	<table>
		<tr>
			<th>Team I</th>
			<th>Team II</th>
			<th> Status</th>
			<th>Action</th>
		</tr>
		<?php
			$sql="Select * from matchs order by status asc limit 5";
			$data = $obj->select($sql);
			foreach ($data as $info ) {
				//Fetch team I info
				$team1_id = $info['team_a_id'];
				$team2_id = $info['team_b_id'];
				$status = $info['status'];
				$match_id = $info['match_id'];
				$sql1="Select * from teams where team_id = $team1_id";
				$team1_data = $obj->select($sql1);
				foreach ($team1_data as $key ) {
					$team1 = $key['team_name'];
				}
				//Fetch team II info
				$sql2="Select * from teams where  team_id = '$team2_id'";
				$team2_data = $obj->select($sql2);
				foreach ($team2_data as $key ) {
					$team2 = $key['team_name'];
				}
				echo"<tr>
						<td>".$team1."</td>
						<td>".$team2."</td>
						<td>".myFun($status)."</td>
						<td><a href='score_match.php?mid=".$match_id ."&up=1' >Update</a></td>
					</tr>";
			}

		?>
	</table>
</div>