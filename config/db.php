<?php
	$conn = new mysqli("localhost","root","","kbd");
	if ($conn ->connect_error) {
		die("connection failled: ".$conn->connect_error);
	}
	
?>