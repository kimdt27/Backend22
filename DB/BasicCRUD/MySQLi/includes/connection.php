<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "123456");
define("DB_NAME", "imgup");

	$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	if (mysqli_connect_errno($connection))
  {
  die ("Failed to connect to MySQL: " . mysqli_connect_error());
  }
?>
