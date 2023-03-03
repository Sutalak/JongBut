<?php 
	
	$severname="localhost";
	$username="root";
	$password="";
	$dbname="dbcon";

	$con = new mysqli ($severname,$username,$password,$dbname);
	if ($con->connect_error) {
		die("Connect faile : ".$con->connect_error);
	} 
	mysqli_set_charset($con,"utf8");

 ?>