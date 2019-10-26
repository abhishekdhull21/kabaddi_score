<?php 
require 'class/class.php';
$obj = new data_con;
?>

<div class="container">
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
						<td><a href='viewMatch.php?mid=".$match_id ."' >Score</a></td>
					</tr>";
			}

		?>
	</table>
</div>