<?php
	include"class/class.php";
	$obj = new data_con();
	function __autoload($class)
	{
		include_once "class/$class.php";
	}
	$matchTeam = new matchTeam;
	$raid = 0;
	$tackle =0;
	$total =0;

	if (isset($_GET['mid'])) 
	{
		$match_id = $_GET['mid'];
		$sql="Select * from matchs where match_id = $match_id";
		$data = $obj->select($sql);
		foreach ($data as $info ) 
		{
			//Fetch team I info
			$team1_id = $info['team_a_id'];
			$team2_id = $info['team_b_id'];
			$status   =	$info['status'];
		}
		
	}
	else
	{
		echo 'If page does not automatically redirected then click <a href="showMatchs.php?ref=viewMatch" >here</a>
				<meta http-equiv="refresh" content="5;URL=showMatchs.php?ref=viewMatch" />';
	}



?>
<div class="container">
	<!-- Team I Score -->
	<?php
		
		
	
	?>
	<!-- Team Point Table -->
	<?php
		$team1_id = $matchTeam->team1_ID($match_id);
		$team1_name = $matchTeam->team_Name($team1_id);
		$team2_id = $matchTeam->team2_ID($match_id);
		$team2_name = $matchTeam->team_Name($team2_id);
	?>
	<table>
		<tr>
			<th><?php echo $team1_name; ?> </th>
			<th>Point</th>
			<th><?php echo $team2_name; ?></th>
		</tr>
		<tr>
			<td><?php echo $team1Raid = $matchTeam->matchPoint($team1_id,$match_id,'raid'); ?></td>
			<td>Raid</td>
			<td><?php echo $team2Raid = $matchTeam->matchPoint($team2_id,$match_id,'raid'); ?></td>
		</tr>
		<tr>
			<td><?php echo $team1Tackle = $matchTeam->matchPoint($team1_id,$match_id,'tackle'); ?></td>
			<td>Tackle</td>
			<td><?php echo $team2Tackle =  $matchTeam->matchPoint($team2_id,$match_id,'tackle'); ?></td>
		</tr>
		<tr>
			<td><?php echo  $team1Out =  $matchTeam->matchPoint($team1_id,$match_id,'all_out'); ?></td>
			<td>All Out</td>
			<td><?php echo  $team2Out =   $matchTeam->matchPoint($team2_id,$match_id,'all_out'); ?></td>
		</tr>
		<tr>
			<td><?php echo  $team1Extra =  $matchTeam->matchPoint($team1_id,$match_id,'extra'); ?></td>
			<td>Extra</td>
			<td><?php echo  $team2Extra =  $matchTeam->matchPoint($team2_id,$match_id,'extra'); ?></td>
		</tr>
		<tr>
			<th><?php echo $team1Raid+$team1Tackle+ $team1Out+$team1Extra; ?></th>
			<th>Total</th>
			<th><?php echo $team2Raid+$team2Tackle+ $team2Out+$team2Extra; ?></th>
		</tr>
	</table>
</div>
<br>
<br>
<br>
<?php
	pointTable($team1_id,$match_id);
?>
<br>
<br>
<br>
<?php
	pointTable($team2_id,$match_id);
?>