<?php require_once("includes/connection.php"); 

$id=$_GET['id'];
$query = "SELECT * FROM img WHERE ID='$id'";
$result = mysqli_query($connection, $query) or die('Error, query failed');

mysqli_query($connection, "DELETE FROM img WHERE ID='$id'");
	while ($row = mysqli_fetch_array($result)){
	$file = "img/".	$row["filename"];
	}
    unlink ($file);

mysqli_close($connection);

// Redirect to delete.php.
header("location:index.php");

?>
