<?php require_once("includes/connection.php"); 

$id=$_POST['id'];
$newDescription = $_POST['desc'];
$query = "SELECT * FROM img WHERE ID='$id'";
$result = mysqli_query($connection, $query) or die('Error, query failed');

mysqli_query($connection, "UPDATE img SET description='$newDescription' WHERE ID='$id'");


mysqli_close($connection);

// Redirect to delete.php.
header("location:index.php");

?>
