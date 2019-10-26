<?php
	include"class/class.php";
	$obj = new data_con();
	$update =$_GET['up'];
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
	/*else
	{
		echo 'If page does not automatically redirected then click <a href="select_match.php?ref=score_match" >here</a>
				<meta http-equiv="refresh" content="5;URL=select_match.php?ref=update_match" />';
	}*/

	if ($update == 1)
	{
		$teamID = $team1_id;
		$update = 2;
	}
	elseif ($update == 2)
	{
		$teamID = $team2_id;
		$update = 1;
	}

?>

<br>
<br>
<br>
<br>
<div class="container" >
	<form method="get" action="">
		<input type="" name="mid" value="<?php echo $match_id; ?>" hidden >
		<input type="" name="up" value="<?php echo $update; ?>" hidden >
		<label>Team Name</label>
		<select class="browser-default" name="team_id" >
				<?php
					$sql = "SELECT * from teams where team_id = '$teamID'";
					$data = $obj->select($sql);
					foreach ($data as $key) 
					{
						echo '<option value='.$key["team_id"].'>'.$key["team_name"].'</option>';
					}
				?>
		</select>
		<label>Player Name</label>
		<select class="browser-default" name="player_id" >
				<option value="0">SELECT</option>
				<?php
					$sql = "SELECT * from players where team_id = '$teamID'";
					$data = $obj->select($sql);
					foreach ($data as $key) 
					{
						echo '<option value='.$key["player_id"].'>'.$key["player_name"].'</option>';
					}
				?>
		</select>
		<label>Point Type</label>
		<select class="browser-default" name="pointType" >
			<option>Select</option>
			<option value="1">Raid</option>
			<option value="2">Defence</option>
		</select>
		<label>Point </label>
		<select class="browser-default" name="point">
			<option>0</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
		</select>
		<label> Extra Point </label>
		<select class="browser-default" name="extraPoint">
			<option>0</option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
		</select>
		<p>
	      <label>
	        <input type="checkbox" name="alloutPoint" value="2" />
	        <span>All Out</span>
	      </label>
	    </p>
		<input type="checkbox" name="allOut_point" ><br>
		<input type="submit" name="submit" class="btn" >
	</form>
	
</div>
<?php
	if (isset($_GET['submit'])) {
		$team_id 	= $_GET['team_id'];
		$player_id 	= $_GET['player_id'];
		$point		= $_GET['point'];
		$pointType 	= $_GET['pointType'];
		$raidPoint 	= 0;
		$tacklePoint= 0;
		$extraPoint = 0;
		$alloutPoint= 0;
		if (isset($_GET['alloutPoint'])) 
		{
			$alloutPoint = $_GET['alloutPoint'];
		}
		if (isset($_GET['extraPoint']))

		{
			$extraPoint = $_GET['extraPoint'];
		}
		if ($pointType == 1) {
			$raidPoint 	= $point;
		}
		elseif($pointType == 2)
		{
			$tacklePoint	= $point;
		}
		
		if ($point<>0 ||$alloutPoint<>0 || $extraPoint<>0) 
		{
			
			$sql = "SELECT * from score where match_id = $match_id and player_id = $player_id";
			$check = $obj->select($sql);
			if ($check == 0) 
			{
				$sql= "INSERT INTO `score`( `match_id`,`team_id`, `player_id`, `raid`, `tackle`, `all_out`, `extra`) VALUES($match_id,$team_id,$player_id,$raidPoint,$tacklePoint,$alloutPoint,$extraPoint)";
				$obj->insert($sql);
			}
			else
			{
				foreach ($check as $val) 
				{
					$fetch_raid 	= $val['raid'];
					$fetch_tackle 	= $val['tackle'];
					$fetch_out 		= $val['all_out'];
					$fetch_extra 	= $val['extra'];
					
				}
				$raid 		= $fetch_raid+$raidPoint;
				$tackle 	= $fetch_tackle+$tacklePoint;
				$alloutPoint= $fetch_out+$alloutPoint;
				$extraPoint =	$extraPoint+$fetch_extra;
				$sql = "UPDATE score SET raid= $raid, tackle = $tackle, all_out = $alloutPoint,extra = $extraPoint  where match_id = $match_id and player_id = $player_id";
				$obj->update($sql);
			}
			
		}
		

	}
	
?>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
	<!-- Team I Score -->
	<?php
		//pointTable($team1_id,$match_id);
		
	
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