<?php
include"class/class.php";
$obj = new data_con;
$sql = "SELECT * from teams";
$data = $obj->select($sql);
$msg="";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <div class="container">
	<form method="post">
	 	<label>Team </label>
		<select class="browser-default" name="team_id">
			<option disabled selected >SELECT</option>
			<?php
			
				foreach ($data as $key) {
					echo '<option value='.$key[team_id].'>'.$key[team_name].'</option>';
				}
			?>
		</select>
			<label>Player Name</label>
			
			<div class="input_fields_wrap">
			    
			    <div><input type="text" name="mytext[]"></div>
			</div>
			<input type="submit" name="submit" class="btn">
		
 	</form>
 	<button class="add_field_button">Add More Fields</button>
 </div>
	<?php
		if (isset($_POST['submit']))
		{
			$team_id = $_POST['team_id'];
			$player_name = $_POST['mytext'][0];
			
			if (empty($player_name)&&empty($team_id))
			{
				$err = "Please fill all required field";
			}
			else
			{
				if ($_POST['mytext'][0] != "") 
				{
					$player_name=$_POST['mytext'][0];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][1] )) 
				{
					$player_name=$_POST['mytext'][1];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][2])) 
				{
					$player_name=$_POST['mytext'][2];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][3]) ) 
				{
					$player_name=$_POST['mytext'][3];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][4] )) 
				{
					$player_name=$_POST['mytext'][4];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][5] )) 
				{
					$player_name=$_POST['mytext'][5];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if(isset($_POST['mytext'][6] )) 
				{
					$player_name=$_POST['mytext'][6];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][7] )) 
				{
					$player_name=$_POST['mytext'][7];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][8] )) 
				{
					$player_name=$_POST['mytext'][8];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
				if (isset($_POST['mytext'][9] )) 
				{
					$player_name=$_POST['mytext'][9];
					$sql = "INSERT into players (player_name,team_id) values ('$player_name',$team_id) ";
					$msg = $obj->insert($sql);
				}
			}
		}
		echo $msg;
	?>
<?php include'class/footer.php'; ?>
