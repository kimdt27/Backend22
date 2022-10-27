<?php
define("DB_SERVER", "localhost");
define("DB_USER", "kim");
define("DB_PASS", "123456");
define("DB_NAME", "sec");

	$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	if (!$connection)
    {
        die ("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    $db_select = mysqli_select_db($connection, DB_NAME);
    if (!$db_select){
     die("Database error: " . mysqli_error($connection));
    }

function mysql_prep( $value ) {
    global $connection;
    $value = mysqli_real_escape_string($connection,htmlspecialchars(trim($value)));
    return $value;
}

/*
$test = "fg8a6fg9''''8a3'5'5t4";
echo mysql_prep($test);
*/