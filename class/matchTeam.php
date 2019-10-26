<?php
//include "class.php";

	class matchTeam extends data_con
	{
		public function team1_ID($match_id)
		{

			$sql ="SELECT * from matchs where match_id = $match_id";
			$data 	= $this->select($sql);
			foreach ($data as $key) 
			{
				$team1 = $key['team_a_id'];
				
			}
			return $team1;
		}
		public function team2_ID($match_id)
		{

			$sql ="SELECT * from matchs where match_id = $match_id";
			$data 	= $this->select($sql);
			foreach ($data as $key) 
			{
				$team2 = $key['team_b_id'];
				
			}
			return $team2;
		}
		
		public function team_Name($teamID)
		{

			
			$sql ="SELECT * from teams where team_id = $teamID";
			$data 	= $this->select($sql);
			foreach ($data as $key) 
			{
				$ret = $key['team_name'];
				
			}
			return $ret;
		}
		
		public function matchPoint($teamID,$match_id,$pointType)
		{

			
			$sql ="SELECT sum($pointType) from score where team_id = $teamID and match_id = $match_id";
			$data 	= $this->select($sql);
			foreach ($data as $key) 
			{
				$ret = $key['sum('.$pointType.')'];
				
			}
			return $ret;
		}
		
		
	}
?>