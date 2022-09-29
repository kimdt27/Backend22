<?php 
require("constants.php");
	//Connect to MySQL:
$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	//if no connection could be established show the error msg, and close the connection:
	if (mysqli_connect_errno($connection))
		{
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
		}
?>
