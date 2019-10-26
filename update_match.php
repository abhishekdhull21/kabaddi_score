<?php
	include"class/class.php";
	$obj = new data_con();
	$msg="";
	if (isset($match_id)) {
		
	}
	else
	{
		if (isset($_POST['submit'])) {
			$team1_id = $_POST['team1_id'];
			$team2_id = $_POST['team2_id'];
			$sql = "INSERT INTO `matchs`( `team_a_id`, `team_b_id`, `status`) values ('$team1_id','$team2_id',0)";
			$msg = $obj->insert($sql);
		}
		else
		{
			echo 'If page does not automatically redirected then click <a href="select_match.php?ref=update_match" >here</a>
				<meta http-equiv="refresh" content="5;URL=select_match.php?ref=update_match" />';
		}
	}
?>