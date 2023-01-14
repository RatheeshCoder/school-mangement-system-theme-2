<?php
    // default details of server
	$servername = "localhost";
	$username = "root";
	$password = "";
	//mysqli_connect function to connect with the db
	$conn = mysqli_connect($servername, $username, $password);
	$db = mysqli_select_db($conn,'srmsnext');

	//error handling
	if(!$conn){
    	die("Connection failed: " . mysqli_connect_error());
	}

?>