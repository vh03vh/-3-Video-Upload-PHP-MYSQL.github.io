<?php
	$conn = mysqli_connect('localhost', 'root', '', 'db_video');
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>