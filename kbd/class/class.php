<!DOCTYPE html>
<html>
<head>
	  <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</head>

<?php

class data_con
{
	private $host;
	private $user;
	private $pass;
	private $db;
	
	function __construct($params=array())
	{
		$this->conn=false;
		$this->host = "localhost";
		$this->user = "root";
		$this->pass = "";
		$this->db = "kbd";
		$this->ab = $this->dbConnect();
		
	}
	function dbConnect()
	{
		if (!$this->conn) {
			try{
				$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);
				
			}
			catch(exception $e){
				die("Error: ".$e->getMessage());
			}
		}
		else
		{
			$this->status_fatal = false;

		}
		
		return $this->conn;
	}
	public function select($sql)
	{
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) 
		{
		    $arr = array();
		    while($row = $result->fetch_assoc()) 
		    {
		        array_push($arr, $row);
		    }
		    return $arr;
		} else 
		{
	   		return 0;
		}

	}
	public function insert($sql)
	{
		$this->ret = $this->conn->query($sql);
		if ($this->ret===true) {
			$msg="Successfully submitted";
		}
		else
		{
			$msg = "failed to store the data".mysqli_error($sql);
		}
	return $msg;

	}
	public function update($sql)
	{
		$result = $this->conn->query($sql);
		if ($result == false) {
			$msg = "failled to update the records".mysqli_error($result);
		}
		else
		{
			$msg="<div class='isa_success'>
     <i class='fa fa-check'></i>Successfully
     </div>";
		}
		return $msg;
	}
}
	//Function for check status
	function myFun($check)
	{
		if ($check == 0) 
		{
			$status = "Upcoming";
		}
		elseif ($check == 1) 
		{
			$status = "Live";
		}
		else
		{
			$status = "finished";
		}
		return $status;
	}
	function pointType($val)
	{
		if ($val == 1) 
		{
			$status = "Raid";
		}
		elseif ($val == 2) 
		{
			$status = "Defence";
		}
		elseif ($val == 3) 
		{
			$status = "All Out";
		}
		elseif($val == 4)
		{
			$status = "Extra";
		}
		return $status;
	}
	function pointTable($team,$match_id)
	{
		$obj = new data_con();
		echo "<table>
		<tr>
			<th>Player</th>
			<th>Raid</th>
			<th>Tackle</th>
			<th>Total</th>
		</tr>";
	
		$sql="SELECT * from players where team_id = $team";
		$data = $obj->select($sql);
		$i =1;
		foreach ($data as $val) 
		{
			$player= $val['player_name'];
			$palyerID = $val['player_id'];
			$raid = 0;
			$tackle =0;
			$total =0;
			$sql="SELECT * from score where match_id = $match_id and player_id = $palyerID";
			$pointData = $obj->select($sql);
			if ($pointData <>0) 
			{
				foreach ($pointData as $key ) 
				{
					$raid = $key['raid'];
					$tackle = $key['tackle'];
					$total  = $raid+$tackle;
				}
			}
			
			echo "
			<tr>
				<td>".$player."</td>
				<td>".$raid."</td>
				<td>".$tackle."</td>
				<td>".$total."</td>
			</tr>";

			$i++;
		}
		echo "</table>";
	}
?>