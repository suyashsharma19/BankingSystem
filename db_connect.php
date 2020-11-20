<?php 
	$conn=mysqli_connect("localhost", "root", "", "bank");
	if(!$conn) {
		echo "Connection Error: " . mysqli_connect_error();
	}
?>